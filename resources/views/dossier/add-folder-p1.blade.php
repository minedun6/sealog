@extends('layouts/main')

@section('title')
    Ajouter un dossier
@endsection
@section('second-title')
    - Dossiers
@endsection
@section('url')

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




        <div class="portlet-body" >
            <div class="tiles">

                <div class="tile triple bg-red-sunglo" onclick="window.location='/dossiers/add/maritime'">
                    <div class="tile-body">
                        <i class="fa fa-ship"></i>
                    </div>
                    <div class="tile-object">
                        <div class="name"> Maritime </div>
                        <div class="number">  </div>
                    </div>
                </div>



                <div class="tile triple bg-purple-studio" onclick="window.location='/dossiers/add/aerien'">
                    <div class="tile-body">
                        <i class="fa fa-plane"></i>
                    </div>
                    <div class="tile-object">
                        <div class="name"> Aerien </div>
                        <div class="number">  </div>
                    </div>
                </div>

                <div class="tile triple bg-green-meadow" onclick="window.location='/dossiers/add/routier'">
                    <div class="tile-body">
                        <i class="fa fa-truck"></i>
                    </div>
                    <div class="tile-object">
                        <div class="name"> Routier </div>
                        <div class="number">  </div>
                    </div>
                </div>

                <div class="tile triple bg-red-intense" onclick="window.location='/dossiers/add/logistique'">
                    <div class="tile-body">
                        <i class="fa fa-laptop"></i>
                    </div>
                    <div class="tile-object">
                        <div class="name"> Logistique </div>
                        <div class="number">  </div>
                    </div>
                </div>
                <div class="tile triple bg-green" onclick="window.location='/dossiers/add/transit'">
                    <div class="tile-body">
                        <i class="fa fa-bus"></i>
                    </div>
                    <div class="tile-object">
                        <div class="name"> Transit </div>
                        <div class="number"> </div>
                    </div>
                </div>


            </div>
        </div>
        </div>
        <div class="col-md-2"></div>
    </div>



@endsection

@section('footer')<script src="../assets/pages/scripts/ui-buttons.min.js" type="text/javascript"></script>
@endsection