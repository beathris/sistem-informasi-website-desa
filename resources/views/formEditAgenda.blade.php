@extends('user_master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-header py-3">
                    <h4 class="card-title text-center">Update Data</h4>
                </div>
                <div class="card card-body">
                    <form class="form-horizontal m-t-30" action="{{url('/agenda/'.$data->id)}}" method="POST">
                        {{method_field('PUT')}}
                        @csrf
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" class="form-control" name="title" value="{{$data->title}}">
                        </div>
                        <div class="form-group">
                            <label>Pelaksanaan</label>
                            <input type="datetime-local" class="form-control" name="date_time" value="{{$data->date_time}}">
                        </div>
                        <div class="form-group">
                            <label>Koordinator</label>
                            <input type="text" class="form-control" name="coordinator" value="{{$data->coordinator}}">
                        </div>
                        <div class="form-group">
                            <label>Lokasi</label>
                            <textarea class="form-control" rows="5" name="location">{{$data->location}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-warning"> Update </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
