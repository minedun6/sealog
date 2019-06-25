@extends('layouts.main')
@section('header')


@endsection
@section('title')

@endsection
@section('url')
    Editer un client
@endsection
@section('url-way')
    <li>
        <a href="#">Dossier</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>Editer</span>
    </li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="portlet light bordered" id="form_wizard_1">
                <div class="portlet-title">
                    <div class="caption">
                        <i class=" icon-layers font-blue"></i>
                                        <span class="caption-subject font-blue bold uppercase"> Editer un dossier @if($folder->type == 'maritime')
                                                <span
                                                        class="label label-sm label-danger">Maritime</span> @elseif($folder->type == 'arial')
                                                <span
                                                        class="label label-sm label-info">Aerien</span>@elseif($folder->type == 'transit')
                                                <span
                                                        class="label label-sm label-info">Transit</span>@elseif($folder->type == 'road')
                                                <span
                                                        class="label label-sm label-success">Routier</span> @else <span
                                                        class="label label-sm label-danger">Logistique</span>@endif-
                                                <span class="step-title"> Etape 1 de 3 </span>
                                        </span>
                    </div>
                    <div class="actions">

                    </div>
                </div>
                <div class="portlet-body form">
                    <form action="{{ url('/folder/'.$folder->type.'/edit/'.$folder->id) }}" class="form-horizontal"
                          id="submit_form"
                          method="POST">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="form-wizard">
                            <div class="form-body">
                                <ul class="nav nav-pills nav-justified steps">
                                    <li>
                                        <a href="#tab1" data-toggle="tab" class="step">
                                            <span class="number"> 1 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> Détails </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab2" data-toggle="tab" class="step">
                                            <span class="number"> 2 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> Marchandise </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#tab4" data-toggle="tab" class="step">
                                            <span class="number"> 3 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> Confirmation </span>
                                        </a>
                                    </li>
                                </ul>
                                <div id="bar" class="progress progress-striped" role="progressbar">
                                    <div class="progress-bar progress-bar-success"></div>
                                </div>
                                <div class="tab-content">
                                    <div class="alert alert-danger display-none">
                                        <button class="close" data-dismiss="alert"></button>
                                        Veuillez vérifier les données saisies
                                    </div>
                                    <div class="alert alert-success display-none">
                                        <button class="close" data-dismiss="alert"></button>
                                        Votre validation de formulaire est réussie!
                                    </div>
                                    <div class="tab-pane active" id="tab1">
                                        <h3 class="block">Détails de dossier</h3>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Année</label>
                                            <div class="col-md-4 ui-widget">
                                                <select class="form-control" id="folder_year" name="folder_year">
                                                    <?php $year = \Carbon\Carbon::now('Africa/Tunis')->year; ?>
                                                    <option value="{{ $year }}">{{ $year}}</option>
                                                    <option value="{{ $year-1 }}">{{ $year -1 }}</option>
                                                    <option value="{{ $year-2 }}">{{ $year-2}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Numéro dossier</label>
                                            <div class="col-md-4 ui-widget">
                                                <input id="folder_number"
                                                       value="{{ intval(substr($folder->folder_number, 3, 7)) }}"
                                                       name="num_dossier" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Nom client <span
                                                        class="required"> * </span></label>
                                            <div class="col-md-4">
                                                <select name="client_id" id="client_name" class="form-control">
                                                    <option value=""></option>
                                                    @foreach($clients as $client)
                                                        @if($folder->client_id == $client->id)
                                                            <option selected
                                                                    value="{{ $client->id }}">{{ $client->name }}</option>
                                                        @else
                                                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Date dossier
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input class="form-control form-control-inline input-medium date-picker"
                                                       size="16" type="text"
                                                       value="{{ $folder->folder_date->format('d/m/Y') }}"
                                                       name="folder_date"/>
                                                <span class="help-block">  </span>
                                            </div>
                                        </div>
                                        <div class="form-group" id="esc_number">
                                            <label class="control-label col-md-3">Numéro escale

                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control"
                                                       value="{{ $folder->escale_number }}" name="escale_number"/>
                                                <span class="help-block">  </span>
                                            </div>
                                        </div>
                                        <div class="form-group" id="rub_number">
                                            <label class="control-label col-md-3">Numéro rubrique

                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control"
                                                       value="{{ $folder->rubric_number }}" name="rubric_number"/>
                                                <span class="help-block">  </span>
                                            </div>
                                        </div>
                                        @if(in_array($folder->type, ['maritime', 'arial', 'road']))
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Type
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="radio-list" id="place_errors">
                                                        @if($folder->type == 'maritime')
                                                            <label>
                                                                <input type="radio" name="type" value="import"
                                                                       {{ $folder->maritimeFolder->type == 'import' ? 'checked' : '' }}
                                                                       data-title="Import"
                                                                       onchange="document.getElementById('esc_number').style.display = 'block';document.getElementById('rub_number').style.display = 'block';"/>
                                                                Import </label>
                                                            <label>
                                                                <input type="radio" name="type" value="export"
                                                                       id="prepare_type"
                                                                       {{ $folder->maritimeFolder->type == 'export' ? 'checked' : '' }}
                                                                       data-title="Export"
                                                                       onchange="document.getElementById('esc_number').style.display = 'none';document.getElementById('rub_number').style.display = 'none';"/>
                                                                Export </label>
                                                        @elseif($folder->type == 'arial')
                                                            <label>
                                                                <input type="radio" name="type" value="export"
                                                                       id="prepare_type"
                                                                       {{ $folder->arialFolder->type == 'export' ? 'checked' : '' }}
                                                                       data-title="Export"
                                                                       onchange="document.getElementById('esc_number').style.display = 'none';document.getElementById('rub_number').style.display = 'none';"/>
                                                                Export </label>
                                                            <label>
                                                                <input type="radio" name="type" value="import"
                                                                       {{ $folder->arialFolder->type == 'import' ? 'checked' : '' }}
                                                                       data-title="Import"
                                                                       onchange="document.getElementById('esc_number').style.display = 'block';document.getElementById('rub_number').style.display = 'block';"/>
                                                                Import </label>
                                                        @elseif($folder->type == 'road')
                                                            <label>
                                                                <input type="radio" name="type" value="import"
                                                                       {{ $folder->roadFolder->type == 'import' ? 'checked' : '' }}
                                                                       data-title="Import"
                                                                       onchange="document.getElementById('esc_number').style.display = 'block';document.getElementById('rub_number').style.display = 'block';"/>
                                                                Import </label>
                                                            <label>
                                                                <input type="radio" name="type" value="export"
                                                                       id="prepare_type"
                                                                       {{ $folder->roadFolder->type == 'export' ? 'checked' : '' }}
                                                                       data-title="Export"
                                                                       onchange="document.getElementById('esc_number').style.display = 'none';document.getElementById('rub_number').style.display = 'none';"/>
                                                                Export </label>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if($folder->type != 'logistic')
                                            @if($folder->type == 'maritime')
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Lieu d'embarquement

                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control"
                                                               value="{{ $folder->maritimeFolder->shipment_place }}"
                                                               name="shipment_place"/>
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Lieu de débarquement

                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="landing_place"
                                                               value="{{ $folder->maritimeFolder->landing_place }}"/>
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Navire

                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control"
                                                               value="{{ $folder->maritimeFolder->ship }}"
                                                               name="ship"/>
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Num BL

                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control"
                                                               value="{{ $folder->maritimeFolder->bl_number }}"
                                                               name="bl_number"/>
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>
                                            @elseif($folder->type == 'arial')
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Lieu d'embarquement

                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control"
                                                               value="{{ $folder->arialFolder->shipment_place }}"
                                                               name="shipment_place"/>
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Lieu de débarquement

                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control"
                                                               value="{{ $folder->arialFolder->landing_place }}"
                                                               name="landing_place"/>
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Num Vol

                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control"
                                                               value="{{ $folder->arialFolder->flight_number }}"
                                                               name="vol"/>
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Num LTA

                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control"
                                                               value="{{ $folder->arialFolder->lta_number }}"
                                                               name="lta"/>
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>
                                            @elseif($folder->type == 'road')
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Lieu d'embarquement

                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control"
                                                               value="{{ $folder->roadFolder->shipment_place }}"
                                                               name="shipment_place"/>
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Lieu de débarquement

                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control"
                                                               value="{{ $folder->roadFolder->landing_place }}"
                                                               name="landing_place"/>
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Remorque

                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control"
                                                               value="{{ $folder->roadFolder->truck }}"
                                                               name="camion"/>
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Num CMA

                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control"
                                                               value="{{ $folder->roadFolder->cma_number }}"
                                                               name="cma"/>
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>
                                            @elseif($folder->type == 'transit')
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Lieu d'embarquement

                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control"
                                                               value="{{ $folder->transitFolder->shipment_place }}"
                                                               name="shipment_place"/>
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Lieu de débarquement

                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control"
                                                               value="{{ $folder->transitFolder->landing_place }}"
                                                               name="landing_place"/>
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>
                                            @endif
                                        @else
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Date entrée

                                                </label>
                                                <div class="col-md-4">
                                                    <input class="form-control form-control-inline input-medium date-picker"
                                                           value="{{ $folder->logisticFolder->entry_date->format('d/m/Y') }}"
                                                           size="16" type="text" name="date_entree"/>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Date sortie

                                                </label>
                                                <div class="col-md-4">
                                                    <input class="form-control form-control-inline input-medium date-picker"
                                                           value="{{ $folder->logisticFolder->exit_date->format('d/m/Y') }}"
                                                           size="16" type="text" name="date_sortie"/>
                                                    <span class="help-block">  </span>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Superficie

                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control"
                                                           value="{{ $folder->logisticFolder->area }}"
                                                           name="superficie"/>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="tab-pane" id="tab2">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                <div class="portlet light portlet-fit bordered">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="icon-settings font-red"></i>
                                                            <span class="caption-subject font-red sbold uppercase">Marchandises</span>
                                                        </div>
                                                        <div class="actions">

                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="table-toolbar">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="btn-group">
                                                                        <button id="ajout_mytable" class="btn green">
                                                                            Ajouter un marchandise
                                                                            <i class="fa fa-plus"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div class="btn-group">
                                                                        <button id="remove_last_raw" class="btn red">
                                                                            Effacer
                                                                            <i class="fa fa-plus"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="btn-group pull-right">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <table class="table table-striped table-hover table-bordered"
                                                               id="my_table">
                                                            <thead>
                                                            <tr>
                                                                <th> Numéro conteneur</th>
                                                                <th> Type</th>
                                                                <th> Nombre de colis</th>
                                                                <th> Désignations</th>
                                                                <th> Poids brut (KG)</th>
                                                                <th>Volume (m³)</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($folder->articles as $index => $article)
                                                                <tr>
                                                                    <td class="center">
                                                                        <input type="hidden"
                                                                               name="article_id[{{ $index }}]"
                                                                               id="article_id"
                                                                               value="{{ $article->id }}">
                                                                        <input type="text"
                                                                               class="form-control"
                                                                               value="{{ $article->container_number }}"
                                                                               name="numero_marchandise[{{ $index }}]">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text"
                                                                               value="{{ $article->container_mark }}"
                                                                               class="form-control "
                                                                               name="marque_marchandise[{{ $index }}]">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text"
                                                                               value="{{ $article->packages_number }}"
                                                                               class="form-control "
                                                                               name="nombre[{{ $index }}]">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text"
                                                                               value="{{ $article->designation }}"
                                                                               class="form-control "
                                                                               name="designation[{{ $index }}]">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text"
                                                                               value="{{ $article->gross_weight }}"
                                                                               class="form-control "
                                                                               name="poids[{{ $index }}]">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text"
                                                                               value="{{ $article->volume }}"
                                                                               class="form-control "
                                                                               name="volume[{{ $index }}]">
                                                                    </td>
                                                                    <td class="center">
                                                                        <a class="btn btn-sm red"
                                                                           href="{{ url('folder/article/remove/'.$article->id) }}">supprimer</a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>

                                                        </table>
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="tab4">
                                        <h3 class="block">Confirmation</h3>
                                        <h4 class="form-section">Informations général</h4>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Nom client:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="client_id"></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Date dossier:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="folder_date"></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Destination:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="destination"></p>
                                            </div>
                                        </div>
                                        <div class="form-group" id="esc_number1">
                                            <label class="control-label col-md-3">Numéro escale:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="escale_number"></p>
                                            </div>
                                        </div>
                                        <div class="form-group" id="rub_number1">
                                            <label class="control-label col-md-3">Numéro rubrique:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="rubric_number"></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Type:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="type"></p>
                                            </div>
                                        </div>
                                        <h4 class="form-section">Détails</h4>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Lieu d'embarquement:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="shipment_place"></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Lieu de débarquement:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="landing_place"></p>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Navire:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="ship"></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Num BL:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="bl_number"></p>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <a href="javascript:;" class="btn default button-previous">
                                            <i class="fa fa-angle-left"></i> Retour </a>
                                        <a href="javascript:;" class="btn btn-outline green button-next"> Continue
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                        <button type="submit" class="btn green button-submit"> Envoyer
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('footer')


    <script src="{{ URL::asset('assets/pages/scripts/form-wizard.js') }}" type="text/javascript"></script>



    <script>
        $('#ajout_mytable').on('click', function (e) {
            // Prevent the default action of the clicked item. In this case that is submit
            e.preventDefault();
            // Open your modal here
            length = $("#my_table > tbody > tr").length;
            $('#my_table tr:last').after('' +
                    '<tr><td class="center"><input type="text" class="form-control " name="numero_marchandise[' + length + ']" > </td> ' +
                    '<td class="center"><input type="text" class="form-control " name="marque_marchandise[' + length + ']" ></td>' +
                    '<td class="center"><input type="text" class="form-control " name="nombre[' + length + ']" ></td>+' +
                    '<td class="center"><input type="text" class="form-control " name="designation[' + length + ']" ></td>' +
                    '<td class="center"><input type="text" class="form-control " name="poids[' + length + ']" ></td>' +
                    '<td class="center"><input type="text" class="form-control " name="volume[' + length + ']" ></td>' +
                    '  </tr>'
            )
            ;

            // Make sure the button is not submitted after all!
            return true;
        });

        $('#remove_last_raw').on('click', function (e) {
            //alert('effacer');
            e.preventDefault();
            var length = $("#my_table > tbody > tr").length;
            if (length > 1) {
                $("#my_table > tbody > tr").last().remove();
            }
        });
    </script>





    <script>
        $(document).ready(function () {
            $('.date-picker').datepicker();
            if (document.getElementById("prepare_type").checked) {
                document.getElementById('esc_number').style.display = 'none';
                document.getElementById('rub_number').style.display = 'none';
            }
        });
    </script>
@endsection