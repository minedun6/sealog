<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\PaymentType;
use App\Models\Parameter;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('access', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $suppliers = Supplier::all();

        return view('supplier.list-supplier', array(
            'suppliers' => $suppliers
        ));
    }

    public function create()
    {
        $currencies = Currency::all();
        $payment_types = PaymentType::all();

        return view('supplier.add-supplier', array(
            'currencies' => $currencies,
            'payment_types' => $payment_types
        ));
    }

    public function store(Request $request)
    {
        $parameter = new Parameter();
        $parameter->currency_id = $request->currency_id;
        $parameter->payment_type_id = $request->payment_type_id;
        $parameter->save();

        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->matricule_fiscale = $request->matricule_fiscale;
        $supplier->phone = $request->phone;
        $supplier->fax = $request->fax;
        $supplier->address = nl2br($request->address);
        $supplier->payment_condition = nl2br($request->payment_condition);
        $supplier->notes = nl2br($request->notes);
        $supplier->contact_name = $request->contact_name;
        $supplier->email = $request->email;
        $supplier->parameter_id = $parameter->id;
        $supplier->save();

        return redirect('/supplier/' . $supplier->id);
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);
        $currencies = Currency::all();
        $payment_types = PaymentType::all();

        return view('supplier.edit-supplier', array(
            'currencies' => $currencies,
            'payment_types' => $payment_types,
            'supplier' => $supplier
        ));
    }

    public function update(Request $request, $id)
    {
        $supplier = Supplier::find($id);
        $parameter = $supplier->parameter;
        $parameter->currency_id = $request->currency_id;
        $parameter->payment_type_id = $request->payment_type_id;
        $parameter->save();

        $supplier->name = $request->name;
        $supplier->matricule_fiscale = $request->matricule_fiscale;
        $supplier->phone = $request->phone;
        $supplier->fax = $request->fax;
        $supplier->address = nl2br($request->address);
        $supplier->payment_condition = nl2br($request->payment_condition);
        $supplier->notes = nl2br($request->notes);
        $supplier->contact_name = $request->contact_name;
        $supplier->email = $request->email;
        $supplier->save();

        return redirect('/supplier/' . $supplier->id);

    }

    public function show($id)
    {
        $supplier = Supplier::find($id);

        return view('supplier.details-supplier', array(
            'supplier' => $supplier
        ));
    }

    public function confirmDelete($id)
    {
        $supplier = Supplier::find($id);

        return view('supplier.confirm_delete', array(
            'supplier' => $supplier
        ));
    }

    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $charges = $supplier->charges();

        foreach ($charges as $charge) {
            $charge->delete();
        }
        $supplier->delete();

        return redirect('/supplier');
    }

    public function getSupplierByName(Request $request)
    {
        $name = $request->name;
        $suppliers = Supplier::where('name', 'like', '%' . $name . '%')
            ->get();
        $result = [];
        foreach ($suppliers as $supplier) {
            $result [] = [
                'value' => $supplier->name,
                'id' => $supplier->id
            ];
        }

        return json_encode($result);
    }
}
