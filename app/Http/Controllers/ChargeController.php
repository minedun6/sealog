<?php

namespace App\Http\Controllers;

use App\Models\Charge;
use App\Models\Folder;
use App\Models\PaymentType;
use App\Models\Supplier;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ChargeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('access', ['except' => ['index', 'show']]);
    }

    public function index()
    {
    }

    public function create($id)
    {
        $folder = Folder::find($id);
        $suppliers = Supplier::all();
        $payment_types = PaymentType::all();

        return view('charge.add-charge', array(
            'suppliers' => $suppliers,
            'payment_types' => $payment_types,
            'folder' => $folder
        ));
    }

    public function store(Request $request, $id)
    {
        $charge = new Charge();
        $charge->folder_id = $id;
        $charge->supplier_id = $request->supplier_id && $request->supplier ? $request->supplier_id : null;
        $charge->payment_type_id = $request->payment_type_id;
        $charge->description = $request->description ? nl2br($request->description) : '';
        $charge->amount = $request->amount ? doubleval($request->amount) : 0;
        $charge->exchange_rate = $request->exchange ? doubleval($request->exchange) : 0;
        if ($request->amount && $request->exchange)
            $charge->amount_exchanged = doubleval($request->amount) * doubleval($request->exchange);
        else {
            $charge->amount_exchanged = 0;
        }
        $charge->save();

        return redirect('/folder/' . $id);
    }

    public function edit($id)
    {
        $charge = Charge::find($id);
        $suppliers = Supplier::all();
        $payment_types = PaymentType::all();

        return view('charge.edit-charge', array(
            'suppliers' => $suppliers,
            'payment_types' => $payment_types,
            'charge' => $charge
        ));
    }

    public function update(Request $request, $id)
    {
        $charge = Charge::find($id);
        $charge->supplier_id = $request->supplier_id && $request->supplier ? $request->supplier_id : null;
        $charge->payment_type_id = $request->payment_type_id;
        $charge->description = $request->description ? nl2br($request->description) : '';
        $charge->amount = $request->amount ? doubleval($request->amount) : 0;
        $charge->exchange_rate = $request->exchange ? doubleval($request->exchange) : 0;
        if ($request->amount && $request->exchange)
            $charge->amount_exchanged = doubleval($request->amount) * doubleval($request->exchange);
        else {
            $charge->amount_exchanged = 0;
        }
        $charge->save();

        return redirect('/folder/' . $charge->folder->id);
    }

    public function destroy($id)
    {
        $charge = Charge::find($id);
        if ($charge == null) {
            return redirect()->back();
        }
        $charge->delete();
        
        return redirect()->back();
    }
}
