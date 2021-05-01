@extends('layouts.master')

@section('content-header')
    <h1>
        Edit
        <small>Karyawan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Karyawan</a></li>
        <li class="active">Create</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                <h3 class="box-title">Edit Karyawan</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="/karyawan/update" method="POST" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id" value="{{$data->id}}">
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input name="nama" value="{{$data->nama}}" type="text" class="form-control" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input name="alamat" value="{{$data->alamat}}" type="text" class="form-control" placeholder="Alamat">
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <input name="jabatan" value="{{$data->jabatan}}" type="text" class="form-control" placeholder="Jabatan">
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