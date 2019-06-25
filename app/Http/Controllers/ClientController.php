<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientModel;
use App\Models\Currency;
use App\Models\Parameter;
use App\Models\PaymentType;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('access', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $clients = Client::all();

        return view('client.list-client', array(
            'clients' => $clients
        ));
    }

    public function create()
    {
        $currencies = Currency::all();
        $payment_types = PaymentType::all();

        return view('client.add-client', array(
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

        $client = new Client();
        $client->name = $request->name;
        $client->code = $request->code;
        $client->matricule_fiscale = $request->matricule_fiscale;
        $client->phone = $request->phone;
        $client->fax = $request->fax;
        $client->address = nl2br($request->address);
        $client->payment_condition = nl2br($request->payment_condition);
        $client->notes = nl2br($request->notes);
        $client->contact_name = $request->contact_name;
        $client->email = $request->email;
        $client->parameter_id = $parameter->id;
        $client->save();

        return redirect('/clients/' . $client->id);
    }

    public function edit($id)
    {
        $client = Client::find($id);
        $currencies = Currency::all();
        $payment_types = PaymentType::all();

        return view('client.edit-client', array(
            'currencies' => $currencies,
            'payment_types' => $payment_types,
            'client' => $client
        ));
    }

    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        $parameter = $client->parameter;
        $parameter->currency_id = $request->currency_id;
        $parameter->payment_type_id = $request->payment_type_id;
        $parameter->save();

        $client->name = $request->name;
        $client->code = $request->code;
        $client->matricule_fiscale = $request->matricule_fiscale;
        $client->phone = $request->phone;
        $client->fax = $request->fax;
        $client->address = nl2br($request->address);
        $client->payment_condition = nl2br($request->payment_condition);
        $client->notes = nl2br($request->notes);
        $client->contact_name = $request->contact_name;
        $client->email = $request->email;
        $client->save();

        return redirect('/clients/' . $client->id);
    }

    public function show($id)
    {
        $client = Client::find($id);

        return view('client.details-client', array(
            'client' => $client
        ));
    }

    public function confirmDelete($id)
    {
        $client = Client::find($id);

        return view('client.confirm_delete', array(
            'client' => $client
        ));
    }

    public function destroy($id)
    {
        $client = Client::find($id);
        foreach ($client->folders as $folder) {
            $folder->delete();
        }
        $client->delete();

        return redirect('/clients');
    }

    public function findClient(Request $request)
    {
        $client_name = $request->client_name;
        $clients = Client::where('name', 'like', '%' . $client_name . '%')->get();
        $result = [];
        foreach ($clients as $client) {
            $result[] = [
                'label' => $client->name,
                'value' => $client->name,
                'id' => $client->id
            ];
        }

        return json_encode($result);
    }
}
