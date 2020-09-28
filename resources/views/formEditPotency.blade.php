@extends('user_master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-header py-3">
                    <h4 class="card-title text-center">Edit Potensi Desa</h4>
                </div>
                <div class="card card-body">
                    <form class="form-horizontal m-t-30" action="{{url('/potency/'.$data->id)}}" method="POST"
                          enctype="multipart/form-data">
                        {{method_field('PUT')}}
                        @csrf
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" value="{{$data->title}}">
                        </div>
                        <div class="form-group">
                            <label>Kontent</label>
                            <textarea class="form-control" rows="5" name="contents">{{$data->content}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Kategori Potensi</label>
                            <select class="custom-select col-12" name="potency_category_id" id="inlineFormCustomSelect">
                                <option selected value="{{$data->potency_category->id}}">{{$data->potency_category->name}}</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Upload Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <button type="submit" class="btn btn-warning"> Update </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
