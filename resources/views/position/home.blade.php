@extends('layouts.master')

@section('content-header')
    <h1>
        Position
        <small>Home</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-Position"></i> Home</a></li>
        <li class="active">Position</li>
    </ol>
@endsection

@section('content') 
  <div class="row">
    <div class="col-md-12">
      <a href="/position/create">
        <button type="submit" class="btn btn-primary">Insert Position</button>
      </a>
    </div>

    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Position</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <table class="table table-striped">
            <tr>
              <th style="width: 10px">#</th>
              <th>Name</th>
              <th>Department ID</th>
              <th>Action</th>
            </tr>
              @foreach($data as $d)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$d->name}}</td>
                  <td>{{$d->department->name}}</td>
                  <td>
                    <a href="/position/edit/{{$d->id}}">Edit</a> | 
                    <a href="/position/delete/{{$d->id}}">Delete</a>
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