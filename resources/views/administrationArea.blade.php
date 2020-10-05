@extends('user_master')
@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/dashboard">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Area Administrasi</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <a href="{{url('/administration-area/create')}}" type="button" class="btn btn-success mb-3"><i
                class="mdi mdi-plus-circle"></i> Add New</a>
        <table class="table table-hover table-striped table-bordered">
            <thead class="table-info">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Dusun</th>
                <th scope="col">Nama Kasun</th>
                <th scope="col">Jumlah RT</th>
                <th scope="col">Jumlah KK</th>
                <th scope="col">Jiwa</th>
                <th scope="col">Lk</th>
                <th scope="col">Pr</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                @foreach($data as $admin)
                    <th scope="row">{{$loop->index}}</th>
                    <td>{{$admin->dusun_name}}</td>
                    <td>{{$admin->kasun_name}}</td>
                    <td>{{$admin->neighborhood_association}}</td>
                    <td>{{$admin->family}}</td>
                    <td>{{$admin->amount_of_people}}</td>
                    <td>{{$admin->female}}</td>
                    <td>{{$admin->male}}</td>
                    <td>
                        <a href="{{url('/administration-area/'.$admin->id.'/edit')}}" type="button"
                           class="btn btn-warning btn-block mb-2"><i class="mdi mdi-update"></i>Edit</a>
                        <form action="{{url('/administration-area/'.$admin->id)}}" method="POST">
                            <input class="btn btn-danger btn-block" type="submit" value="Delete">
                            <input type="hidden" name="_method" value="delete"/>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                    </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
@endsection
