<html>
<head>
    <style type="text/css">
        @page {
            size: A4 portrait;
            margin: 10mm;
        }

        @media print {
            html, body {
                height: 297mm;

            }

            object {
                width: 21cm;
                height: 29.7cm;
                page-break-after: always;
            }
        }
        body, input, textarea {
            font-family: helvetica, sans-serif;
            font-size: 11pt;
            font-weight: 600;
            margin-top: 0px;
        }
        .img {

            text-align: center;
            float: none;
            width: 100%;
            margin-top: 50px;

        }

        .h4,
        .h5 {
            width: 50%;
            text-align: center;
            /*margin-left: 50px;;*/
        }

        .pocket {
            width: 30%;
            align: right;
            display: inline-flex;

        }

        .mytable {
            border: 1px solid;
            width: 100%;
            border-collapse: collapse;
            cellspacing: "0";
            word-wrap: break-word;
        }

        .mytable td {
            border: 1px solid;
            text-align: center;
            font-size: 8pt;
            font-weight: 500;
        }

        .mytable th {
            border: 1px solid;
            text-align: center;
            font-size: small;
            valign: "middle";
        }

        .mytable tr {
            border: 1px solid;
        }


    </style>
</head>
<body>
<?php $folder_type = $folder->type . 'Folder' ?>
<h2 style="text-align: center;margin-top: 10px;"><img style="width:180px;"
                                                      src="<?php echo public_path('assets/pages/img/sealog 1.png')?>">
</h2>
<div>
    <table width="100%">
        <thead>
        <tr>
            <th width="30%"></th>
            <th width="45%"></th>
            <th></th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <td><h5 style="margin-top: 0px; margin-bottom: 8px;">Dossier N : {{$folder->folder_number }}</h5></td>
            <td></td>
            <td><h5 style="margin-top: 0px; margin-bottom: 8px;">Date arrivée
                    : {{ $folder->folder_date->format('d/m/Y') }}</h5></td>
        </tr>
        <tr>
            <td><h5>Client : {{ $folder->client->name }}</h5></td>

        </tr>
        </tbody>
    </table>


    <br/>
    <table width="100%">
        <thead>
        <tr>

            <th width="28%"></th>
            <th width="32.5%"></th>
            <th width="25%"></th>
            <th></th>

        </tr>
        </thead>
        <tbody>
        <tr>
            @if($folder->type == 'maritime')
                <td>Moyen de transport :</td>
                <td> Navire</td>
            @elseif($folder->type == 'arial')
                <td>Moyen de transport :</td>
                <td>Avion</td>
            @else
                <td>Moyen de transport :</td>
                <td></td>
            @endif
            @if($folder->type == 'maritime')
                <td>Lieu d'embarquement
                    :
                </td>
                <td>{{ $folder->maritimeFolder->shipment_place }}</td>
            @elseif($folder->type == 'arial')
                <td>Lieu d'embarquement
                    :
                </td>
                <td>{{ $folder->arialFolder->shipment_place }}></td>
            @elseif($folder->type == 'road')
                <td>Lieu d'embarquement
                    :
                </td>
                <td>{{ $folder->roadFolder->shipment_place }}</td>
            @elseif($folder->type == 'transit')
                <td>Lieu d'embarquement
                    :
                </td>
                <td>{{ $folder->transitFolder->shipment_place }}</td>
            @else
                <td>Lieu d'embarquement
                    :
                </td>
                <td></td>
            @endif
        </tr>
        <tr>

            <td></td>
            <td></td>
            @if($folder->type == 'maritime')
                <td>Lieu de débarquement
                    :
                </td>
                <td>{{ $folder->maritimeFolder->landing_place }}</td>
            @elseif($folder->type == 'arial')
                <td>Lieu de débarquement
                    :
                </td>
                <td>{{ $folder->arialFolder->landing_place }}</td>
            @elseif($folder->type == 'road')
                <td>Lieu de débarquement
                    :
                </td>
                <td>{{ $folder->roadFolder->landing_place }}</td>
            @elseif($folder->type == 'transit')
                <td>Lieu de débarquement
                    :
                </td>
                <td> {{ $folder->transitFolder->landing_place }}</td>
            @else
                <td>Lieu de débarquement
                    :
                </td>
                <td></td>
            @endif
        </tr>
        <tr>
            @if($folder->escale_number != null)
                <td>Numéro escale :</td>
                <td>{{ $folder->escale_number }}</td>
                @if($folder->type == 'maritime')
                    <td> Navire :</td>
                    <td>  {{ $folder->maritimeFolder->ship }} @endif</td>
                    @if($folder->type == 'arial')
                        <td> Num Vol :</td>
                        <td> {{ $folder->arialFolder->flight_number }} @endif</td>
                        <td><h5>  @if($folder->type == 'road')
                                    Remorque : {{ $folder->roadFolder->truck }} @endif</h5></td>
                    @endif
                    @if($folder->escale_number == null)
                        <td></td>
                        <td></td>
                        @if($folder->type == 'maritime')
                            <td> Navire :</td>
                            <td>  {{ $folder->maritimeFolder->ship }} @endif</td>
                            @if($folder->type == 'arial')
                                <td> Num Vol :</td>
                                <td> {{ $folder->arialFolder->flight_number }} @endif</td>
                                <td><h5>  @if($folder->type == 'road')
                                            Remorque : {{ $folder->roadFolder->truck }} @endif</h5></td>
                            @endif
        </tr>

        <tr>
            @if($folder->rubric_number != null)
                <td>Numéro rubrique :</td>
                <td> {{ $folder->rubric_number }}</td>
                @if($folder->type == 'maritime')
                    <td>BL :</td>
                    <td>{{ $folder->maritimeFolder->bl_number }} </td>
                @elseif($folder->type == 'arial')
                    <td>Num LTA :</td>
                    <td>{{ $folder->arialFolder->lta_number }}</td>
                @elseif($folder->type == 'road')
                    <td>Remorque :</td>
                    <td>{{ $folder->roadFolder->cma_number }} </td>
                @endif

            @endif
            @if($folder->rubric_number == null)
                <td></td>
                <td></td>
                @if($folder->type == 'maritime')
                    <td>BL : }</td>
                    <td>{{ $folder->maritimeFolder->bl_number }} </td>
                @elseif($folder->type == 'arial')
                    <td>Num LTA :</td>
                    <td>{{ $folder->arialFolder->lta_number }}</td>
                @elseif($folder->type == 'road')
                    <td>Remorque :</td>
                    <td>{{ $folder->roadFolder->cma_number }} </td>
                @endif
            @endif
        </tr>
        </tbody>
    </table>

    <br/>
    <br/>

    <table class="mytable">
        <tr>
            <th width="25%"> Numéro conteneur</th>
            <th width="20%">Nombre de colis</th>
            <th width="35%"> Désignation de marchandise</th>

            <th width="20%"> Poids Brut (KG)</th>
            <th width="20%"> Volume (m³)</th>
        </tr>
        @foreach($folder->articles as $article)
            <tr>
                <td>{{ $article->container_number }}</td>
                <td>{{ $article->packages_number }}</td>
                <td>{{ $article->designation }}</td>
                <td>{{ $article->gross_weight != null ? $article->gross_weight : '' }}</td>
                <td>{{ $article->volume != null ? $article->volume : ''}}</td>
            </tr>
        @endforeach

    </table>
    </br>
    </br>

    <table width="80%" style="margin-left: 80px">
        <tr>
            <th width="40%"></th>
            <th width="20%"></th>
            <th width="40%"></th>
        </tr>
        @if($folder->invoice !== null)
            <tr>
                <td><h5>Facture N : {{ $folder->invoice->prefix.$folder->invoice->invoice_number }}</h5></td>
                <td></td>
                <td><h5>Date facture : {{ $folder->invoice->invoice_date->format('d/m/Y') }}</h5></td>
            </tr>
        @endif
    </table>
</div>
</body>
</html>