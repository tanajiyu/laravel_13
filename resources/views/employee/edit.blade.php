@extends('layouts.master')

@section('content-header')
    <h1>
        Edit
        <small>Employee</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Employee</a></li>
        <li class="active">Create</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                <h3 class="box-title">Edit Employee</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="/employee/update" method="POST" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id" value="{{$data->id}}">
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" value="{{$data->name}}" type="text" class="form-control" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input name="alamat" value="{{$data->alamat}}" type="text" class="form-control" placeholder="Alamat">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input name="phone" value="{{$data->phone}}" type="text" class="form-control" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" value="{{$data->email}}" type="text" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label>Position</label>
                        <select class="form-control" name="position_id">
                            <option value="{{$data->position_id}}">{{$data->position->name}}</option>
                            @foreach ($position as $pstn)
                                @if ($data->position_id != $pstn->id)
                                    <option value="{{$pstn->id}}">{{$pstn->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Upload Foto</label>
                        <input type="file" name="picture">
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection