@extends('user_master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-header py-3">
                    <h4 class="card-title text-center">Update Data</h4>
                </div>
                <div class="card card-body">
                    <form class="form-horizontal m-t-30" action="{{url('/religion', [$data->id] )}}" method="POST">
                        {{method_field('PUT')}}
                        @csrf
                        <div class="form-group">
                            <label>Kelompok</label>
                            <input type="text" class="form-control" name="group" value="{{$data->group}}">
                        </div>
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="text" class="form-control" name="total" value="{{$data->total}}">
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
