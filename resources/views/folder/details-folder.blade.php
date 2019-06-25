@extends('layouts/main')
@section('title')
    Détails
@endsection
@section('second-title')
    - Dossiers
@endsection
@section('url')
    Détails
@endsection
@section('url-way')
    <li>
        <a href="#">Dossier</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>Détails</span>
    </li>
@endsection
@section('header')

@endsection
@section('content')

    <div class="portlet light portlet-fit portlet-datatable bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-folder font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase"> Dossier #{{ $folder->folder_name.$folder->folder_number }}

                                        </span>
            </div>
            <div class="actions">
                <div class="btn-group btn-group-devided" data-toggle="buttons">
                    <label class="btn btn-transparent green btn-outline btn-circle btn-sm active"
                           onclick='window.location="{{ url('/folder/edit/'.$folder->id) }}"'>
                        <input type="radio" name="options" class="toggle" id="option1"><i class="fa fa-edit"></i> Editer</label>
                    <label class="btn btn-transparent blue btn-outline btn-circle btn-sm"

                           onclick='window.location="{{ url('/folder/delete/'.$folder->id) }}"'><i
                                class="fa fa-trash"></i> Supprimer</label>
                    <a class="btn btn-transparent yellow-casablanca btn-outline btn-circle btn-sm"

                       onclick='window.location="{{ url('/file/add/'.$folder->id) }}"'><i class="fa fa-file"></i>
                        Ajouter fichier</a>
                </div>
                <div class="btn-group">
                    <a class="btn red btn-outline btn-circle" href="javascript:;" data-toggle="dropdown">
                        <i class="fa fa-share"></i>
                        <span class="hidden-xs"> Ajouter facutre </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                        @foreach($invoice_types as $invoice_type)
                            <li>
                                <a href="{{ url('/invoices/add/'.$folder->id.'/'.$invoice_type->id) }}"> <i
                                            class="fa fa-angle-right"></i> {{ $invoice_type->value }} </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="btn-group">
                    <a class="btn btn-transparent green-jungle btn-outline btn-circle btn-sm"
                       onclick="window.location='{{ url('/charges/add/'.$folder->id) }}'"><i class="fa fa-dollar"></i>
                        Ajouter charge</a>
                </div>
                <div class="btn-group">
                    <a class="btn btn-transparent purple-soft btn-outline btn-circle btn-sm"
                       href="{{ url('/notice/prior/'.$folder->id) }}"><i class="fa fa-pencil"></i> Pré-avis</a>
                </div>
                <div class="btn-group">
                    <a class="btn btn-transparent purple-seance btn-outline btn-circle btn-sm"
                       onclick='window.location="{{ url('/folder/print/'.$folder->id) }}"'><i class="fa fa-print"></i>Imprimer</a>
                </div>
            </div>
        </div>
        <div class="portlet-body">
            <div class="portlet light">

                <div class="portlet-title tabbable-line">
                    <div class="caption">

                    </div>

                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#portlet_tab_1_1" data-toggle="tab" aria-expanded="true"> Détails </a>
                        </li>

                        <li class="">
                            <a href="#portlet_tab_1_3" data-toggle="tab" aria-expanded="false"> Fichiers </a>
                        </li>
                        <li class="">
                            <a href="#portlet_tab_1_5" data-toggle="tab" aria-expanded="false"> Factures </a>
                        </li>
                        <li class="">
                            <a href="#portlet_tab_1_4" data-toggle="tab" aria-expanded="false"> Charges </a>
                        </li>
                        <li class="">
                            <a href="#portlet_tab_1_2" data-toggle="tab" aria-expanded="false"> Bilan </a>
                        </li>

                    </ul>
                </div>
                <div class="portlet-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="portlet_tab_1_1">
                            <div class="portlet">

                                <div class="portlet green-meadow box">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-info"></i>Information général
                                        </div>
                                        <div class="actions">

                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="row static-info">

                                            <div class="col-md-8 name"> Nom client:</div>
                                            <div class="col-md-3 value"> {{ $folder->client->name }}</div>
                                        </div>
                                        <div class="row static-info">

                                            <div class="col-md-8 name"> Date dossier:</div>
                                            <div class="col-md-3 value"> {{ $folder->folder_date->format('d/m/Y') }}</div>
                                        </div>
                                        <div class="row static-info">
                                            <div class="col-md-8 name"> Numéro escale:</div>
                                            <div class="col-md-3 value"> {{ $folder->escale_number }}</div>
                                        </div>
                                        <div class="row static-info">

                                            <div class="col-md-8 name"> Numéro rubrique:</div>
                                            <div class="col-md-3 value"> {{ $folder->rubric_number }}</div>
                                        </div>
                                        @if(is_object($folder->maritimeFolder) || is_object($folder->arialFolder) || is_object($folder->roadFolder))
                                            <div class="row static-info">
                                                <div class="col-md-8 name"> Type:</div>
                                                @if(is_object($folder->maritimeFolder))
                                                    <div class="col-md-3 value"> {{ $folder->maritimeFolder->type == 'import' ? 'import' : 'export'  }}</div>
                                                @elseif(is_object($folder->arialFolder))
                                                    <div class="col-md-3 value"> {{ $folder->arialFolder->type == 'import' ? 'import' : 'export'  }}</div>
                                                @elseif(is_object($folder->roadFolder))
                                                    <div class="col-md-3 value"> {{ $folder->roadFolder->type == 'import' ? 'import' : 'export'  }}</div>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="portlet red-sunglo box">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-bars"></i>Détails
                                        </div>
                                        <div class="actions">
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        @if(is_object($folder->maritimeFolder) || is_object($folder->arialFolder) || is_object($folder->roadFolder) || is_object($folder->transitFolder))
                                            <div class="row static-info">
                                                <div class="col-md-8 name"> Lieu d'embarquement:</div>
                                                @if(is_object($folder->maritimeFolder))
                                                    <div class="col-md-3 value"> {{ $folder->maritimeFolder->shipment_place }}</div>
                                                @elseif(is_object($folder->arialFolder))
                                                    <div class="col-md-3 value"> {{ $folder->arialFolder->shipment_place }}</div>
                                                @elseif(is_object($folder->RoadFolder))
                                                    <div class="col-md-3 value"> {{ $folder->roadFolder->shipment_place }}</div>
                                                @elseif(is_object($folder->transitFolder))
                                                    <div class="col-md-3 value"> {{ $folder->transitFolder->shipment_place }}</div>
                                                @endif
                                            </div>
                                            <div class="row static-info">
                                                <div class="col-md-8 name"> Lieu de débarquement:</div>
                                                @if(is_object($folder->maritimeFolder))
                                                    <div class="col-md-3 value"> {{ $folder->maritimeFolder->landing_place }}</div>
                                                @elseif(is_object($folder->arialFolder))
                                                    <div class="col-md-3 value"> {{ $folder->arialFolder->landing_place }}</div>
                                                @elseif(is_object($folder->roadFolder))
                                                    <div class="col-md-3 value"> {{ $folder->roadFolder->landing_place }}</div>
                                                @elseif(is_object($folder->transitFolder))
                                                    <div class="col-md-3 value"> {{ $folder->transitFolder->landing_place }}</div>
                                                @endif
                                            </div>
                                        @endif
                                        @if(is_object($folder->maritimeFolder))
                                            <div class="row static-info">
                                                <div class="col-md-8 name"> Navire:</div>
                                                <div class="col-md-3 value"> {{ $folder->maritimeFolder->ship }}</div>
                                            </div>
                                            <div class="row static-info">
                                                <div class="col-md-8 name"> Numéro BL:</div>
                                                <div class="col-md-3 value"> {{ $folder->maritimeFolder->bl_number }}</div>
                                            </div>
                                        @endif
                                        @if(is_object($folder->arialFolder))
                                            <div class="row static-info">
                                                <div class="col-md-8 name"> Numéro vol:</div>
                                                <div class="col-md-3 value"> {{ $folder->arialFolder->flight_number }}</div>
                                            </div>
                                            <div class="row static-info">
                                                <div class="col-md-8 name"> LTA:</div>
                                                <div class="col-md-3 value"> {{ $folder->arialFolder->lta_number }}</div>
                                            </div>
                                        @endif
                                        @if(is_object($folder->roadFolder))
                                            <div class="row static-info">
                                                <div class="col-md-8 name"> Camion:</div>
                                                <div class="col-md-3 value"> {{ $folder->roadFolder->truck }}</div>
                                            </div>
                                            <div class="row static-info">
                                                <div class="col-md-8 name"> Numéro CMA:</div>
                                                <div class="col-md-3 value"> {{ $folder->roadFolder->cma_number }}</div>
                                            </div>
                                        @endif
                                        @if(is_object($folder->logisticFolder))
                                            <div class="row static-info">
                                                <div class="col-md-8 name"> Date entrée:</div>
                                                <div class="col-md-3 value"> {{ $folder->logisticFolder->entry_date ? $folder->logisticFolder->entry_date->format('d/m/Y') :'' }}</div>
                                            </div>
                                            <div class="row static-info">
                                                <div class="col-md-8 name"> Date sortie:</div>
                                                <div class="col-md-3 value"> {{ $folder->logisticFolder->exit_date ? $folder->logisticFolder->exit_date->format('d/m/Y') :''}}</div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="portlet blue-steel box">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-shopping-cart"></i>Marchandises
                                        </div>
                                        <div class="actions">
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="row">
                                            <table class="table table-striped table-bordered table-hover"
                                                   id="articles_table">
                                                <thead>
                                                <tr role="row" class="heading">
                                                    <th style=" width : 20%;"> Numéro conteneur</th>
                                                    <th style=" width : 20%;"> Marque</th>
                                                    <th style=" width : 20%;"> Nombre de colis</th>
                                                    <th style=" width : 20%;"> Désignation</th>
                                                    <th style=" width : 10%;"> Poids Brut (kg)</th>
                                                    <th style=" width : 10%;">Volume (m³)</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($folder->articles as $article)
                                                    <tr>
                                                        <td>{{ $article->container_number }}</td>
                                                        <td>{{ $article->container_mark }}</td>
                                                        <td>{{ $article->packages_number }}</td>
                                                        <td>{{ $article->designation }}</td>
                                                        <td>{{ $article->gross_weight }}</td>
                                                        <td>{{ $article->volume }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="portlet_tab_1_2" class="tab-pane">
                            <div class="portlet light portlet-fit portlet-datatable bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-check-square-o font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">Bilan</span>
                                    </div>
                                    <div class="actions">

                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="well margin-top-20">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4 col-xs-8 text-stat">
                                                <center><span class="label label-success"> Total charges: </span>
                                                    <h3>{{ $total_charges }}</h3></center>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-8 text-stat">
                                                <center><span class="label label-info"> Total factures: </span>
                                                    <h3>{{ $total_invoices }}</h3></center>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-8 text-stat">
                                                <center><span class="label label-danger"> Résultat du dossier: </span>
                                                    <h3>{{ $total_invoices - $total_charges }}</h3></center>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End: life time stats -->

                        <div id="portlet_tab_1_3" class="tab-pane">
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="mt-element-list">
                                        <div class="mt-list-container list-simple ext-1">
                                            <ul id="liste_doc">
                                                <?php $i = 0;?>
                                                @foreach($folder->files as $file)
                                                    <li class="mt-list-item done" id="liste_member[<?php echo $i;?>]">
                                                        <div class="list-icon-container">
                                                            <i class="fa fa-file-o"></i>
                                                        </div>
                                                        <?php $s = json_encode($file);?>
                                                        <div class="list-datetime"><i class="glyphicon glyphicon-trash"
                                                                                      style="color: red;cursor: pointer;"
                                                                                      onclick='delete_doc(<?php echo $s;?>,"liste_member[<?php echo $i;?>]")'>
                                                            </i>
                                                        </div>
                                                        <div class="list-item-content">
                                                            <h3 class="uppercase">
                                                                <a href="{{ $file->link }}"
                                                                   target="_blank">{{ $file->name }}</a>
                                                            </h3>
                                                        </div>
                                                    </li>
                                                    <?php $i = $i + 1;?>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="portlet_tab_1_4" class="tab-pane">
                            <div class="portlet light portlet-fit portlet-datatable bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-money"></i>
                                        <span class="caption-subject font-dark sbold uppercase">Charges</span>
                                    </div>
                                    <div class="actions">

                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row">
                                        <table class="table table-striped table-bordered table-hover table-checkable"
                                               id="charges_table">
                                            <thead>
                                            <tr role="row" class="heading">
                                                <th style=" width: 50%;"> Description</th>
                                                <th style="text-align: center;width: 10%;"> Fournisseur</th>
                                                <th style="text-align: center;width: 5%;"> Type de paiement</th>
                                                <th style="width: 10%;"> Montant</th>
                                                <th style="width: 5%;"> Cours de change</th>
                                                <th style="width: 10%;"> Montant aprés conversion</th>
                                                <th style="width: 10%;"> Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($folder->charges as $charge)
                                                <tr>
                                                    <td>{!! strip_tags($charge->description) !!}</td>
                                                    <td>{{ $charge->supplier ? $charge->supplier->name : '' }}</td>
                                                    <td>{{ $charge->paymentType ? $charge->paymentType->name : ''}}</td>
                                                    <td>{{ $charge->amount }}</td>
                                                    <td>{{ $charge->exchange_rate }}</td>
                                                    <td>{{ $charge->amount_exchanged }}</td>
                                                    <td style="text-align: center"><a class="btn btn-sm blue"
                                                                                      href="{{ url('/charges/edit/'.$charge->id) }}">Edit</a>
                                                        <a class="btn btn-sm blue"
                                                           href="{{ url('/charges/delete/'.$charge->id) }}">Supprimer</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="portlet_tab_1_5" class="tab-pane">
                            <div class="portlet light portlet-fit portlet-datatable bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-file"></i>
                                        <span class="caption-subject font-dark sbold uppercase">Factures</span>
                                    </div>
                                    <div class="actions">

                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row">

                                        <table class="table table-striped table-bordered table-hover "
                                               id="invoices_table">
                                            <thead>
                                            <tr role="row" class="heading">
                                                <th style="width:10%;"> Numéro facture</th>
                                                <th style="width:10%;"> Type facture</th>
                                                <th style="text-align: center"> Date facture</th>
                                                <th> Montant</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($folder->invoices as $invoice)
                                                <tr>
                                                    <td>{{ $invoice->profix.$invoice->invoice_number }}</td>
                                                    <td>{{ $invoice->type->value }}</td>
                                                    <td style="text-align: center">{{ $invoice->invoice_date ? $invoice->invoice_date->format('d/m/Y') : ''}}</td>
                                                    <td>{{ $invoice->invoice_total }}</td>
                                                    <td><a class="btn btn-sm blue"
                                                           href="{{ url('/invoices/'.$invoice->id) }}">Détails</a></td>
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
    </div>

@endsection

@section('footer')



    <script>
        $(document).ready(function () {
            $("a[data-toggle=\"tab\"]").on("shown.bs.tab", function (e) {
                console.log('show tab');
                $($.fn.dataTable.tables(true)).DataTable()
                        .columns.adjust()
                        .responsive.recalc();
            });

            $('#articles_table').DataTable({
                responsive: true

            });


            $('#charges_table').DataTable({
                responsive: true

            });


            $('#invoices_table').DataTable({
                responsive: true

            });
        });
    </script>
    <script>
        function delete_doc(fich, id) {
            var conf = confirm("Voulez vous supprimer le fichier " + fich['name']);

            if (conf == true) {
                $.ajax({
                    url: "/file/delete",
                    method: "post",
                    data: {"_token": "{!! csrf_token() !!}", "file_id": fich['google_drive_id']},
                    success: function (data) {
                        console.log("success");
                        document.getElementById(id).remove();
                    }
                });
            }

        }
    </script>
@endsection