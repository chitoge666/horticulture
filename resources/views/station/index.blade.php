@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">Station</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Master</li>
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="{{route('station.index')}}">Station</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="{{route('station.create')}}">Create</a>
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
            <div class="col-md-12 col-xl-12">
            <div class="block">
                <div class="block-header">

                </div>
                <div class="block-content">
                <table id="stations" class="table table-stripe">
<thead> <tr><th>Id</th><th>Name</th><th>Description</th><th>Image</th><th>Status</th>
<th>Action</th></tr>
</thead><tbody>
@foreach($stations as $item) 
<tr><td>{{$item->nomor}}</td>
<td><p>{{$item->name}}</p>
    <small>created at : {{$item->created_at}}</small>
</td><td><p>{{$item->description}}</p>
<small>Open : {{$item->time_open}}</small>
,<small>Close : {{$item->time_close}}</small>
</td>
<td><img src="{{url('/storage/'.$item->image)}}" class="row-image-thumbnail"/></td>
<td><p>{{$item->status}}</p><p>lanes: {{$item->lanes}}</p></td>
<td><div class="btn-group">
    <a class="btn btn-sm btn-primary" href="{{url('dashboard/station/edit/'.$item->id)}}"><i class="fa fa-edit"></i>Edit</a>
<a class="btn btn-sm btn-danger"  href="{{url('dashboard/station/remove/'.$item->id)}}"><i class="fa fa-trash"></i>Remove</a>
</div>
</td></tr>
@endforeach
</tbody>
</table>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
