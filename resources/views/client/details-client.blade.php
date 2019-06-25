@extends('layouts/main')
@section('title')
    Détails
@endsection
@section('second-title')
    - Clients
@endsection
@section('url')
    Détails
@endsection
@section('url-way')
    <li>
        <a href="#">Client</a>
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
                                        <span class="caption-subject font-dark sbold uppercase"> Client : {{ $client->name }}

                                        </span>
                    </div>
                    <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <label class="btn btn-transparent green btn-outline btn-circle btn-sm"
                                   onclick="document.location.href='{{ url('/clients/edit/'.$client->id) }}'">
                                <input type="radio" name="options" class="toggle" id="option1">Modifier</label>
                            <label class="btn btn-transparent blue btn-outline btn-circle btn-sm"
                                   onclick="document.location.href='{{ url('/clients/delete/'.$client->id) }}'">
                                <input type="radio" name="options" class="toggle" id="option2">Supprimer</label>
                            <label class="btn btn-transparent yellow btn-outline btn-circle btn-sm">
                                <input type="radio" name="options" class="toggle" id="option3">Ajouter dossier</label>
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
                            <li>
                                <a href="#tab_3" data-toggle="tab"> Dossiers </a>
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
                                                    <i class="fa fa-cogs"></i>Profil de client
                                                </div>

                                            </div>
                                            <div class="portlet-body">
                                                <div class="row static-info">
                                                    <div class="col-md-5 name"> Nom:</div>
                                                    <div class="col-md-7 value"> {{ $client->name }}</div>
                                                </div>
                                                <div class="row static-info">
                                                    <div class="col-md-5 name"> Code:</div>
                                                    <div class="col-md-7 value"> {{ $client->code }}</div>
                                                </div>
                                                <div class="row static-info">
                                                    <div class="col-md-5 name"> Email:</div>
                                                    <div class="col-md-7 value"> {{ $client->email }}</div>
                                                </div>
                                                <div class="row static-info">
                                                    <div class="col-md-5 name"> Mtricule fiscale:</div>
                                                    <div class="col-md-7 value"> {{ $client->matricule_fiscale }}</div>
                                                </div>
                                                <div class="row static-info">
                                                    <div class="col-md-5 name"> Téléphone:</div>
                                                    <div class="col-md-7 value"> {{ $client->phone }}</div>
                                                </div>
                                                <div class="row static-info">
                                                    <div class="col-md-5 name"> fax:</div>
                                                    <div class="col-md-7 value"> {{ $client->fax }}</div>
                                                </div>
                                                <div class="row static-info">
                                                    <div class="col-md-5 name"> Nom contact:</div>
                                                    <div class="col-md-7 value"> {{ $client->contact_name }}</div>
                                                </div>
                                                <div class="row static-info">
                                                    <div class="col-md-5 name"> Adresse:</div>
                                                    <div class="col-md-7 value"> {!! $client->address !!}</div>
                                                </div>
                                                <div class="row static-info">
                                                    <div class="col-md-5 name"> Notes:</div>
                                                    <div class="col-md-7 value"> {!! $client->notes !!}</div>
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
                                                <div class="col-md-3 value"> {{ $client->parameter->currency->name }}</div>
                                            </div>
                                            <div class="row static-info align-reverse">
                                                <div class="col-md-5 name"> Type paiement:</div>
                                                <div class="col-md-3 value"> {{ $client->parameter->paymentType->name }}</div>
                                            </div>
                                            <div class="row static-info align-reverse">
                                                <div class="col-md-5 name"> Condition de paiement:</div>
                                                <div class="col-md-3 value"> {!! $client->payment_condition !!}</div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3"></div>

                                </div>

                            </div>
                            <div class="tab-pane" id="tab_3">
                                <div class="portlet light portlet-fit portlet-datatable bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject font-dark sbold uppercase">Dossiers</span>
                                        </div>
                                        <div class="actions">

                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-container">
                                            <div class="table-actions-wrapper">

                                            </div>
                                            <table class="table table-striped table-bordered" id="folder_table"
                                                   width="100%">
                                                <thead>
                                                <tr role="row" class="heading">
                                                    <th width="25%"> Numéro dossier</th>
                                                    <th width="25%"> Date dossier</th>
                                                    <th width="20%"> Nombre des contenaires</th>
                                                    <th width="20%"> Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($client->folders as $folder)
                                                    <tr>
                                                        <td>{{ $folder->folder_name.$folder->folder_number }}</td>
                                                        <td>{{ $folder->folder_date ? $folder->folder_date->format('d/m/Y') : '' }}</td>
                                                        <td>{{ count($folder->articles) }}</td>
                                                        <td style="text-align: center"><a class="btn btn-sm blue"
                                                                                          href="{{ url('/folder/'.$folder->id) }}">Détails</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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
    <script>

        $("#folder_table").DataTable();
    </script>
@endsection
