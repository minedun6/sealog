@extends('layouts/main')

@section('title')
    Tableau de bord
    @endsection

    @section('content')
            <!-- /////////////////////////////////////// Les stats //////////////////////////////////// -->
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat blue">
                <div class="visual">
                    <i class="fa fa-calculator"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup"
                              data-value="{{ $total_invoice_of_this_month }}">
                            {{ $total_invoice_of_this_month }}
                        </span>
                    </div>
                    <div class="desc"> Total Factures de mois</div>
                </div>
                <a class="more" href="{{ url('/invoices') }}"> Consulter liste factures
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat red">
                <div class="visual">
                    <i class="fa fa-money"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup"
                              data-value="{{ round($benefits_of_this_month, 3) }}">{{ round($benefits_of_this_month, 3) }}
                        </span>
                    </div>
                    <div class="desc"> Total facturé de mois</div>
                </div>
                <a class="more" href="javascript:;"> Plus de détails
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat purple">
                <div class="visual">
                    <i class="fa fa-calculator"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup"
                              data-value="{{ round($total_charges_of_this_month, 3) }}">
                       {{ round($total_charges_of_this_month, 3) }}
                        </span>
                    </div>
                    <div class="desc"> Total charges de mois</div>
                </div>
                <a class="more" href="javascript:;"> Consulter liste des charges
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat green-jungle">
                <div class="visual">
                    <i class="fa fa-calculator"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup"
                              data-value="{{ round($benefits_of_this_month - $total_charges_of_this_month, 3) }}">
                       {{ round($benefits_of_this_month - $total_charges_of_this_month, 3) }}
                        </span>
                    </div>
                    <div class="desc"> Total bénéfices de mois</div>
                </div>
                <a class="more" href="javascript:;"> Plus de détails
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat blue">
                <div class="visual">
                    <i class="fa fa-calculator"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup"
                              data-value="{{ $total_invoice_of_this_year }}">
                            {{ $total_invoice_of_this_year }}
                        </span>
                    </div>
                    <div class="desc"> Total Factures de l'année</div>
                </div>
                <a class="more" href="{{ url('/invoices') }}"> Consulter liste factures
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat red">
                <div class="visual">
                    <i class="fa fa-money"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup"
                              data-value="{{ round($benefits_of_this_year, 3) }}">{{ round($benefits_of_this_year, 3) }}
                        </span>
                    </div>
                    <div class="desc"> Total facturé de l'année</div>
                </div>
                <a class="more" href="javascript:;"> Plus de détails
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat purple">
                <div class="visual">
                    <i class="fa fa-calculator"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{ round($total_charges_of_this_year, 3) }}">
                       {{ round($total_charges_of_this_year, 3) }}
                        </span>
                    </div>
                    <div class="desc"> Total charges de l'année</div>
                </div>
                <a class="more" href="javascript:;"> Consulter liste des charges
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat green-jungle">
                <div class="visual">
                    <i class="fa fa-calculator"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup"
                              data-value="{{ round($benefits_of_this_year - $total_charges_of_this_year, 3) }}">
                       {{ round($benefits_of_this_year - $total_charges_of_this_year, 3) }}
                        </span>
                    </div>
                    <div class="desc"> Total bénéfices de l'année</div>
                </div>
                <a class="more" href=""> Plus de détails
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- /////////////////////////////////////// Les graphes //////////////////////////////////// -->

    <div class="row">
        <div class="col-md-6 col-sm-6">
            <!-- BEGIN PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-share font-red-sunglo hide"></i>
                        <span class="caption-subject font-red-sunglo bold uppercase">Charges</span>
                        <span class="caption-helper">par fournisseur</span>
                    </div>
                    <div class="actions">

                    </div>
                </div>
                <div class="portlet-body">
                    <div id="site_activities_loading" style="display: none;">
                        <img src="" alt="loading">
                    </div>
                    <div id="site_activities_content" class="display-none" style="display: block;">
                        <div id="charges_graph" style=" padding: 0px; position: relative;">
                            <div id="site_activities" class="chart">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PORTLET-->
        </div>
        <div class="col-md-6 col-sm-6">
            <!-- BEGIN PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-share font-red-sunglo hide"></i>
                        <span class="caption-subject font-red-sunglo bold uppercase">Bénéfices</span>
                        <span class="caption-helper">par client</span>
                    </div>
                    <div class="actions">

                    </div>
                </div>
                <div class="portlet-body">
                    <div id="site_activities_loading" style="display: none;">
                        <img src="" alt="loading"></div>
                    <div id="site_activities_content" class="display-none" style="display: block;">
                        <div id="benefits_graph" style=" padding: 0px; position: relative;">
                            <div id="site_statistics" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PORTLET-->
        </div>
    </div>
    <!-- /////////////////////////////////////// Les tables //////////////////////////////////// -->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box yellow-saffron">
                <div class="portlet-title">
                    <div class="caption ">
                        <i class="icon-folder "></i>
                        <span class="caption-subject bold uppercase">Derniers dossiers</span>
                    </div>
                    <div class="tools"></div>
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
                            @foreach($last_ten_folders as $folder)
                                <tr>
                                    <td>
                                        {{ $folder->folder_name.$folder->folder_number }}
                                    </td>
                                    <td>
                                        {{ $folder->folder_date ? $folder->folder_date->format('d/m/Y') : '' }}
                                    </td>
                                    <td>
                                        {{ count($folder->articles) }}
                                    </td>
                                    <td>
                                        {{ $folder->client ? $folder->client->name : '' }}
                                    </td>
                                    <td style="text-align: center">
                                        <a class="btn btn-sm blue"
                                           href="{{ url('/folder/'.$folder->id) }}">Détails</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box green-turquoise">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-file "></i>
                        <span class="caption-subject bold uppercase">Derniers factures</span>
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="portlet-body">
                    <div class="table-container">
                        <div class="table-actions-wrapper">

                        </div>
                        <table class="table table-striped table-bordered table-hover table-checkable"
                               id="invoices_table">
                            <thead>
                            <tr role="row" class="heading">
                                <th width="20%"> Numéro facture</th>
                                <th width="10%"> Type</th>
                                <th width="20%"> Date de facturation</th>
                                <th width="15%"> Etat</th>
                                <th width="25%"> Total</th>
                                <th width="10%"> Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($last_ten_invoices as $invoice)
                                <tr>
                                    <td>
                                        {{ $invoice->prefix.$invoice->invoice_number }}
                                    </td>
                                    <td>
                                        {{ $invoice->type ? $invoice->type->value : ''}}
                                    </td>
                                    <td>
                                        {{ $invoice->invoice_date ? $invoice->invoice_date->format('d/m/Y') : '' }}
                                    </td>
                                    <td>
                                        {{ $invoice->state ? $invoice->state->value : '' }}
                                    </td>
                                    <td>
                                        {{ $invoice->invoice_total != '' ? $invoice->invoice_total. ' dt' : '' }}
                                    </td>
                                    <td style="text-align: center">
                                        <a class="btn btn-sm blue"
                                           href="{{ url('/invoices/'.$invoice->id) }}">Détails</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
            <!-- BEGIN EXAMPLE TABLE PORTLET-->

            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@endsection

@section('footer')

    <script src="<?php echo URL::asset('assets/global/plugins/counterup/jquery.waypoints.min.js')?> "
            type="text/javascript"></script>
    <script src="<?php echo URL::asset('assets/global/plugins/counterup/jquery.counterup.min.js')?> "
            type="text/javascript"></script>
    <script src="<?php echo URL::asset('assets/global/plugins/flot/jquery.flot.min.js')?> "
            type="text/javascript"></script>
    <script src="<?php echo URL::asset('assets/global/plugins/flot/jquery.flot.resize.min.js')?> "
            type="text/javascript"></script>
    <script src="<?php echo URL::asset('assets/global/plugins/flot/jquery.flot.categories.min.js')?>"
            type="text/javascript"></script>
    <script src="<?php echo URL::asset('assets/global/plugins/morris/morris.min.js')?> "
            type="text/javascript"></script>
    <script src="<?php echo URL::asset('assets/pages/scripts/dashboard.min.js')?>" type="text/javascript"></script>
    <script>
        function showChartTooltip(x, y, xValue, yValue) {
            $('<div id="tooltip" class="chart-tooltip">' + yValue + '<\/div>').css({
                position: 'absolute',
                display: 'none',
                top: y - 40,
                left: x - 40,
                border: '0px solid #ccc',
                padding: '2px 6px',
                'background-color': '#fff'
            }).appendTo("body").fadeIn(200);
        }
        $(function () {
            var client_data = [];
                    @foreach($clients_benefits as $benefit)
            var item = [];
            item.push("{{ $benefit->name }}");
            item.push("{{ $benefit->total }}");
            client_data.push(item);
            @endforeach
            var supplier_data = [];
            @foreach($suppliers_charges as $charge)
            var item = [];
            item.push("{{ $charge->name }}");
            item.push("{{ $charge->total }}");
            supplier_data.push(item);
            @endforeach
            $.plot($("#site_statistics"), [{
                        data: client_data,
                        lines: {
                            fill: 0.6,
                            lineWidth: 0
                        },
                        color: ['#f89f9f']
                    }, {
                        data: client_data,
                        points: {
                            show: true,
                            fill: true,
                            radius: 5,
                            fillColor: "#f89f9f",
                            lineWidth: 3
                        },
                        color: '#fff',
                        shadowSize: 0
                    }],

                    {
                        xaxis: {
                            tickLength: 0,
                            tickDecimals: 0,
                            mode: "categories",
                            min: 0,
                            font: {
                                lineHeight: 14,
                                style: "normal",
                                variant: "small-caps",
                                color: "#6F7B8A"
                            }
                        },
                        yaxis: {
                            ticks: 5,
                            tickDecimals: 0,
                            tickColor: "#eee",
                            font: {
                                lineHeight: 14,
                                style: "normal",
                                variant: "small-caps",
                                color: "#6F7B8A"
                            }
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: "#eee",
                            borderColor: "#eee",
                            borderWidth: 1
                        }
                    });
            var previousPoint = null;
            $("#site_statistics").bind("plothover", function(event, pos, item) {
                $("#x").text(pos.x.toFixed(2));
                $("#y").text(pos.y.toFixed(2));
                if (item) {
                    if (previousPoint != item.dataIndex) {
                        previousPoint = item.dataIndex;

                        $("#tooltip").remove();
                        var x = item.datapoint[0].toFixed(2),
                                y = item.datapoint[1].toFixed(2);

                        showChartTooltip(item.pageX, item.pageY, item.datapoint[0], item.datapoint[1] + ' TND');
                    }
                } else {
                    $("#tooltip").remove();
                    previousPoint = null;
                }
            });

            $.plot($("#site_activities"), [{
                        data: supplier_data,
                        lines: {
                            fill: 0.6,
                            lineWidth: 0
                        },
                        color: ['#f89f9f']
                    }, {
                        data: supplier_data,
                        points: {
                            show: true,
                            fill: true,
                            radius: 5,
                            fillColor: "#f89f9f",
                            lineWidth: 3
                        },
                        color: '#fff',
                        shadowSize: 0
                    }],

                    {
                        xaxis: {
                            tickLength: 0,
                            tickDecimals: 0,
                            mode: "categories",
                            min: 0,
                            font: {
                                lineHeight: 14,
                                style: "normal",
                                variant: "small-caps",
                                color: "#6F7B8A"
                            }
                        },
                        yaxis: {
                            ticks: 5,
                            tickDecimals: 0,
                            tickColor: "#eee",
                            font: {
                                lineHeight: 14,
                                style: "normal",
                                variant: "small-caps",
                                color: "#6F7B8A"
                            }
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: "#eee",
                            borderColor: "#eee",
                            borderWidth: 1
                        }
                    });
            var previousPoint = null;
            $("#site_activities").bind("plothover", function(event, pos, item) {
                $("#x").text(pos.x.toFixed(2));
                $("#y").text(pos.y.toFixed(2));
                if (item) {
                    if (previousPoint != item.dataIndex) {
                        previousPoint = item.dataIndex;

                        $("#tooltip").remove();
                        var x = item.datapoint[0].toFixed(2),
                                y = item.datapoint[1].toFixed(2);

                        showChartTooltip(item.pageX, item.pageY, item.datapoint[0], item.datapoint[1] + ' TND');
                    }
                } else {
                    $("#tooltip").remove();
                    previousPoint = null;
                }
            });
        });

        $(".table").DataTable({
            "lengthMenu": [
                [5, 10, -1],
                [5, 10, "All"]
            ],

            "pageLength": 5,
            responsive: true
        });


    </script>



@endsection