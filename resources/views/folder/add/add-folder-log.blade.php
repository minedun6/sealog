@extends('layouts.main')
@section('header')

@endsection
@section('title')

@endsection
@section('url')
    Ajouter un client
@endsection
@section('url-way')
    <li>
        <a href="#">Dossier</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>Ajouter</span>
    </li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="portlet light bordered" id="form_wizard_1">
                <div class="portlet-title">
                    <div class="caption">
                        <i class=" icon-layers font-blue"></i>
                         <span class="caption-subject font-blue bold uppercase"> Ajouter un dossier - <span
                                     class="label label-sm label-danger">Logistique</span>
                             <span class="step-title"> Etape 1 de 3 </span>
                          </span>
                    </div>
                    <div class="actions">

                    </div>
                </div>
                <div class="portlet-body form">
                    <form action="{{ url('/folder/logistic/add') }}" class="form-horizontal" id="submit_form"
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
                                                <input id="folder_number" name="num_dossier" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Nom client <span
                                                        class="required"> * </span></label>
                                            <div class="col-md-4 ui-widget">
                                                <input id="client_name" name="nom_client" class="form-control"/>
                                                <input type="hidden" name="nom_client" id="client_id" value=""/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Date dossier
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">

                                                <input class="form-control form-control-inline input-medium date-picker"
                                                       size="16" type="text" name="date_dossier"/>


                                                <span class="help-block">  </span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Numéro escale

                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="escale_number"/>
                                                <span class="help-block">  </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Numéro rubrique

                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="rubrique_number"/>
                                                <span class="help-block">  </span>
                                            </div>
                                        </div>

                                        <!--test-->


                                        <div class="supplem" id="Logistique">

                                            <div class="form-group">
                                                <label class="control-label col-md-3">Date entrée

                                                </label>
                                                <div class="col-md-4">


                                                    <input class="form-control form-control-inline input-medium date-picker"
                                                           size="16" type="text" name="date_entree"/>

                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Date sortie

                                                </label>
                                                <div class="col-md-4">

                                                    <input class="form-control form-control-inline input-medium date-picker"
                                                           size="16" type="text" name="date_sortie"/>


                                                    <span class="help-block">  </span>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>


                                        </div>

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
                                                                <th> Volume (m³)</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>

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
                                        <div class="form-group" style="margin-bottom: 0px">
                                            <label class="control-label col-md-3">Nom client:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="nom_client"></p>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 0px">
                                            <label class="control-label col-md-3">Date dossier:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="date_dossier"></p>
                                            </div>
                                        </div>


                                        <div class="form-group" style="margin-bottom: 0px">
                                            <label class="control-label col-md-3">Numéro escale:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="escale_number"></p>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 0px">
                                            <label class="control-label col-md-3">Numéro rubrique:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="rubrique_number"></p>
                                            </div>
                                        </div>

                                        <h4 class="form-section">Détails</h4>
                                        <div class="form-group" style="margin-bottom: 0px">
                                            <label class="control-label col-md-3">Date entrée:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="date_entree"></p>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 0px">
                                            <label class="control-label col-md-3">Date sortie:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="date_sortie"></p>
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
            $('#my_table tbody').append('' +
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

            if (length > 0) {

                $("#my_table > tbody > tr").last().remove();

            }
        });

    </script>



    <script>

        $('.date-picker').datepicker();

    </script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script>
        $("#client_name").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: "{{ url('/clients/find_clients') }}",
                    dataType: "json",
                    type: 'post',
                    data: {
                        'client_name': $("#client_name").val(),
                        '_token': "{!! csrf_token() !!}"
                    },
                    success: function (data) {
                        response(data);
                    }
                });
            },
            minLength: 3,
            change: function (event, ui) {
                if (ui.item == null || ui.item == undefined) {
                    $("#client_name").val("");
                    $("#client_name").attr("disabled", false);
                } else {
                    $("#client_id").val(ui.item.id);

                }
            }
        });
    </script>
@endsection