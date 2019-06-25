@extends('layouts/main')
@section('title')
    Ajouter un client
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
        <span>Ajouter un client</span>
    </li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 ">
            @if($errors->any())
                <div id="alert" class="custom-alerts alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    <i class="fa-lg fa fa-warning"></i>
                    @foreach($errors->messages as $message)
                        <p>{{ $message }}</p>
                    @endforeach
                </div>
                @endif
                        <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-plus font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase"> Ajouter </span>
                        </div>

                    </div>
                    <div class="portlet-body form">
                        <form role="form" action="{{ url('/clients/add') }}" method="post" id="form_client">
                            <input type="hidden" value="{!! csrf_token() !!}" name="_token"/>
                            <div class="form-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input has-info">
                                            <input name="name" type="text" class="form-control"
                                                   placeholder="">
                                            <label for="form_control_1">Nom</label>

                                        </div>
                                        <div class="form-group form-md-line-input has-info">
                                            <input name="code" type="text" class="form-control"
                                                   placeholder="">
                                            <label for="form_control_1">Code</label>

                                        </div>
                                        <div class="form-group form-md-line-input has-info">
                                            <input name="matricule_fiscale" type="text" class="form-control"
                                                   placeholder="">
                                            <label for="form_control_1">Matricule fiscale</label>
                                        </div>
                                        <div class="form-group form-md-line-input has-info">
                                            <input name="phone" type="text" class="form-control"
                                                   placeholder="">
                                            <label for="form_control_1">Téléphone</label>
                                        </div>
                                        <div class="form-group form-md-line-input has-info">
                                            <input name="fax" type="text" class="form-control"
                                                   placeholder="">
                                            <label for="form_control_1">Fax</label>
                                        </div>
                                        <div class="form-group form-md-line-input has-info">
                                            <input name="email" type="text" class="form-control"
                                                   placeholder="">
                                            <label for="form_control_1">Email</label>
                                        </div>
                                        <div class="form-group form-md-line-input has-info">
                                            <input name="contact_name" type="text" class="form-control"
                                                   id="form_control_1"
                                                   placeholder="">
                                            <label for="form_control_1">Nom contact</label>
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <p>&nbsp</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input has-info">
                                            <textarea name="address" class="form-control" rows="3"
                                                      placeholder=""></textarea>
                                            <label for="form_control_1">Adresse</label>
                                        </div>
                                        <div class="form-group form-md-line-input has-info">
                                            <textarea name="notes" class="form-control" rows="3"
                                                      placeholder=""></textarea>
                                            <label for="form_control_1">Notes</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <h4>Paramêtres</h4>
                                        <label>&nbsp</label>
                                        <div class="form-group form-md-line-input has-info">
                                            <select class="form-control" id="form_control_1" name="currency_id">

                                                @foreach($currencies as $currency)
                                                    <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="form_control_1">Devise par defaut</label>
                                        </div>
                                        <div class="form-group form-md-line-input has-info">
                                            <select class="form-control" id="form_control_1" name="payment_type_id">

                                                @foreach($payment_types as $payment_type)
                                                    <option value="{{ $payment_type->id }}">{{ $payment_type->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="form_control_1">Type paiement</label>
                                        </div>
                                        <div class="form-group form-md-line-input has-info">
                                            <textarea name="payment_condition" class="form-control" rows="3"
                                                      placeholder=""></textarea>
                                            <label for="form_control_1">Condition de paiement</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10"></div>
                                <div class="col-md-2">
                                    <div class="form-actions noborder">
                                        <button type="submit" class="btn blue">Ajouter</button>
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

