@extends('user_master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-header py-3">
                    <h4 class="card-title text-center">Update Data</h4>
                </div>
                <div class="card card-body">
                    <form class="form-horizontal m-t-30" action="{{url('/news/'.$data->id)}}" method="POST"
                          enctype="multipart/form-data">
                        {{method_field('PUT')}}
                        @csrf
                        <input type="hidden" class="form-control" name="title" value="{{$data->id}}">
                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="custom-select col-12" name="news_category_id" id="inlineFormCustomSelect">
                                <option selected value="{{$data->news_category_id}}">{{$data->news_category->name}}</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" class="form-control" name="title" value="{{$data->title}}">
                        </div>
                        <div class="form-group">
                            <label>Visitor</label>
                            <input type="text" class="form-control" name="visitor" value="{{$data->visitor}}">
                        </div>
                        <div class="form-group">
                            <label>Kontent</label>
                            <textarea class="form-control" rows="5" name="Content">{{$data->content}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Upload Photo</label>
                            <input type="file" class="form-control" name="image" value="{{$data->image}}">
                        </div>
                        <button type="submit" class="btn btn-warning"> Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
