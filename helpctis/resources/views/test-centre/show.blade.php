@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Test Centre</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('test-centre.index') }}">Test Centre</a></li>
                        <li class="breadcrumb-item active">Detail Data</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Detail Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item d-flex justify-content-between">
                                    <b>Centre Name</b> <span>{{ $testCentre->centre_name }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <b>Phone</b> <span>{{ $testCentre->phone }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <b>Postal Code</b> <span>{{ $testCentre->postal_code }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <b>City</b> <span>{{ $testCentre->city }}</span>
                                </li>
                                <li class="list-group-item d-flex flex-column">
                                    <b>Address</b> <span class="mt-1">{{ $testCentre->address }}</span>
                                </li>
                            </ul>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('test-centre.index') }}" class="btn btn-sm btn-default">Back</a>
                                <div>
                                    <form action="{{ route('test-centre.destroy', $testCentre->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
