@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">Station</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Update</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Station</a>
                        </li>
                    </ol>
                </nav>
            </div>
       </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <div class="row ">
            <div class="col-md-6 col-xl-5">
            <div class="block">
                <div class="block-header">
                <h3 class="block-title">Update Station</h3>
                </div>
                <div class="block-content">
                <form action="{{route('station.store')}}" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" value="" class="form-control"/>
                </div>
                <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" class="form-control"/></div>
                <div class="form-group">
                <label for="avatar" class="form-label">Image</label>
                <div class="custom-file">
                <input type="file" name="image" id="avatar" class="custom-file-input" data-toggle="custom-file-input"/>
                <label class="custom-file-label" for="example-file-input-custom">Choose file</label>
                </div>
                </div>
                <div class="form-group">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="text" name="latitude" id="latitude" value="" class="form-control"/>
                </div>
                <div class="form-group">
                <label for="longitude" class="form-label">Longitude</label>
                <input type="text" name="longitude" id="longitude" value="" class="form-control"/>
                </div>
                <div class="form-group">
                <label for="time_open">Time_open</label>
                <input type="text" name="time_open" id="time_open" class="form-control"/></div>
                <div class="form-group">
                <label for="time_close">Time_close</label>
                <input type="text" name="time_close" id="time_close" class="form-control"/></div>
                <div class="form-group">
                <label for="status">Status</label>
                <input type="text" name="status" id="status" class="form-control"/></div>
                <div class="form-group">
                
                <button type="submit" class="btn btn-primary">Add Station</button>
                </div>
                </form>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection