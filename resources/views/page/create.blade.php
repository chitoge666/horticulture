@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">Add Page DS</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Page</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="{{route('page.index')}}">List</a>
                        </li>
                        <li class="breadcrumb-item">Add</li>
                    </ol>
                </nav>
            </div>
       </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <div class="row">
            <div class="col-md-6 col-xl-5">
            <div class="block">
                <div class="block-header">
                <h3 class="block-title">Page Info</h3>
                </div>
                <div class="block-content">
                <form id="form_pages" class="form" role="form" action="{{route('page.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control"/></div>
                    <div class="form-group">
                    <label for="banner_text">Banner Text</label>
                    <input type="text" name="banner_text" id="banner_text" class="form-control"/></div>
                    <div class="form-group">
                    <label for="time_visible">Time Visible</label>
                    {!! Helper::create_radio('time_visible',array('Y','N'),'Y')!!}
                    </div>
                    <div class="form-group">
                    <label for="date_visible">Date Visible</label>
                    {!! Helper::create_radio('date_visible',array('Y','N'),'Y')!!}
                    </div>
                    <div class="py-3">
                    <div class="form-group row justify-content-center mb-0">
                    <div class="col-md-12 col-xl-12">
                    <button type="submit" class="btn btn-block btn-primary">
                    <i class="fa fa-fw fa-save mr-1"></i> Add Page
                    </button>
                    </div>
                    </div>
                    </div>
                    </form>
                </div>
                </div>
                
            </div>
            <div class="col-md-6">
            <h3 class="block-title">Preview</h3>
            <div class="preview-page">
                <div class="banner-text"><marquee>BANNER HERE</marquee></div>
                        <img src="/media/icon_video.png" class="preview-frame-video" />
                        <img src="/media/icon_image.png"  class="preview-frame-image" />
                        
                    </div>        
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
@section('js_after')
<script type="text/javascript">
$('#form_pages').submit(function(e){
    var URL = $(this).attr('action');
    var DATA = new FormData(this);
    $.ajax({url: URL,type:'POST', data:DATA, }).done(function(data){

    });
});
</script>
@endsection