@extends('layouts.main')
@section('title')
    Fichiers
@endsection
@section('second-title')
    - Fichiers
@endsection
@section('url')
    Fichiers
@endsection
@section('url-way')
    <li>
        <a href="#">Dossier</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>Fichiers</span>
    </li>
@endsection
@section('header')
    <link href="<?php echo URL::asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') ?>" rel="stylesheet" type="text/css">
@endsection
@section('content')

    <div class="row">
        <div class="portlet light portlet-fit bordered">
            <div class="portlet-title">
                <div class="caption">

                </div>
            </div>
            <div class="portlet-body">
                <div class="mt-element-list">

                    <div class="mt-list-container list-simple ext-1">
                        <ul>
                            <li class="mt-list-item done">
                                <div class="list-icon-container">
                                    <i class="fa fa-file-o"></i>
                                </div>
                                <div class="list-datetime"   ><button type="button" class="btn red">Supprimer</button></div>
                                <div class="list-item-content">
                                    <h3 class="uppercase">
                                        <a href="">Fichier num 1</a>
                                    </h3>
                                </div>
                            </li>
                            <li class="mt-list-item done">
                                <div class="list-icon-container">
                                    <i class="fa fa-file-o"></i>
                                </div>
                                <div class="list-datetime" > <button type="button" class="btn red">Supprimer</button> </div>
                                <div class="list-item-content">
                                    <h3 class="uppercase">
                                        <a href="">Fichier num 2</a>
                                    </h3>
                                </div>
                            </li>


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('footer')
    <script src="<?php echo URL::asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') ?>" type="text/javascript"></script>
@endsection