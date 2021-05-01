@extends('layouts.master')

@section('content-header')
    <h1>
        Dashboard
        <small>Department</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Department</a></li>
        <li class="active">Dashboard</li>
    </ol>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <a href="/department/create">
        <button type="submit" class="btn btn-primary">Create Department</button>
      </a>
    </div>

    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Department</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <table class="table table-striped">
            <tr>
              <th style="width: 10px">#</th>
              <th>Name</th>
              <th>Action</th>
            </tr>
              @foreach($data as $d)
                <tr>
                  <td>#</td>
                  <td>
                    <a href="/department/show/{{$d->id}}">
                      {{$d->name}}
                    </a>
                  </td>
                  <td>
                    <a href="/department/edit/{{$d->id}}">Edit</a> | 
                    <a href="/department/delete/{{$d->id}}">Delete</a>
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