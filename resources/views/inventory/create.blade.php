@extends('layouts.master')

@section('content-header')
    <h1>
        Create
        <small>Inventory</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inventory</a></li>
        <li class="active">Create</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                <h3 class="box-title">Insert Inventory</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="/inventory/store" method="POST" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="POST">
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input name="name" type="text" class="form-control" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label>Detail</label>
                        <input name="detail" type="text" class="form-control" placeholder="Alamat">
                    </div>
                    <div class="form-group">
                        <label>Archive</label>
                        <input name="archive_name" type="text" class="form-control" placeholder="Archive">
                    </div>
                    <div class="form-group">
                        <label>Detail Archive</label>
                        <input name="archive_detail" type="text" class="form-control" placeholder="Detail Archive">
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