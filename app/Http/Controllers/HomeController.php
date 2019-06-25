<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Charge;
use App\Models\Folder;
use App\Models\Invoice;
use App\Models\Client;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = \Carbon\Carbon::now();

        $total_invoice_of_this_month = Invoice::where('invoice_date', 'like', $date->format('Y-m') . '%')
            ->count();
        $total_charges_of_this_month = Charge::where('created_at', 'like', $date->format('Y-m') . '%')
            ->sum('amount_exchanged');
        $total_invoice_of_this_year = Invoice::where('invoice_date', 'like', $date->format('Y') . '%')
            ->count();
        $benefits_of_this_month = Invoice::where('invoice_date', 'like', $date->format('Y-m') . '%')
            ->sum('invoice_total');
        $benefits_of_this_year = Invoice::where('invoice_date', 'like', $date->format('Y') . '%')
            ->sum('invoice_total');
        $total_charges_of_this_year = Charge::where('created_at', 'like', $date->format('Y') . '%')
            ->sum('amount_exchanged');
        $last_ten_folders = Folder::orderBy('created_at', 'DESC')
            ->take(10)
            ->get();
        $last_ten_invoices = Invoice::orderBy('created_at', 'DESC')
            ->take(10)
            ->get();
        $clients_benefits = DB::table('invoices')
            ->join('clients', 'clients.id', '=', 'invoices.client_id')
            ->select('clients.name', DB::raw('SUM(invoice_total) as total'))
            ->orderBy('total', 'DESC')
            ->groupBy('invoices.client_id')
            ->take(10)
            ->get();

        $suppliers_charges = DB::table('charges')
            ->join('suppliers', 'suppliers.id', '=', 'charges.supplier_id')
            ->select('suppliers.name', DB::raw('SUM(amount_exchanged) as total'))
            ->orderBy('total', 'DESC')
            ->groupBy('charges.supplier_id')
            ->take(10)
            ->get();

        return view('dashboard.main', array(
            'last_ten_folders' => $last_ten_folders,
            'last_ten_invoices' => $last_ten_invoices,
            'total_invoice_of_this_month' => $total_invoice_of_this_month,
            'total_charges_of_this_month' => $total_charges_of_this_month,
            'total_invoice_of_this_year' => $total_invoice_of_this_year,
            'total_charges_of_this_year' => $total_charges_of_this_year,
            'clients_benefits' => $clients_benefits,
            'suppliers_charges' => $suppliers_charges,
            'benefits_of_this_year' => $benefits_of_this_year,
            'benefits_of_this_month' => $benefits_of_this_month
        ));
    }
}
