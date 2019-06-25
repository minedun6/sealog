@extends('layouts/main')
@section('title')
    Editer les informations d'un client
@endsection
@section('second-title')
    - Clients
@endsection
@section('url')
    Ajouter un client
@endsection
@section('url-way')
    <li>
        <a href="#">Client</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>Editer</span>
    </li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> Editer </span>
                    </div>

                </div>
                <div class="portlet-body form">
                    <form role="form" method="post" action="{{ url('/clients/edit/'.$client->id) }}" id="form_client">
                        <input type="hidden" value="{!! csrf_token() !!}" name="_token"/>
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-info">
                                        <input type="text" class="form-control"  name="name"
                                               placeholder="Nom" value="{{ $client->name }}">
                                        <label for="form_control_1">Nom</label>
                                    </div>
                                    <div class="form-group form-md-line-input has-info">
                                        <input type="text" class="form-control"  name="code"
                                               placeholder="Code" value="{{ $client->code }}">
                                        <label for="form_control_1">Nom</label>
                                    </div>
                                    <div class="form-group form-md-line-input has-info">
                                        <input type="text" class="form-control" name="matricule_fiscale"
                                                value="{{ $client->matricule_fiscale }}"
                                               placeholder="Matricule fiscale">
                                        <label for="form_control_1">Matricule fiscale</label>
                                    </div>
                                    <div class="form-group form-md-line-input has-info">
                                        <input type="text" class="form-control"  name="phone"
                                               placeholder="Téléphone" value="{{ $client->phone }}">
                                        <label for="form_control_1">Téléphone</label>
                                    </div>
                                    <div class="form-group form-md-line-input has-info">
                                        <input type="text" class="form-control" name="fax" value="{{ $client->fax }}"
                                                placeholder="Fax">
                                        <label for="form_control_1">Fax</label>
                                    </div>
                                    <div class="form-group form-md-line-input has-info">
                                        <input type="text" class="form-control" name="email"
                                               value="{{ $client->email }}"  placeholder="Email">
                                        <label for="form_control_1">Email</label>
                                    </div>
                                    <div class="form-group form-md-line-input has-info">
                                        <input type="text" class="form-control"
                                               placeholder="Nom_contact" name="contact_name"
                                               value="{{ $client->contact_name }}">
                                        <label for="form_control_1">Nom_contact</label>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                        <p>&nbsp</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-info">
                                        <textarea class="form-control" rows="3" name="address"
                                                  placeholder="Adresse">{!! strip_tags($client->address) !!}</textarea>
                                        <label for="form_control_1">Adresse</label>
                                    </div>
                                    <div class="form-group form-md-line-input has-info">
                                        <textarea class="form-control" rows="3" name="notes"
                                                  placeholder="Notes">{!! strip_tags($client->notes) !!}</textarea>
                                        <label for="form_control_1">Notes</label>
                                    </div>

                                </div>
                            </div>
                            <div class="row"><p>&nbsp</p></div>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <label>Paramêtres</label>
                                    <label>&nbsp</label>
                                    <div class="form-group form-md-line-input has-info">
                                        <select class="form-control" id="form_control_1" name="currency_id">
                                            @foreach($currencies as $currency)
                                                @if($currency->id == $client->parameter->currency->id)
                                                    <option selected
                                                            value="{{ $currency->id }}">{{ $currency->name }}</option>
                                                @else
                                                    <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <label for="form_control_1">Devise par defaut</label>
                                    </div>
                                    <div class="form-group form-md-line-input has-info">
                                        <select class="form-control" id="form_control_1" name="payment_type_id">
                                            @foreach($payment_types as $payment_type)
                                                @if($payment_type->id == $client->parameter->paymentType->id)
                                                    <option selected
                                                            value="{{ $payment_type->id }}">{{ $payment_type->name }}</option>
                                                @else
                                                    <option value="{{ $payment_type->id }}">{{ $payment_type->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <label for="form_control_1">Type paiement</label>
                                    </div>
                                    <div class="form-group form-md-line-input has-info">
                                            <textarea name="payment_condition" class="form-control" rows="3"
                                                      placeholder="">{!! strip_tags($client->payment_condition) !!}</textarea>
                                        <label for="form_control_1">Condition de paiement</label>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-11"></div>
                            <div class="col-md-1">
                                <div class="form-actions noborder">
                                    <button type="submit" class="btn blue">Editer</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END SAMPLE FORM PORTLET-->
            <!-- BEGIN SAMPLE FORM PORTLET-->


            <!-- END SAMPLE FORM PORTLET-->
            <!-- BEGIN SAMPLE FORM PORTLET-->

            <!-- END SAMPLE FORM PORTLET-->
        </div>
        <div class="col-md-1"></div>
    </div>

@endsection

@section('footer')

    <script type="text/javascript" src="{{ URL::asset('assets/scripts/form-val.js') }}"></script>

@endsection

