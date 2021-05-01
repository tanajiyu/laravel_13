@extends('layouts.master')

@section('content-header')
    <h1>
        Dashboard
        <small>Show</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Show</a></li>
        <li class="active">Dashboard</li>
    </ol>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Peminjam {{$data->name}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <table class="table table-striped">
            <tr>
              <th>Nama</th>
              <th>Description</th>
              <th>Date</th>
            </tr>
              @foreach($data->employee as $d)
                <tr>
                  <td>{{$d->name}}</td>
                  <td>{{$d->pivot->description}}</td>
                  <td>{{$d->pivot->created_at}}</td>
                </tr>
              @endforeach
            
          </table>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
  </div>
@endsection