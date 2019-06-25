@extends('layouts/main')
@section('header')

    @endsection
@section('second-title')
    - Dossiers
@endsection
@section('title')
    Liste des dossiers

@endsection
@section('url')
    Liste des dossiers
@endsection
@section('url-way')
    <li>
        <a href="#">Dossier</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>Liste des dossiers</span>
    </li>
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <!--<div class="note note-danger">
                <p> NOTE: The below datatable is not connected to a real database so the filter and sorting is just simulated for demo purposes only. </p>
            </div>-->
            <!-- Begin: life time stats -->
            <div class="portlet light portlet-fit portlet-datatable bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-folder-alt font-dark"></i>
                        <span class="caption-subject font-dark sbold uppercase">Dossiers
                             <span> <button type="button" id="btnAll" class="custom-filter btn btn-sm blue-ebonyclay">Tous
                                 </button> <button type="button" id="btnMar"
                                            class="custom-filter btn btn-sm red-mint">Maritime
                                 </button>
                            <button type="button" id="btnAer" class="custom-filter btn btn-sm purple">Aerien
                            </button>
                            <button type="button"  id="btnRoa" class="custom-filter btn btn-sm green">Routier
                            </button>
                            <button type="button" id="btnLog" class="custom-filter btn btn-sm red-intense">
                                Logistique
                            </button>
                             <button type="button"  id="btnTra" class="custom-filter btn btn-sm blue-sharp">
                                 Transit
                             </button>
                        </span> </span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-sm green" href="/folder/add">Ajouter un nouveau dossier</a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-container">
                        <div class="table-actions-wrapper">
                        </div>
                        <table class="table table-striped table-bordered table-hover table-checkable"
                               id="folders_table">
                            <thead>
                            <tr role="row" class="heading">
                                <th width="20%"> Numéro dossier</th>
                                <th width="15%"> Date dossier</th>
                                <th width="15%"> Nombre des contenaires</th>
                                <th width="40%"> Nom client</th>
                                <th width="10%"> Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($folders as $folder)
                                <tr data-type="{{ $folder->type }}">
                                    <td>{{ $folder->folder_name.$folder->folder_number }}</td>
                                    <td>{{ $folder->folder_date->format('d/m/Y') }}</td>
                                    <td>{{ count($folder->articles) }}</td>
                                    <td>{{ $folder->client->name }}</td>
                                    <td style="text-align: center"><a class="btn btn-sm blue"
                                                                      href="{{ url('/folder/'.$folder->id) }}">Détails</a>
                                    </td>
                                    <td>{{ $folder->type }}</td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <!-- End: life time stats -->
        </div>

    </div>

@endsection

@section('footer')

    <script type="text/javascript" src="{{ URL::asset('assets/scripts/datatablefilter.js') }}"></script>

@endsection

