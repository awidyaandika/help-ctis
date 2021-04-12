@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Centre Officer</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('centre-officer.index') }}">Centre Officer</a></li>
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
                                    <b>Name</b> <span>{{ $centre_officer->name }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <b>Gender</b> <span>{{ ucfirst($centre_officer->gender) }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <b>Date of Birth</b> <span>{{ $centre_officer->dob->format('d/m/Y') }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <b>Phone</b> <span>{{ $centre_officer->phone }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <b>Email</b> <span>{{ $centre_officer->email }}</span>
                                </li>
                                <li class="list-group-item d-flex flex-column">
                                    <b>Address</b> <span class="mt-1">{{ $centre_officer->address }}</span>
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
                                    <b>Username</b> <span>{{ $centre_officer->username }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <b>Position</b> <span>{{ ucfirst($centre_officer->position) }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <b>Test Centre</b> <span>{{ $centre_officer->centre_name }}</span>
                                </li>
                            </ul>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('centre-officer.index') }}" class="btn btn-sm btn-default">Back</a>
                                <div>
                                    <form action="{{ route('centre-officer.destroy', $centre_officer->id) }}" method="POST">
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
