@extends('layouts/main')

@section('title')
    Ajouter un dossier
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
    <div class="row"><p>&nbsp</p></div>
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8" style="text-align: center">


            <div class="portlet-body">
                <div class="tiles" style="text-align: center">

                    <div class="tile triple bg-red-sunglo"
                         onclick="window.location='{{ url('/folder/maritime/add') }}'">
                        <div class="tile-body">
                            <i class="fa fa-ship"></i>
                        </div>
                        <div class="tile-object">
                            <div class="name"> Maritime</div>
                            <div class="number"></div>
                        </div>
                    </div>



                    <div class="tile triple bg-purple-studio"
                         onclick="window.location='{{ url('/folder/arial/add') }}'">

                        <div class="tile-body">
                            <i class="fa fa-plane"></i>
                        </div>
                        <div class="tile-object">
                            <div class="name"> Aerien</div>
                            <div class="number"></div>
                        </div>
                    </div>

                    <div class="tile triple bg-green-meadow" onclick="window.location='{{ url('/folder/road/add') }}'">
                        <div class="tile-body">
                            <i class="fa fa-truck"></i>
                        </div>
                        <div class="tile-object">
                            <div class="name"> Routier</div>
                            <div class="number"></div>
                        </div>
                    </div>

                    <div class="tile triple bg-red-intense"
                         onclick="window.location='{{ url('/folder/logistic/add') }}'">
                        <div class="tile-body">
                            <i class="fa fa-laptop"></i>
                        </div>
                        <div class="tile-object">
                            <div class="name"> Logistique</div>
                            <div class="number"></div>
                        </div>
                    </div>
                    <div class="tile triple bg-green" onclick="window.location='{{ url('/folder/transit/add') }}'">
                        <div class="tile-body">
                            <i class="fa fa-bus"></i>
                        </div>
                        <div class="tile-object">
                            <div class="name"> Transit</div>
                            <div class="number"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>



@endsection

@section('footer')
    <script src="<?php echo URL::asset('assets/pages/scripts/ui-buttons.min.js')?>" type="text/javascript"></script>
@endsection