@extends('user_master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-header py-3">
                    <h4 class="card-title text-center">Add New</h4>
                </div>
                <div class="card card-body">
                    <form class="form-horizontal m-t-30" action="{{url('/institution')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Kategori</label>
                            <input type="text" class="form-control" name="category">
                        </div>
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label>Konten</label>
                            <textarea class="form-control" rows="5" name="contents"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Sub Konten</label>
                            <textarea class="form-control" rows="5" name="specific_content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success"> Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
