@extends('user_master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-header py-3">
                    <h4 class="card-title text-center">Edit Sejarah Desa</h4>
                </div>
                <div class="card card-body">
                    <form class="form-horizontal m-t-30" action="{{url('/sejarah-desa/'.$data->id)}}" method="POST"
                          enctype="multipart/form-data">
                        {{method_field('PUT')}}
                        @csrf
                        <input type="hidden" class="form-control" name="title" value="{{$data->id}}">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" value="{{$data->title}}">
                        </div>
                        <div class="form-group">
                            <label>Visitor</label>
                            <input type="text" class="form-control" name="visitor" value="{{$data->visitor}}">
                        </div>
                        <div class="form-group">
                            <label>History</label>
                            <textarea class="form-control" rows="5" name="history">{{$data->history}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Upload Image</label>
                            <input type="file" class="form-control" name="image" value="{{$data->image}}">
                        </div>
                        <button type="submit" class="btn btn-warning"> Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
