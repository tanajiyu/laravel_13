@extends('layouts.master')

@section('content-header')
    <h1>
        Dashboard
        <small>Archive</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Archive</a></li>
        <li class="active">Dashboard</li>
    </ol>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <a href="/archive/create">
        <button type="submit" class="btn btn-primary">Create Archive</button>
      </a>
    </div>

    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Archive</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <table class="table table-striped">
            <tr>
              <th style="width: 10px">#</th>
              <th>Name</th>
              <th>Detail</th>
              <th>Action</th>
            </tr>
              @foreach($data as $d)
                <tr>
                  <td>#</td>
                  <td>{{$d->name}}</td>
                  <td>{{$d->detail}}</td>
                  <td>
                    <a href="/archive/edit/{{$d->id}}">Edit</a> | 
                    <a href="/archive/delete/{{$d->id}}">Delete</a>
                  </td>
                </tr>
              @endforeach
            
          </table>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
  </div>
@endsection