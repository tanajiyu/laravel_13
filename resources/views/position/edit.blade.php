@extends('layouts.master')

@section('content-header')
    <h1>
        Edit
        <small>Department</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Department</a></li>
        <li class="active">Create</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                <h3 class="box-title">Edit Department</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="/position/update" method="POST" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id" value="{{$data->id}}">
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        @error('name')
                            <div class="alert  alert-danger">{{$message}}</div>
                        @enderror
                        <input name="name" value="{{$data->name}}" type="text" class="form-control" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label>Department</label>
                        <select class="form-control" name="department_id">
                            <option value="{{$data->department_id}}">{{$data->department->name}}</option>
                            @foreach ($department as $dept)
                                @if ($data->department_id != $dept->id)
                                    <option value="{{$dept->id}}">{{$dept->name}}</option>
                                @endif
                            @endforeach
                        </select>
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