@extends('layouts/main')
@section('title')
    Editer une charge
@endsection
@section('second-title')
    - Charges
@endsection
@section('url')
    Editer une charge
@endsection
@section('url-way')
    <li>
        <a href="#">Charge</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>Editer une charge</span>
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
                    <span class="caption-subject bold uppercase"> Editer </span>
                </div>

            </div>
            <div class="portlet-body form">
                <form action="{{ url('/charges/edit/'.$charge->id) }}" method="post" class="form-horizontal">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Description</label>
                                    <div class="col-md-9">
                                        <textarea rows="1" class="form-control" placeholder="" name="description"
                                                  id="description">{!! strip_tags($charge->description) !!}</textarea>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Fournisseur</label>
                                    <div class="col-md-9 ui-widget">
                                        <input type="text"
                                               value="{{ $charge->supplier ? $charge->supplier->name : '' }}"
                                               class="form-control" name="supplier" id="supplier_field">
                                        <input type="hidden" name="supplier_id"
                                               value="{{ $charge->supplier ? $charge->supplier->id : '' }}"
                                               id="supplier_id">
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
                                                @if($charge->paymentType && $charge->paymentType->id == $payment_type->id)
                                                    <option selected
                                                            value="{{ $payment_type->id }}">{{ $payment_type->name }}</option>
                                                @else
                                                    <option
                                                            value="{{ $payment_type->id }}">{{ $payment_type->name }}</option>
                                                @endif
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
                                        <input type="text" value="{{ $charge->amount }}" class="form-control"
                                               placeholder="" id="amount" name="amount"></div>
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
                                        <input type="text" name="exchange" class="form-control" placeholder=""
                                               value="{{ $charge->exchange_rate }}" id="change">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Montant aprés conversion</label>
                                    <div class="col-md-9">
                                        <input type="text" readonly class="form-control"
                                               value="{{ $charge->amount_exchanged }}"
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

@endsection

