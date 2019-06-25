@extends('layouts/main')
@section('title')
    Liste des fournisseurs
@endsection
@section('second-title')
    - Fournisseurs
@endsection
@section('url')
    Liste des fournisseurs
@endsection
@section('url-way')
    <li>
        <a href="{{ url('/supplier') }}">Fournisseurs</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>Liste des fournisseurs</span>
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
                        <i class="icon-user font-dark"></i>
                        <span class="caption-subject font-dark sbold uppercase">Fournisseurs</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-sm green" href="/supplier/add">Ajouter un nouvau fournisseurs</a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-container">
                        <div class="table-actions-wrapper">
                        </div>
                        <table class="table table-striped table-bordered table-hover table-checkable"
                               id="suppliers_table">
                            <thead>
                            <tr role="row" class="heading">
                                <th width="50%"> Nom</th>
                                <th width="20%" style="text-align: center"> Matricule fiscale</th>
                                <th width="20%" style="text-align: center"> Téléphone</th>
                                <th width="10%"> Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($suppliers as $supplier)
                                <tr>
                                    <td>{{ $supplier->name }}</td>
                                    <td>{{ $supplier->matricule_fiscale }}</td>
                                    <td>{{ $supplier->phone }}</td>
                                    <td style="text-align: center">
                                        <a class="btn btn-sm blue"
                                           href="{{ url('/supplier/'.$supplier->id) }}">Détails</a>
                                    </td>
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
    <script>
        $("#suppliers_table").DataTable({
            responsive : true
        });
    </script>
@endsection

