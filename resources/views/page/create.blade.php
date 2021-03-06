@extends('layouts.backend')
@section('css_after')
<link rel="stylesheet" type="text/css" href="/assets/js/plugins/slick-carousel/slick.css"/>
<link rel="stylesheet" type="text/css" href="/assets/js/plugins/slick-carousel/slick-theme.css"/>
@endsection
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
                    <input type="text" name="banner_text" id="banner_text" class="form-control"/>
                    </div>
                    <div class="form-group">
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#video-gallery">Add Video</button>
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#image-gallery">Add Image</button>
                    </div>
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
                    <button type="submit"  class="btn btn-block btn-primary">
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
                <div class="banner-text"><marquee id="banner_text_here">BANNER HERE</marquee></div>

                <div class="video-container">
                <video id="video_player" controls poster="{{ url('/media/icon_video.png')}}" width="320" height="240" playsinline>
                <source src="" type="video/mp4">
                </video>
                </div>

                <div class="image-container" >

                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
    <div class="modal fade" id="video-gallery" tabindex="-1" role="dialog" aria-labelledby="modal-block-fromleft" aria-hidden="true">
            <div class="modal-dialog modal-dialog-fromleft" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Choose Video</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content font-size-sm">
                            <div class="row">
                            @foreach($videos as $media)
                            <div class="col-md-4">

                            <img src="{{url('/storage/'.$media->thumbnail)}}" data-file="{{$media->filename}}"
                            data-id="{{$media->id}}" data-target="" rel="video" class="preview-image"/>
                            </div>
                            @endforeach
                        </div>
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="modal-block-fromleft" aria-hidden="true">
        <div class="modal-dialog modal-dialog-fromleft" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Choose Image</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content font-size-sm">
                        <div class="row">
                        @foreach($images as $media)
                        <div class="col-md-4">
                        <img src="{{url('/storage/'.$media->filename)}}"  data-file="{{$media->filename}}"
                        data-id="{{$media->id}}" data-target="image-container" rel="image" class="preview-image"/>
                        </div>
                        @endforeach
                    </div>
                    </div>
                    <div class="block-content block-content-full text-right border-top">
                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js_after')
<script src="/assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/slick-carousel/slick.min.js"></script>
<script type="text/javascript">
$('#banner_text').on('blur',function(){
    var val = $(this).val();
    $('#banner_text_here').text(val);
});
$('.image-container').slick({
  dots: true,
  infinite: true,
  speed: 500,
  fade: true,
  cssEase: 'linear'
});
$('[rel="video"]').click(function(e){
    var src = $(this).attr('src');
    var file = $(this).attr('data-file');
    var target = $(this).attr('data-target');
    var video = document.getElementById('video_player');
    video.src = '/storage/'+file;
    video.load();
    video.play();
    $('#video_player').attr('poster',src);
    var html = '<input type="hidden" name="video[]" value="'+file+'"/>';
    $('#form_pages').append(html);
});
$('[rel="image"]').click(function(e){
    var file = $(this).attr('src');
    var file2 = $(this).attr('data-file');
    var target = $(this).attr('data-target');
    var html = '<div><img src="'+file+'"/></div>';
    $('.image-container').slick('slickAdd',html);
    var html = '<input type="hidden" name="image[]" value="'+file2+'"/>';
    $('#form_pages').append(html);
});
$('#btn_save').click(function(e){

    var URL = $('#form_pages').attr('action');
    var formData = $('#form_pages').serialize();
    console.log(formData);
    $.ajax({url: URL, type:'POST', data:formData}).done(function(json){
        if(json.status){
            One.helpers('notify', {type: 'success', icon: 'fa fa-check mr-1', message: json.message});
        } else {
            One.helpers('notify', {type: 'danger', icon: 'fa fa-times mr-1', message: json.message});
        }

    });
});
</script>
@endsection
