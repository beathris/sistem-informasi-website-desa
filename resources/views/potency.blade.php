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
                            <li class="breadcrumb-item active" aria-current="page">Basic Table</li>
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
        <a href="{{url('/potency/create')}}" type="button" class="btn btn-success mb-3"><i
                class="mdi mdi-plus-circle"></i> Add New</a>
        <table class="table table-hover table-striped table-bordered">
            <thead class="table-info">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kategori</th>
                <th scope="col">Judul</th>
                <th scope="col">Konten</th>
                <th scope="col">Gambar</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                @foreach($data as $potency)
                    <th scope="row">{{$loop->index}}</th>
                    <td>{{$potency->potency_category->name}}</td>
                    <td>{{$potency->title}}</td>
                    <td style="width: 300px; overflow-y: auto">{{$potency->content}}</td>
                    <td><img width="50%" src="{{url($potency->image)}}"></td>
                    <td>
                        <a href="{{url('/potency/'.$potency->id.'/edit')}}" type="button"
                           class="btn btn-warning btn-block mb-2"><i class="mdi mdi-update"></i>Edit</a>
                        <form action="{{url('/potency/'.$potency->id)}}" method="POST">
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
