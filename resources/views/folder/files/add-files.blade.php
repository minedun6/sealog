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
    <link href="<?php echo URL::asset('assets/global/plugins/fileinput/fileinput.css') ?>"
          rel="stylesheet" type="text/css">
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PORTLET-->
            <div class="portlet light form-fit bordered">
                <div class="portlet-title">
                    <i class="icon-folder font-dark"></i>
                    <span class="caption-subject font-dark sbold uppercase"> Dossier #{{ $folder->folder_number }} </span>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{ url('/file/add/'.$folder->id) }}" method="post" enctype="multipart/form-data"
                          class="form-horizontal form-bordered">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="form-body">
                            <div class="form-group last">
                                <div class="col-md-9">
                                    <input type="file" multiple name="documents[]" id="up" class="file">
                                 </div>

                                </div>
                            </div>



                        <div class="form-actions">

                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
            <!-- END PORTLET-->
        </div>
    </div>

@endsection
@section('footer')

    
    <script>
        $("#up").fileinput({'showUpload':true, 'previewFileType':'any','language':'fr'});
    </script>
@endsection