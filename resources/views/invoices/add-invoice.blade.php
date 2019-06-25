@extends('layouts/main')
@section('title')
    Créer une facture
@endsection
@section('second-title')
    - Factures
@endsection
@section('url')
    Créer une facture
@endsection
@section('url-way')
    <li>
        <a href="#">Facture</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>Creer</span>
    </li>
@endsection

@section('content')
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption font-red-sunglo">
                <i class="icon-plus font-red-sunglo"></i>
                <span class="caption-subject bold uppercase"> Ajouter </span>
            </div>

        </div>
        <div class="portlet-body form">
            <div class="alert alert-danger" id="errorClass" style="display: none">
                <button class="close" data-dismiss="alert"></button>
                Le champ designation est obligatoire !
            </div>
            <div class="alert alert-danger" id="errorClass2" style="display: none">
                <button class="close" data-dismiss="alert"></button>
                Veuillez vérifier les données saisies !
            </div>
            <form role="form" action="{{ url('invoices/add/') }}" method="post" id="invoice_form">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Client</label>
                                <input type="text" class="form-control " placeholder=""
                                       value="{{ $folder->client->name }}" readonly>
                                <input type="hidden" name="client_id" value="{{ $folder->client->id }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Date de facturation</label>
                                <div class="input-group date date-picker">
                                    <input class="form-control form-control-inline  date-picker" size="16" type="text"
                                           name="date_facture" id="facturationDate">
                                                        <span class="input-group-btn ">
                                                            <button class="btn default date-set" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Type facture</label>
                                <input type="text" class="form-control" placeholder=""
                                       value="{{ $invoice_type->value }}" readonly>
                                <input type="hidden" name="invoice_type_id" value="{{ $invoice_type->id }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Dossier</label>
                                <input type="text" class="form-control" value="{{ $folder->folder_number }}"
                                       placeholder="" readonly>
                                <input type="hidden" name="folder_id" value="{{ $folder->id }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">date d'échéance</label>
                                <div class="input-group date date-picker">
                                    <input class="form-control form-control-inline  date-picker" size="16" type="text"
                                           name="date_echeance" id="echeanceDate">
                                                        <span class="input-group-btn">
                                                            <button class="btn default date-set" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                </div>


                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Bon de commande</label>
                                <input type="text" class="form-control" name="order_form" placeholder="">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 50px">
                        <div class="col-lg-8 col-sm-8 col-sm-offset-4" style="padding-top: 10px">
                        </div>
                    </div>

                    <div class="row">
                        <table class="table table-striped table-hover table-bordered" id="my_table" name="invoicetable">
                            <thead>
                            <tr>

                                <th width="35%"> Description <span class="required" style="color: red"> * </span></th>
                                <th width="15%"> Coût unitaire</th>
                                <th width="15%"> Quantité</th>
                                <th width="15%"> TVA</th>
                                <th width="5%"> Remise (%)</th>
                                <th width="10%"> Total (dt)</th>
                                <th width="2%"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- @foreach($folder->articles as $index => $article)
                                    <tr>
                                        <td class="center">
                                            <textarea rows="1" class="form-control " name="description[{{ $index }}]"
                                                  id="descriptions[{{ $index }}]">{{ $article->designation }}</textarea>
                                    </td>
                                    <td class="center"><input type="text"

                                                              class="form-control "
                                                              name="prixu[{{ $index }}]"
                                                              oninput="calcul_total({{ $index }})"
                                                              id="prixunite[{{ $index }}]"
                                                              data-defaultValue="0" value="0"></td>
                                    <td class="center"><input type="text"
                                                              class="form-control "
                                                              name="quantite[{{ $index }}]"
                                                              oninput="calcul_total({{ $index }})"
                                                              id="qte[{{ $index }}]"
                                                              Value="{{ $article->packages_number }}"></td>
                                    <td class="center">
                                        <select class="form-control"
                                                name="tva[{{ $index }}]" id="taxe[{{ $index }}]"
                                                oninput="calcul_total(0)">
                                            <option value="0">0%</option>
                                            <option value="6">6%</option>
                                            <option value="12">12%</option>
                                            <option value="18">18%</option>
                                            <option value="20">20%</option>
                                        </select>
                                    </td>
                                    <td class="center"><input type="text"
                                                              class="form-control "
                                                              name="remise[{{ $index }}]" id="remises[{{ $index }}]"
                                                              oninput="calcul_total({{ $index }})"
                                                              value="0">
                                    </td>
                                    <td class="center" style="text-align: right;"><b>
                                            <span name="total[{{ $index }}]" id="article_total[{{ $index }}]"
                                                  style="margin-right: 10px;">0</span></b>
                                        <input type="hidden" name="article_total[{{ $index }}]"
                                               id="article_total{{ $index }}">
                                    </td>
                                </tr>
                            @endforeach -->
                            @for($i = 0;$i<count($default_articles); $i++)
                                <tr>
                                    <td class="center">
                                        <textarea rows="1" class="form-control " name="description[{{ $i }}]"
                                                  id="descriptions[{{ $i }}]">{{ $default_articles[$i] }}</textarea>
                                    </td>
                                    <td class="center"><input type="text"
                                                              value="0"
                                                              class="form-control "
                                                              name="prixu[{{ $i }}]" oninput="calcul_total({{ $i }})"
                                                              id="prixunite[{{ $i }}]"
                                                              data-defaultValue="0"></td>
                                    <td class="center"><input type="text"
                                                              class="form-control "
                                                              name="quantite[{{ $i }}]" oninput="calcul_total({{ $i }})"
                                                              id="qte[{{ $i }}]"
                                                              Value="1"></td>
                                    <td class="center">
                                        <select class="form-control" id="taxe[{{ $i }}]" name="tva[{{ $i }}]">
                                            <option value="0">0%</option>
                                            <option value="6">6%</option>
                                            <option value="12">12%</option>
                                            <option selected value="18">18%</option>
                                            <option value="20">20%</option>
                                        </select>
                                    </td>
                                    <td class="center"><input type="text"
                                                              class="form-control "
                                                              name="remise[{{ $i }}]" id="remises[{{ $i }}]"
                                                              oninput="calcul_total({{ $i }})"
                                                              value="0">
                                    </td>
                                    <td class="center" style="text-align: right;"><b>
                                            <span name="article_total[{{ $i }}]" id="article_total[{{ $i }}]"
                                                  style="margin-right: 10px;">0</span></b>
                                    </td>
                                    <td class="center" style="text-align: center"><b><span id="btn_supp[{{ $i }}]"
                                                                                           onclick="supp({{ $i }})"
                                                                                           style="margin-right: 10px;"><i
                                                        class="fa fa-remove"
                                                        style="color: red;cursor: pointer;"></i> </span></b></td>
                                </tr>
                            @endfor
                            </tbody>
                            <tfoot>
                            <tr>
                                <td class="hide-border" colspan="3" rowspan="8" style="vertical-align:top">
                                    <br>
                                    <div class="row" style="margin-bottom: 20px;">
                                        <div class="col-md-6">
                                            <div class="btn-group">
                                                <button id="ajout_mytable" class="btn green">
                                                    Ajouter
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                            <div class="btn-group">
                                                <button id="remove_last_raw" class="btn red">
                                                    Effacer
                                                    <i class="fa fa-remove"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel">
                                        <ul class="nav nav-pills">
                                            <li class="active">
                                                <a href="#tab_2_1" data-toggle="tab"> Termes et conditions </a>
                                            </li>
                                            <li>
                                                <a href="#tab_2_2" data-toggle="tab"> Notes </a>
                                            </li>

                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade active in" id="tab_2_1">
                                                <textarea class="form-control" name="termes" rows="4"
                                                          cols="1"></textarea>
                                            </div>
                                            <div class="tab-pane fade" id="tab_2_2">
                                                <textarea class="form-control" name="notes" rows="4"
                                                          cols="1"></textarea>
                                            </div>

                                        </div>

                                    </div>

                                </td>
                                <td class="hide-border" style="display:none">
                                </td>
                                <td colspan="2">Sous total (dt)</td>
                                <td style="text-align: right"><span id="subtotal">0</span></td>

                            </tr>
                            <tr>
                                <td style="display:none" class="hide-border">
                                </td>
                                <td colspan="2">
                                    Total remises
                                </td>
                                <td style="text-align: right"><span id="totalremises">0</span></td>
                            </tr>
                            <tr>
                                <td style="display:none" class="hide-border">
                                </td>
                                <td colspan="2">
                                    Total avec remises
                                </td>
                                <td style="text-align: right"><span
                                            id="totalavecremises">0</span></td>
                            </tr>
                            <tr>
                                <td style="display:none" class="hide-border">
                                </td>
                                <td colspan="2">Total taxes (dt)</td>
                                <td style="text-align: right"><span id="totaltaxes">0</span></td>

                            </tr>


                            <tr style="font-size:1.05em">
                                <td class="hide-border" style="display:none">
                                </td>
                                <td class="hide-border" colspan="2">Timbre fiscal (dt)</td>
                                <td class="hide-border" style="text-align: right"><span>0.5</span></td>
                            </tr>

                            <tr style="font-size:1.05em">
                                <td class="hide-border" style="display:none">
                                </td>
                                <td class="hide-border" colspan="2"><b>Total facture (dt)</b></td>
                                <td class="hide-border" style="text-align: right"><b><span
                                                id="totalfacture">0</span></b></td>
                            </tr>
                            <tr style="font-size:1.05em">
                                <td class="hide-border" style="display:none">
                                </td>
                                <td class="hide-border" colspan="2">Somme payée (dt)</td>
                                <td class="hide-border" style="text-align: right"><span id="somme_payee">0</span></td>
                            </tr>
                            <tr style="font-size:1.05em">
                                <td class="hide-border" style="display:none">
                                </td>
                                <td class="hide-border" colspan="2"><b>Reste à payer (dt)</b></td>
                                <td class="hide-border" style="text-align: right"><b><span id="reste_payer">0</span></b>
                                </td>
                            </tr>
                            <tr style="font-size:1.05em">
                                <td class="hide-border" style="display:none">
                                </td>
                                <td class="hide-border" colspan="1">Total en lettres</td>
                                <td class="hide-border" style="text-align: right" colspan="5">
                                    <input class="form-control input-xxlarge" name="total_in_chars" id="total_enlettre"
                                           value="zéro dinars">
                                </td>
                            </tr>
                            </tfoot>
                        </table>


                    </div>
                </div>
                <button class="btn blue" type="submit">Envoyer</button>
            </form>
        </div>
    </div>
@endsection
@section('footer')
    <script>

        $('#ajout_mytable').on('click', function (e) {
            // Prevent the default action of the clicked item. In this case that is submit
            e.preventDefault();
            // Open your modal here

            length = $("#my_table > tbody > tr").length;
            console.log(length);
            if (document.getElementById('descriptions[' + (length - 1) + ']').value == "") {
                document.getElementById("errorClass").style.display = "block";
                $("html, body").animate({scrollTop: 0}, "slow");

                return false;
            }
            else {
                document.getElementById("errorClass").style.display = "none";
                $("html, body").animate({scrollTop: $(document).height()}, "slow");
                $('#my_table > tbody > tr:last').after('' +

                        '<tr><td class="center"><textarea  class="form-control "  rows="1"  id="descriptions[' + length + ']" name="description[' + length + ']" ></textarea></td>' +
                        '<td class="center"><input type="text" class="form-control " name="prixu[' + length + ']" oninput="calcul_total(' + length + ')" id="prixunite[' + length + ']" data-defaultValue="0"></td>' +
                        '<td class="center"><input type="text" class="form-control " Value="1" name="quantite[' + length + ']" oninput="calcul_total(' + length + ')" id="qte[' + length + ']" data-defaultValue="0"></td>' +
                        '<td class="center"> <select class="form-control " id= "taxe[' + length + ']" name="tva[' + length + ']" oninput="calcul_total(' + length + ')"> <option value="0">0%</option><option value="6">6%</option> <option value="12">12%</option> <option selected value="18">18%</option> <option value="20">20%</option> </select></td> ' +
                        '<td class="center"><input type="text" class="form-control " id="remises[' + length + ']" name="remise[' + length + ']"  oninput="calcul_total(' + length + ')" value="0"> </td> ' +
                        '<td class="center" style="text-align: right"><b><span style="margin-right: 10px;"   name="article_total[' + length + ']" id="article_total[' + length + ']" >0</span></b></td>' +
                        '<td class="center" style="text-align: center"><b><span  id="btn_supp[' + length + ']" onclick="supp(' + length + ')" style="margin-right: 10px;"    ><i class="fa fa-remove" style="color: red;cursor: pointer;"></i> </span></b></td>' +
                        '  </tr>'
                )
                ;

                // Make sure the button is not submitted after all!
                return true;
            }
        });

        $('#remove_last_raw').on('click', function (e) {
            //alert('effacer');
            e.preventDefault();
            var length = $("#my_table > tbody > tr").length;
            if (length > 1) {
                var valtotal = parseFloat(document.getElementById("article_total[" + (length - 1) + "]").textContent) ? parseFloat(document.getElementById("article_total[" + (length - 1) + "]").textContent) : 0;
                var subtotal = parseFloat(document.getElementById("subtotal").textContent);

                var valremise = (parseFloat(document.getElementById("remises[" + (length - 1) + "]").value) * valtotal) / 100;
                var valtaxe = (parseFloat(document.getElementById("taxe[" + (length - 1) + "]").value - valremise) * valtotal) / 100;
                var result = subtotal - valtotal;
                document.getElementById("subtotal").textContent = result;
                document.getElementById("totaltaxes").textContent = parseFloat(document.getElementById("totaltaxes").textContent) - valtaxe;
                document.getElementById("totalremises").textContent = parseFloat(document.getElementById("totalremises").textContent) - valremise;
                document.getElementById("totalavecremises").textContent = parseFloat(document.getElementById("subtotal").textContent) - parseFloat(document.getElementById("totalremises").textContent);
                document.getElementById("totalfacture").textContent = parseFloat(document.getElementById("subtotal").textContent) + parseFloat(document.getElementById("totaltaxes").textContent) -
                        parseFloat(document.getElementById("totalremises").textContent);
                document.getElementById("reste_payer").textContent = parseFloat(document.getElementById("totalfacture").textContent) - parseFloat(document.getElementById("somme_payee").textContent);
                $("#my_table > tbody > tr").last().remove();

            }
        });
    </script>
    <script type="text/javascript" src="{{ URL::asset('assets/scripts/form-val.js') }}"></script>
    <script>
        function calcul_total(x) {
            var prixu = parseFloat(document.getElementById("prixunite[" + x + "]").value);
            var quantite = parseFloat(document.getElementById("qte[" + x + "]").value);
            var total = parseFloat(document.getElementById("article_total[" + x + "]").textContent);
            total = (prixu * quantite);
            var remis_article = (total * parseFloat(document.getElementById("remises[" + x + "]").value)) / 100;
            total = total - remis_article;
            document.getElementById("article_total[" + x + "]").textContent = total.toFixed(3) ? total.toFixed(3) : 0;
            //$("#article_total" + x).val(total ? total : 0);
            length = $("#my_table > tbody > tr").length;
            var sbtotal = 0;
            var tottva = 0;
            var totremise = 0;
            for (i = 0; i < length; i++) {
                prod = parseFloat(document.getElementById("prixunite[" + i + "]").value) * parseFloat(document.getElementById("qte[" + i + "]").value);
                sbtotal = sbtotal + prod;

                totremise = totremise + (parseFloat(document.getElementById("qte[" + i + "]").value) * parseFloat(document.getElementById("prixunite[" + i + "]").value) * parseFloat(document.getElementById("remises[" + i + "]").value)) / 100;
                tottva = tottva + ((parseFloat(document.getElementById("article_total[" + i + "]").textContent) /*- totremise*/) * parseFloat(document.getElementById("taxe[" + i + "]").value)) / 100;
            }


            document.getElementById("subtotal").textContent = sbtotal.toFixed(3);
            // $("#subtotal_invoice").val(sbtotal);
            document.getElementById("totaltaxes").textContent = tottva.toFixed(3);
            // $("#total_taxes").val(tottva);
            document.getElementById("totalremises").textContent = totremise ? totremise.toFixed(3) : document.getElementById("totalremises").textContent;
            // $("#total_discount").val(sbtotal);
            document.getElementById("totalavecremises").textContent = parseFloat(document.getElementById("subtotal").textContent) - parseFloat(document.getElementById("totalremises").textContent);
            var total_facture = document.getElementById("totalfacture").textContent = parseFloat(document.getElementById("subtotal").textContent) + parseFloat(document.getElementById("totaltaxes").textContent) -
                    parseFloat(document.getElementById("totalremises").textContent) + 0.5;
            document.getElementById("totalfacture").textContent = total_facture.toFixed(3);
            // $("#total").val(total_facture);
            var rest_sum = parseFloat(document.getElementById("totalfacture").textContent) - parseFloat(document.getElementById("somme_payee").textContent);
            document.getElementById("reste_payer").textContent = rest_sum.toFixed(3);
            // $("#rest_sum").val(rest_sum);
            document.getElementById("total_enlettre").value = ConvNumberLetter_fr(parseFloat(document.getElementById("totalfacture").textContent), false);
            // $("#total_in_chars").val(ConvNumberLetter_fr(parseFloat(document.getElementById("totalfacture").textContent), false));


        }

        function supp(x) {
            var valtotal = parseFloat(document.getElementById("prixunite[" + x + "]").value) * parseFloat(document.getElementById("qte[" + x + "]").value);
            var subtotal = parseFloat(document.getElementById("subtotal").textContent);

            var valremise = (parseFloat(document.getElementById("remises[" + x + "]").value) * valtotal) / 100;
            var valtaxe = (parseFloat(document.getElementById("taxe[" + x + "]").value) * (valtotal - valremise) ) / 100;

            var result = subtotal - valtotal;
            document.getElementById("subtotal").textContent = result;
            document.getElementById("totaltaxes").textContent = parseFloat(document.getElementById("totaltaxes").textContent) - valtaxe;
            document.getElementById("totalremises").textContent = parseFloat(document.getElementById("totalremises").textContent) - valremise;
            document.getElementById("totalavecremises").textContent = parseFloat(document.getElementById("subtotal").textContent) - parseFloat(document.getElementById("totalremises").textContent);
            document.getElementById("totalfacture").textContent = parseFloat(document.getElementById("subtotal").textContent) + parseFloat(document.getElementById("totaltaxes").textContent) -
                    parseFloat(document.getElementById("totalremises").textContent) + 0.5;
            document.getElementById("reste_payer").textContent = parseFloat(document.getElementById("totalfacture").textContent) - parseFloat(document.getElementById("somme_payee").textContent);


            var length = $("#my_table > tbody > tr").length;

            if (length > 1) {
                var i = parseInt(x);
                for (i; i < (length - 1); i++) {
                    var k = i + 1;
                    document.getElementById("descriptions[" + k + "]").setAttribute("name", "description[" + i + "]");
                    //document.getElementById("descriptions["+k+"]").setAttribute("oninput","calcul_total["+i+"]");
                    document.getElementById("descriptions[" + k + "]").id = "descriptions[" + i + "]";
                    document.getElementById("prixunite[" + k + "]").setAttribute("name", "prixu[" + i + "]");
                    document.getElementById("prixunite[" + k + "]").setAttribute("oninput", "calcul_total(" + i + ")");
                    document.getElementById("prixunite[" + k + "]").id = "prixunite[" + i + "]";
                    document.getElementById("qte[" + k + "]").setAttribute("name", "quantite[" + i + "]");
                    document.getElementById("qte[" + k + "]").setAttribute("oninput", "calcul_total(" + i + ")");
                    document.getElementById("qte[" + k + "]").id = "qte[" + i + "]";
                    document.getElementById("taxe[" + k + "]").setAttribute("name", "tva[" + i + "]");
                    document.getElementById("taxe[" + k + "]").setAttribute("oninput", "calcul_total(" + i + ")");
                    document.getElementById("taxe[" + k + "]").id = "taxe[" + i + "]";
                    document.getElementById("remises[" + k + "]").setAttribute("name", "remise[" + i + "]");
                    document.getElementById("remises[" + k + "]").setAttribute("oninput", "calcul_total(" + i + ")");
                    document.getElementById("remises[" + k + "]").id = "remises[" + i + "]";
                    document.getElementById("article_total[" + k + "]").setAttribute("name", "article_total[" + i + "]");
                    document.getElementById("article_total[" + k + "]").id = "article_total[" + i + "]";
                    document.getElementById("btn_supp[" + k + "]").setAttribute("onclick", "supp(" + i + ")");
                    document.getElementById("btn_supp[" + k + "]").id = "btn_supp[" + i + "]";
                }
            }
            document.getElementById("my_table").deleteRow(x + 1);
        }

    </script>


    <script>
        $(document).ready(function () {
            $('.date-picker').datepicker();
            var myDate = new Date();
            var currentMonth = ((myDate.getMonth() + 1) < 10 ? '0' : '') + (myDate.getMonth() + 1);
            var nextMonth = ((myDate.getMonth() + 2) < 10 ? '0' : '') + (myDate.getMonth() + 2);
            var currentDay = (myDate.getDate() < 10 ? '0' : '') + myDate.getDate();
            var today = currentDay + '/' + currentMonth + '/' + myDate.getFullYear();
            var aftermonth = currentDay + '/' + nextMonth + '/' + myDate.getFullYear();
            $("#echeanceDate").val(aftermonth);
            $("#facturationDate").val(today);

        });
    </script>

    <script src="<?php echo URL::asset('assets/scripts/script_money.js')?>"
            type="text/javascript"></script>
@endsection