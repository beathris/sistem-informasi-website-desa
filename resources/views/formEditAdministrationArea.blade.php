@extends('user_master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-header py-3">
                    <h4 class="card-title text-center">Add New</h4>
                </div>
                <div class="card card-body">
                    <form class="form-horizontal m-t-30" action="{{url('/administration-area', [$data->id] )}}" method="POST">
                        {{method_field('PUT')}}
                        @csrf
                        <div class="form-group">
                            <label>Nama Dusun</label>
                            <input type="text" class="form-control" name="dusun_name" value="{{$data->dusun_name}}">
                        </div>
                        <div class="form-group">
                            <label>Nama Kasun</label>
                            <input type="text" class="form-control" name="kasun_name" value="{{$data->kasun_name}}">
                        </div>
                        <div class="form-group">
                            <label>Jumlah RT </label>
                            <input type="text" class="form-control" name="neighborhood_association" value="{{$data->neighborhood_association}}">
                        </div>
                        <div class="form-group">
                            <label>Jumlah KK</label>
                            <input type="text" class="form-control" name="family" value="{{$data->family}}">
                        </div>
                        <div class="form-group">
                            <label>Jiwa</label>
                            <input type="text" class="form-control" name="amount_of_people" value="{{$data->amount_of_people}}">
                        </div>
                        <div class="form-group">
                            <label>Laki-laki</label>
                            <input type="text" class="form-control" name="female" value="{{$data->female}}">
                        </div>
                        <div class="form-group">
                            <label>Perempuan</label>
                            <input type="text" class="form-control" name="male" value="{{$data->male}}">
                        </div>

                        <button type="submit" class="btn btn-success"> Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
