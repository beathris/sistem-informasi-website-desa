@extends('user_master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-header py-3">
                    <h4 class="card-title text-center">Add New</h4>
                </div>
                <div class="card card-body">
                    <form class="form-horizontal m-t-30" action="{{url('/under-graduate')}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Kelompok</label>
                            <input type="text" class="form-control" name="group">
                        </div>
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="text" class="form-control" name="total">
                        </div>
                        <div class="form-group">
                            <label>Laki-laki</label>
                            <input type="text" class="form-control" name="female">
                        </div>
                        <div class="form-group">
                            <label>Perempuan</label>
                            <input type="text" class="form-control" name="male">
                        </div>

                        <button type="submit" class="btn btn-success"> Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
