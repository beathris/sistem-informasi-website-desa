@extends('user_master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-header py-3">
                    <h4 class="card-title text-center">Add New</h4>
                </div>
                <div class="card card-body">
                    <form class="form-horizontal m-t-30" action="{{url('/staff-category/'.$data->id)}}" method="POST">
                        {{method_field('PUT')}}
                        @csrf
                        <input type="hidden" class="form-control" name="id" value="{{$data->id}}">
                        <div class="form-group">
                            <label>Category</label>
                            <input type="text" class="form-control" name="name" value="{{$data->name}}">
                        </div>
                        <button type="submit" class="btn btn-warning"> Update </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
