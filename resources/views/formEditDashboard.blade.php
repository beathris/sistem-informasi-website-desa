@extends('user_master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-header py-3">
                    <h4 class="card-title text-center">Edit Dashboard</h4>
                </div>
                <div class="card card-body">
                    <form class="form-horizontal m-t-30" action="{{url('/dashboard', [$home->id])}}" method="POST"
                          enctype="multipart/form-data">
                        {{method_field('PUT')}}
                        @csrf
                        <input type="hidden" class="form-control" name="title" value="{{$home->id}}">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" value="{{$home->title}}">
                        </div>
                        {{--                        <div class="form-group">--}}
                        {{--                            <label>Author</label>--}}
                        {{--                            <input type="text" class="form-control" name="author">--}}
                        {{--                        </div>--}}
                        {{--                        <div class="form-group">--}}
                        {{--                            <label>Visitor</label>--}}
                        {{--                            <input type="text" class="form-control" name="visitor">--}}
                        {{--                        </div>--}}
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="5" name="description">{{$home->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Upload Image</label>
                            <input type="file" class="form-control" name="image" value="{{$home->image}}">
                        </div>
                        <button type="submit" class="btn btn-warning"> Update </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
