@extends('layouts/main')
@section('title')
    Ajouter un fournisseur
@endsection
@section('second-title')
    - Fournisseurs
@endsection
@section('url')
    Ajouter un fournisseur
@endsection
@section('url-way')
    <li>
        <a href="{{ url('/supplier') }}">Fournisseurs</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>Ajouter un fournisseur</span>
    </li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 ">

        </div>

        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-green-seagreen">
                    <i class="icon-plus font-green-seagreen"></i>
                    <span class="caption-subject bold uppercase"> Ajouter </span>
                </div>

            </div>
            <div class="portlet-body form">
                <form role="form" action="{{ url('/supplier/add') }}" method="post" id="form_client">
                    <input type="hidden" value="{!! csrf_token() !!}" name="_token"/>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input has-success">
                                    <input name="name" type="text" class="form-control"
                                           placeholder="">
                                    <label for="form_control_1">Nom</label>

                                </div>
                                <div class="form-group form-md-line-input has-success">
                                    <input name="matricule_fiscale" type="text" class="form-control"
                                           placeholder="">
                                    <label for="form_control_1">Matricule fiscale</label>
                                </div>
                                <div class="form-group form-md-line-input has-success">
                                    <input name="phone" type="text" class="form-control"
                                           placeholder="">
                                    <label for="form_control_1">Téléphone</label>
                                </div>
                                <div class="form-group form-md-line-input has-success">
                                    <input name="fax" type="text" class="form-control"
                                           placeholder="">
                                    <label for="form_control_1">Fax</label>
                                </div>
                                <div class="form-group form-md-line-input has-success">
                                    <input name="email" type="text" class="form-control"
                                           placeholder="">
                                    <label for="form_control_1">Email</label>
                                </div>
                                <div class="form-group form-md-line-input has-success">
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
                                <div class="form-group form-md-line-input has-success">
                                            <textarea name="address" class="form-control" rows="3"
                                                      placeholder=""></textarea>
                                    <label for="form_control_1">Adresse</label>
                                </div>
                                <div class="form-group form-md-line-input has-success">
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
                                <div class="form-group form-md-line-input has-success">
                                    <select class="form-control" id="form_control_1" name="currency_id">
                                        @foreach($currencies as $currency)
                                            <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="form_control_1">Devise par defaut</label>
                                </div>
                                <div class="form-group form-md-line-input has-success">
                                    <select class="form-control" id="form_control_1" name="payment_type_id">
                                        @foreach($payment_types as $payment_type)
                                            <option value="{{ $payment_type->id }}">{{ $payment_type->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="form_control_1">Type paiement</label>
                                </div>
                                <div class="form-group form-md-line-input has-success">
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

