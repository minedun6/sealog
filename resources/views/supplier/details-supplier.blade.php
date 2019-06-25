@extends('layouts/main')
@section('title')
    Détails
@endsection
@section('second-title')
    - Fournisseurs
@endsection
@section('url')
    Détails
@endsection
@section('url-way')
    <li>
        <a href="{{ url('/supplier') }}">Fournisseurs</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>Détails</span>
    </li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Begin: life time stats -->
            <div class="portlet light portlet-fit portlet-datatable bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-user font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase"> Fournisseur :
                                            {{ $supplier->name }}
                                        </span>
                    </div>
                    <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <label class="btn btn-transparent green btn-outline btn-circle btn-sm"
                                   onclick="document.location.href='{{ url('/supplier/edit/'.$supplier->id) }}'">
                                <input type="radio" name="options" class="toggle" id="option1">Modifier</label>
                            <label class="btn btn-transparent blue btn-outline btn-circle btn-sm"
                                   onclick="document.location.href='{{ url('/supplier/delete/'.$supplier->id) }}'">
                                <input type="radio" name="options" class="toggle" id="option2">Supprimer</label>

                        </div>

                    </div>
                </div>
                <div class="portlet-body">
                    <div class="tabbable-line">
                        <ul class="nav nav-tabs nav-tabs-lg">
                            <li class="active">
                                <a href="#tab_1" data-toggle="tab"> Profil </a>
                            </li>
                            <li>
                                <a href="#tab_2" data-toggle="tab"> Paramêtres</a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6 ">
                                        <div class="portlet blue-hoki box">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-cogs"></i>Profil de fournisseur
                                                </div>

                                            </div>
                                            <div class="portlet-body">
                                                <div class="row static-info">
                                                    <div class="col-md-5 name"> Nom:</div>
                                                    <div class="col-md-7 value">{{ $supplier->name }}</div>
                                                </div>
                                                <div class="row static-info">
                                                    <div class="col-md-5 name"> Email:</div>
                                                    <div class="col-md-7 value">{{ $supplier->email }}</div>
                                                </div>
                                                <div class="row static-info">
                                                    <div class="col-md-5 name"> Mtricule fiscale:</div>
                                                    <div class="col-md-7 value">{{ $supplier->matricule_fiscale }}</div>
                                                </div>
                                                <div class="row static-info">
                                                    <div class="col-md-5 name"> Téléphone:</div>
                                                    <div class="col-md-7 value">{{ $supplier->phone }}</div>
                                                </div>
                                                <div class="row static-info">
                                                    <div class="col-md-5 name"> fax:</div>
                                                    <div class="col-md-7 value">{{ $supplier->fax }}</div>
                                                </div>
                                                <div class="row static-info">
                                                    <div class="col-md-5 name"> Nom contact:</div>
                                                    <div class="col-md-7 value">{{ $supplier->contact_name }}</div>
                                                </div>
                                                <div class="row static-info">
                                                    <div class="col-md-5 name"> Adresse:</div>
                                                    <div class="col-md-7 value">{!! $supplier->address !!}</div>
                                                </div>
                                                <div class="row static-info">
                                                    <div class="col-md-5 name"> Notes:</div>
                                                    <div class="col-md-7 value">{!! $supplier->notes !!}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3"></div>

                                </div>


                            </div>
                            <div class="tab-pane" id="tab_2">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6 ">
                                        <div class="well">
                                            <div class="row static-info align-reverse">
                                                <div class="col-md-5 name"> Devise par defaut:</div>
                                                <div class="col-md-3 value">{{ $supplier->parameter->currency->name }}</div>
                                            </div>
                                            <div class="row static-info align-reverse">
                                                <div class="col-md-5 name"> Type paiement:</div>
                                                <div class="col-md-3 value">{{ $supplier->parameter->paymentType->name }}</div>
                                            </div>
                                            <div class="row static-info align-reverse">
                                                <div class="col-md-5 name"> Condition de paiement:</div>
                                                <div class="col-md-3 value">{!! $supplier->payment_condition !!}</div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3"></div>

                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- End: life time stats -->
        </div>
    </div>


@endsection

@section('footer')


    <script src="{{ URL::asset('assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"
            type="text/javascript"></script>

@endsection
