@extends('layouts.main')
@section('header')
    <link href="/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
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
                                        <span class="caption-subject font-blue bold uppercase"> Ajouter un dossier -
                                            <span class="step-title"> Etape 1 de 4 </span>
                                        </span>
                    </div>
                    <div class="actions">

                    </div>
                </div>
                <div class="portlet-body form">
                    <form action="#" class="form-horizontal" id="submit_form" method="POST">
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
                                        <a href="#tab3" data-toggle="tab" class="step active">
                                            <span class="number"> 3 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> Fichiers </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab4" data-toggle="tab" class="step">
                                            <span class="number"> 4 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> Confirmation </span>
                                        </a>
                                    </li>
                                </ul>
                                <div id="bar" class="progress progress-striped" role="progressbar">
                                    <div class="progress-bar progress-bar-success"> </div>
                                </div>
                                <div class="tab-content">
                                    <div class="alert alert-danger display-none">
                                        <button class="close" data-dismiss="alert"></button> Veuillez vérifier les données saisies </div>
                                    <div class="alert alert-success display-none">
                                        <button class="close" data-dismiss="alert"></button> Votre validation de formulaire est réussie! </div>
                                    <div class="tab-pane active" id="tab1">
                                        <h3 class="block">Détails de dossier</h3>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Nom client</label>
                                            <div class="col-md-4">
                                                <select name="nom_client" id="client_name" class="form-control">
                                                    <option value=""></option>
                                                    <option value="AF">cc</option>
                                                    <option value="AL">cc</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Date dossier
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="date" class="form-control" name="date_dossier" id="folder_date" />
                                                <span class="help-block">  </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Destination
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="destination" />
                                                <span class="help-block"> </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Numéro escale
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="escale_number" />
                                                <span class="help-block">  </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Numéro rubrique
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="rubrique_number" />
                                                <span class="help-block">  </span>
                                            </div>
                                        </div>

                                        <!--test-->



                                    <div class="supplem" id="Logistique">

                                         <div class="form-group">
                                             <label class="control-label col-md-3">Date entrée
                                                 <span class="required"> * </span>
                                             </label>
                                             <div class="col-md-4">
                                                 <input type="date" class="form-control" name="date_entree" />
                                                 <span class="help-block">  </span>
                                             </div>
                                         </div>
                                         <div class="form-group">
                                             <label class="control-label col-md-3">Date sortie
                                                 <span class="required"> * </span>
                                             </label>
                                             <div class="col-md-4">
                                                 <input type="date" class="form-control" name="date_sortie" />
                                                 <span class="help-block">  </span>
                                             </div>
                                         </div>
                                         <div class="form-group">
                                             <label class="control-label col-md-3">Superficie
                                                 <span class="required"> * </span>
                                             </label>
                                             <div class="col-md-4">
                                                 <input type="text" class="form-control" name="superficie" />
                                                 <span class="help-block">  </span>
                                             </div>
                                         </div>

                                     </div>
                                    <!-- <div class="supplem" style="display:none" id="Transit">

                                         <div class="form-group">
                                             <label class="control-label col-md-3">Lieu d'embarquement
                                                 <span class="required"> * </span>
                                             </label>
                                             <div class="col-md-4">
                                                 <input type="text" class="form-control" name="embarq_place" />
                                                 <span class="help-block">  </span>
                                             </div>
                                         </div>
                                         <div class="form-group">
                                             <label class="control-label col-md-3">Lieu de débarquement
                                                 <span class="required"> * </span>
                                             </label>
                                             <div class="col-md-4">
                                                 <input type="text" class="form-control" name="debarq_place" />
                                                 <span class="help-block">  </span>
                                             </div>
                                         </div>
                                         <div class="form-group">
                                             <label class="control-label col-md-3">Superficie
                                                 <span class="required"> * </span>
                                             </label>
                                             <div class="col-md-4">
                                                 <input type="text" class="form-control" name="superficie" />
                                                 <span class="help-block">  </span>
                                             </div>
                                         </div>

                                     </div>-->
                                    <!--test-->
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
                                                                    <button id="sample_editable_1_new" class="btn green"> Ajouter un marchandise
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
                                                    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                                        <thead>
                                                        <tr>
                                                            <th> Numéro  </th>
                                                            <th> Marque </th>
                                                            <th> Nombre de colis </th>
                                                            <th> Désignations </th>
                                                            <th> Poids brut (KG) </th>
                                                            <th>Editer</th>
                                                            <th> Supprimer </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td> dfsfdsf </td>
                                                            <td> sdfsdsfd </td>
                                                            <td> dsfdssfdsf </td>
                                                            <td class="center"> ersrsrsr </td>
                                                            <td> dfsfdsf </td>

                                                            <td>
                                                                <a class="edit" href="javascript:;"> Editer </a>
                                                            </td>
                                                            <td>
                                                                <a class="delete" href="javascript:;"> Supprimer </a>
                                                            </td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- END EXAMPLE TABLE PORTLET-->
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab3">
                                    <h3 class="block">Ficher</h3>

                                </div>
                                <div class="tab-pane" id="tab4">
                                    <h3 class="block">Confirm your account</h3>
                                    <h4 class="form-section">Account</h4>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Destination:</label>
                                        <div class="col-md-4">
                                            <p class="form-control-static" data-display="destination"> </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Email:</label>
                                        <div class="col-md-4">
                                            <p class="form-control-static" data-display="email"> </p>
                                        </div>
                                    </div>
                                    <h4 class="form-section">Profile</h4>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Fullname:</label>
                                        <div class="col-md-4">
                                            <p class="form-control-static" data-display="fullname"> </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Gender:</label>
                                        <div class="col-md-4">
                                            <p class="form-control-static" data-display="gender"> </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Phone:</label>
                                        <div class="col-md-4">
                                            <p class="form-control-static" data-display="phone"> </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Address:</label>
                                        <div class="col-md-4">
                                            <p class="form-control-static" data-display="address"> </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">City/Town:</label>
                                        <div class="col-md-4">
                                            <p class="form-control-static" data-display="city"> </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Country:</label>
                                        <div class="col-md-4">
                                            <p class="form-control-static" data-display="country"> </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Remarks:</label>
                                        <div class="col-md-4">
                                            <p class="form-control-static" data-display="remarks"> </p>
                                        </div>
                                    </div>
                                    <h4 class="form-section">Billing</h4>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Card Holder Name:</label>
                                        <div class="col-md-4">
                                            <p class="form-control-static" data-display="card_name"> </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Card Number:</label>
                                        <div class="col-md-4">
                                            <p class="form-control-static" data-display="card_number"> </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">CVC:</label>
                                        <div class="col-md-4">
                                            <p class="form-control-static" data-display="card_cvc"> </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Expiration:</label>
                                        <div class="col-md-4">
                                            <p class="form-control-static" data-display="card_expiry_date"> </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Payment Options:</label>
                                        <div class="col-md-4">
                                            <p class="form-control-static" data-display="payment[]"> </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <a href="javascript:;" class="btn default button-previous">
                                        <i class="fa fa-angle-left"></i> Back </a>
                                    <a href="javascript:;" class="btn btn-outline green button-next"> Continue
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                    <a href="javascript:;" class="btn green button-submit"> Envoyer
                                        <i class="fa fa-check"></i>
                                    </a>
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
    <script src="/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
    <script src="/assets/pages/scripts/form-wizard.js" type="text/javascript"></script>

    <script>

        $(function() {    // Makes sure the code contained doesn't run until
            //     all the DOM elements have loaded

            $('#choose_folder').change(function(){
                $('.supplem').hide();
                $('#' + $(this).val()).show();
            });

        });

    </script>
    <script src="/assets/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
    <script src="/assets/pages/scripts/table-datatables-editable.js" type="text/javascript"></script>
@endsection