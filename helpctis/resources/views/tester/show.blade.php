@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tester</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('tester.index') }}">Tester</a></li>
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
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Bio</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item d-flex justify-content-between">
                                    <b>Name</b> <span>{{ $tester->name }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <b>Gender</b> <span>{{ ucfirst($tester->gender) }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <b>Date of Birth</b> <span>{{ $tester->dob->format('d/m/Y') }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <b>Phone</b> <span>{{ $tester->phone }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <b>Email</b> <span>{{ $tester->email }}</span>
                                </li>
                                <li class="list-group-item d-flex flex-column">
                                    <b>Address</b> <span class="mt-1">{{ $tester->address }}</span>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Account</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item d-flex justify-content-between">
                                    <b>Username</b> <span>{{ $tester->username }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <b>Position</b> <span>{{ ucfirst($tester->position) }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <b>Test Centre</b> <span>{{ $tester->centre_name }}</span>
                                </li>
                            </ul>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('tester.index') }}" class="btn btn-sm btn-default">Back</a>
                                <div>
                                    <form action="{{ route('tester.destroy', $tester->id) }}" method="POST">
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
    <!-- /.content -->

@endsection
