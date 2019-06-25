<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\InvoicePayment;
use App\Models\InvoiceState;
use App\Models\InvoiceType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use App\Models\PaymentType;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('access', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $invoices = Invoice::all();

        return view('invoices.list-invoices', array(
            'invoices' => $invoices
        ));
    }

    public function create($folder_id, $invoice_type_id)
    {
        $folder = Folder::find($folder_id);
        $invoice_type = InvoiceType::find($invoice_type_id);
        $default_articles = Config::get('invoices.' . $invoice_type->code);

        return view('invoices.add-invoice', array(
            'folder' => $folder,
            'default_articles' => $default_articles,
            'invoice_type' => $invoice_type
        ));

    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        $folder = Folder::find($request->folder_id);
        $year = Carbon::now('Africa/Tunis')->year;
        $last = Invoice::where('created_at', 'like', $year . "%")
            ->where('invoice_number', 'like', "%" . ($year - 2000) . '%')
            ->orderBy('invoice_number', 'DESC')->first();
        $invoice = new Invoice();
        if ($last != null) {
            $invoice->invoice_number = $year - 2000 . '-' . sprintf('%05d', substr($last->invoice_number, 3, 7) + 1);
        } else {
            $invoice->invoice_number = $year - 2000 . '-' . '00001';
        }

        $invoice->prefix = $folder->folder_name;
        $invoice->order_form = $request->order_form;
        $invoice->termes = nl2br($request->termes);
        $invoice->client_notes = nl2br($request->notes);
        $invoice->payed_sum = 0;
        $invoice->folder_id = $folder->id;
        $invoice->client_id = $request->client_id;
        $invoice->type_id = $request->invoice_type_id;
        $invoice->state_id = InvoiceState::where('code', 'created')->first()->id;
        $invoice->invoice_date = $request->date_facture ? Carbon::createFromFormat('d/m/Y', $request->date_facture) : null;
        $invoice->deadline = $request->date_echeance ? Carbon::createFromFormat('d/m/Y', $request->date_echeance) : null;
        $invoice->total_in_chars = $request->total_in_chars;
        $invoice->save();

        $total_discount = 0;
        $total_taxes = 0;
        $subtotal = 0;

        $details = count($request->description);
        for ($i = 0; $i < $details; $i++) {
            $detail = new InvoiceDetail();
            $detail->description = $request->description[$i];
            $detail->price = $request->prixu[$i];
            $detail->quantity = $request->quantite[$i];
            $priceht = round($detail->price * $detail->quantity, 3);
            $subtotal += $priceht;
            $detail->discount = $request->remise[$i];
            $discount = round(($priceht * $detail->discount) / 100);
            $total_discount += $discount;
            $detail->tva = $request->tva[$i];
            $tva = round((($priceht - $discount) * $detail->tva) / 100, 3);
            $total_taxes += $tva;
            $detail->total = round($priceht - $discount, 3);
            $detail->total_ttc = round($priceht - $discount + $tva, 3);
            $detail->invoice_id = $invoice->id;
            $detail->save();
        }

        $invoice->subtotal = $subtotal;
        $invoice->total_discount = $total_discount;
        $invoice->invoice_total = round(($subtotal + $total_taxes + 0.5) - $total_discount, 3);
        $invoice->save();

        DB::commit();

        return redirect('/invoices/' . $invoice->id);
    }

    public function edit($id)
    {
        $invoice = Invoice::find($id);

        return view('invoices.edit-invoice', array(
            'invoice' => $invoice
        ));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        $invoice = Invoice::find($id);
        $invoice->order_form = $request->order_form;
        $invoice->invoice_number = $request->invoice_number;
        $invoice->termes = nl2br($request->termes);
        $invoice->client_notes = nl2br($request->notes);
        $invoice->state_id = InvoiceState::where('code', 'created')->first()->id;
        $invoice->invoice_date = $request->date_facture ? Carbon::createFromFormat('d/m/Y', $request->date_facture) : null;
        $invoice->deadline = $request->date_echeance ? Carbon::createFromFormat('d/m/Y', $request->date_echeance) : null;
        $invoice->total_in_chars = $request->total_in_chars;
        $invoice->save();

        $total_discount = 0;
        $total_taxes = 0;
        $subtotal = 0;
        $details = count($request->description);
        for ($i = 0; $i < $details; $i++) {
            $isset = isset($request->detail_id[$i]);
            if ($isset) {
                $detail = InvoiceDetail::find($request->detail_id[$i]);
            } else {
                $detail = new InvoiceDetail();
                $detail->invoice_id = $invoice->id;
            }
            $detail->description = $request->description[$i];
            $detail->price = $request->prixu[$i];
            $detail->quantity = $request->quantite[$i];
            $priceht = round($request->prixu[$i] * $detail->quantity, 3);
            $subtotal += $priceht;
            $detail->discount = $request->remise[$i];
            $discount = round(($priceht * $request->remise[$i]) / 100, 3);
            $total_discount += $discount;
            $detail->tva = $request->tva[$i];
            $tva = round((($priceht - $discount) * $request->tva[$i]) / 100, 3);
            $total_taxes += $tva;
            $detail->total = round($priceht - $discount, 3);
            $detail->total_ttc = round($priceht - $discount + $tva, 3);
            $detail->save();
        }
        $invoice->subtotal = $subtotal;
        $invoice->total_discount = $total_discount;
        $invoice->invoice_total = round(($subtotal + $total_taxes + 0.5) - $total_discount, 3);
        $invoice->save();

        DB::commit();

        return redirect('/invoices/' . $invoice->id);
    }

    public function show($id)
    {
        $invoice = Invoice::find($id);
        $invoice_states = InvoiceState::all();

        return view('invoices.details-invoice', array(
            'invoice' => $invoice,
            'invoice_states' => $invoice_states
        ));
    }

    public function payment($id)
    {
        $invoice = Invoice::find($id);
        $payment_types = PaymentType::all();

        return view('invoices.add-payment', array(
            'invoice' => $invoice,
            'payment_types' => $payment_types
        ));
    }

    public function pay(Request $request, $id)
    {
        DB::beginTransaction();
        $year = Carbon::now('Africa/Tunis')->year;
        $last = InvoicePayment::where('created_at', 'like', $year . "%")
            ->where('payment_number', 'like', "%" . ($year - 2000) . '%')
            ->orderBy('payment_number', 'DESC')->first();
        $invoice_payment = new InvoicePayment();
        if ($last != null) {
            $invoice_payment->payment_number = $year - 2000 . '-' . sprintf('%05d', substr($last->payment_number, 3, 7) + 1);
        } else {
            $invoice_payment->payment_number = $year - 2000 . '-' . '00001';
        }

        $invoice = Invoice::find($id);
        $amount = floatval($request->amount);
        $invoice->payed_sum += $amount;
        if ($invoice->payed_sum == $invoice->invoice_total) {
            $state = InvoiceState::where('code', 'payed')->first();
            $invoice->state_id = $state->id;
        } else {
            $state = InvoiceState::where('code', 'in payment')->first();
            $invoice->state_id = $state->id;
        }
        $invoice->save();
        $invoice_payment->amount = $amount;
        $invoice_payment->reference = $request->ref;
        $invoice_payment->payment_id = $request->payment_type;
        $invoice_payment->invoice_id = $invoice->id;
        $invoice_payment->save();

        DB::commit();

        return redirect('/invoices/' . $invoice->id);
    }

    public function confirmDelete($id)
    {
        $invoice = Invoice::find($id);

        return view('invoices.confirm_delete', array(
            'invoice' => $invoice
        ));
    }

    public function destroy($id)
    {
        $invoice = Invoice::find($id);
        $details = $invoice->details;
        foreach ($details as $detail) {
            $detail->delete();
        }
        $invoice->delete();

        return redirect('/invoices');
    }

    public function printInvoice($id)
    {
        $invoice = Invoice::find($id);
        $footer = url('/footer');
        $pdf = PDF::loadView('invoices.print-invoice', array(
            'invoice' => $invoice
        ))->setOption('footer-html', $footer);
        return $pdf->inline();
    }

    public function updateState(Request $request, $id)
    {
        DB::beginTransaction();
        $invoice = Invoice::find($id);
        $invoice_state_id = $request->invoice_state_id ? $request->invoice_state_id : $invoice->state_id;

        $invoice->state_id = $invoice_state_id;
        $invoice->save();
        DB::commit();

        return redirect('/invoices/' . $invoice->id);
    }

    public function editInvoicePayment($id)
    {
        $invoice_payment = InvoicePayment::find($id);
        if ($invoice_payment == null)
            return redirect()->back();
        $payment_types = PaymentType::all();

        return view('invoices.edit-payment', array(
            'invoice_payment' => $invoice_payment,
            'payment_types' => $payment_types
        ));
    }

    public function updateInvoicePayment(Request $request, $id)
    {
        $invoice_payment = InvoicePayment::find($id);
        if ($invoice_payment == null)
            return redirect()->back();

        DB::beginTransaction();
        $invoice = $invoice_payment->invoice;
        $amount = floatval($request->amount);
        $new_amount = floatval($request->amount) - $invoice_payment->amount;
        $invoice->payed_sum += $new_amount;
        if ($invoice->payed_sum == $invoice->invoice_total) {
            $state = InvoiceState::where('code', 'payed')->first();
            $invoice->state_id = $state->id;
        } else {
            $state = InvoiceState::where('code', 'in payment')->first();
            $invoice->state_id = $state->id;
        }
        $invoice->save();
        $invoice_payment->amount = $amount;
        $invoice_payment->reference = $request->ref;
        $invoice_payment->payment_id = $request->payment_type;
        $invoice_payment->save();
        DB::commit();

        return redirect('/invoices/' . $invoice->id);
    }

    public function destroyInvoicePayment($id)
    {
        $invoice_payment = InvoicePayment::find($id);
        if ($invoice_payment == null)
            return redirect()->back();
        DB::beginTransaction();
        $invoice = $invoice_payment->invoice;
        $invoice->payed_sum -= $invoice_payment->amount;
        $invoice->save();
        $invoice_payment->delete();
        DB::commit();

        return redirect()->back();
    }

    public function deleteInvoiceLine(Request $request)
    {
        $id = $request->detail_id;
        $detail = InvoiceDetail::find($id);
        if ($detail) {
            DB::beginTransaction();
            $detail->delete();
            DB::commit();
            return ['status' => true];
        }

        return ['status' => false];
    }
}
