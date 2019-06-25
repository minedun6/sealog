@extends('layouts/main')
@section('second-title')
    - Fournisseurs
@endsection
@section('title')
    Supprimer un fournisseur
@endsection

@section('url-way')
    <li>
        <a href="{{ url('/supplier') }}">Fournisseurs</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>Supprimer un fournisseur</span>
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
                </div>
                <div class="portlet-body">
                    <div class="table-container">
                        <p>
                            Vous êtes sûre de vouloir supprimer ce Fournisseur: {{ $supplier->name }}
                        </p>
                        <a href="{{ url('/supplier/destroy/'.$supplier->id) }}">Confirmer</a>
                    </div>
                </div>
            </div>
            <!-- End: life time stats -->
        </div>

    </div>

@endsection

