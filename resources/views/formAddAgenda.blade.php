@extends('user_master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-header py-3">
                    <h4 class="card-title text-center">Add New</h4>
                </div>
                <div class="card card-body">
                    <form class="form-horizontal m-t-30" action="{{url('/agenda')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label>Pelaksanaan</label>
                            <input type="datetime-local" class="form-control" name="date_time">
                        </div>
                        <div class="form-group">
                            <label>Koordinator</label>
                            <input type="text" class="form-control" name="coordinator">
                        </div>
                        <div class="form-group">
                            <label>Lokasi</label>
                            <textarea class="form-control" rows="5" name="location"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success"> Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
