@extends('user_master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-header py-3">
                    <h4 class="card-title text-center">Edit Visi dan Misi</h4>
                </div>
                <div class="card card-body">
                    <form class="form-horizontal m-t-30" action="{{url('/visi-misi/'.$data->id)}}" method="POST">
                        {{method_field('PUT')}}
                        @csrf
                        <input type="hidden" class="form-control" name="id" value="{{$data->id}}">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" value="{{$data->title}}">
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <input type="text" class="form-control" name="category_name" value="{{$data->category_name}}">
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea class="form-control" rows="5" name="Content">{{$data->content}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Specific</label>
                            <textarea class="form-control" rows="5" name="specific">{{$data->specific}}</textarea>
                        </div>

                        <button type="submit" class="btn btn-warning"> Update </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
