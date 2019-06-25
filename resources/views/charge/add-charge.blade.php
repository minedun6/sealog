@extends('layouts/main')
@section('title')
    Ajouter une charge
@endsection
@section('second-title')
    - Charges
@endsection
@section('url')
    Ajouter une charge
@endsection
@section('url-way')
    <li>
        <a href="#">Charge</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>Ajouter une charge</span>
    </li>
@endsection
@section('content')
    <div class="row">
        <!-- <div id="alert" class="custom-alerts alert alert-danger">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
             <i class="fa-lg fa fa-warning"></i>
         </div> -->
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="icon-plus font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase"> Ajouter </span>
                </div>

            </div>
            <div class="portlet-body form">
                <form action="{{ url('/charges/add/'.$folder->id) }}" method="post" class="form-horizontal">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Description</label>
                                    <div class="col-md-9">
                                        <textarea rows="1" class="form-control" name="description" placeholder=""
                                                  id="description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Fournisseur</label>
                                    <div class="col-md-9 ui-widget">
                                        <input type="text" class="form-control" name="supplier" id="supplier_field">
                                        <input type="hidden" name="supplier_id" value="" id="supplier_id">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Type de paiement</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="payment_type_id" id="payment_type_id">
                                            @foreach($payment_types as $payment_type)
                                                <option value="{{ $payment_type->id }}">{{ $payment_type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Montant</label>
                                    <div class="col-md-9">
                                        <input type="text" name="amount" class="form-control" placeholder=""
                                               id="amount"></div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Cours de change</label>
                                    <div class="col-md-9">
                                        <input name="exchange" type="text" class="form-control" placeholder=""
                                               value="1" id="exchange">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Montant aprés conversion</label>
                                    <div class="col-md-9">
                                        <input type="text" readonly class="form-control" value=""
                                               name="exchanged_amount" id="exchanged_amount">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="row"><br></div>
                        <div class="form-actions right">
                            <button type="submit" class="btn green">Valider</button>
                            <button type="reset" class="btn default">Anuler</button>
                        </div>
                        <!--/row-->
                        <!--/row-->
                        <!--/row-->
                    </div>
                </form>
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <!-- END SAMPLE FORM PORTLET-->
        <!-- BEGIN SAMPLE FORM PORTLET-->
    </div>
@endsection

@section('footer')
    <script type="text/javascript" src="{{ URL::asset('assets/scripts/form-val.js') }}"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script type="text/javascript">
        $("#supplier_field").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: "{{ url('/supplier/find/') }}",
                    method: 'post',
                    dataType: "json",
                    data: {
                        'name': $("#supplier_field").val(),
                        '_token': "{!! csrf_token() !!}"
                    },
                    success: function (data) {
                        response(data);
                    }
                });
            },
            minLength: 3,
            select: function (event, ui) {
                $("#supplier_id").val(ui.item.id);
            },
            open: function () {
                $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
            },
            close: function () {
                $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
            }
        });
    </script>
@endsection

