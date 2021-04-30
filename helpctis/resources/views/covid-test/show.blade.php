@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Covid Test</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('covid-test.index') }}">Covid Test</a></li>
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
                            <h3 class="card-title">Detail Centre</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item d-flex justify-content-between">
                                    <b>Centre Name</b> <span>{{ Auth::user()->centre_name }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <b>Tester</b> <span>{{ ucfirst($covidTest->officer_name) }}</span>
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
                            <h3 class="card-title">Detail Covid Test</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item d-flex justify-content-between">
                                    <b>Patient Name</b> <span>{{ $covidTest->patient_name }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <b>Test Date</b> <span>{{ $covidTest->test_date }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <b>Type Test</b> <span>{{ ucfirst($covidTest->test_name) }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <b>Symptomps</b> <span>{{ $covidTest->symptoms }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <b>Result Date</b> <span>{{ $covidTest->result_date }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <b>Status</b> <span>{{ $covidTest->status }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <b>Result</b> <span>{{ $covidTest->result }}</span>
                                </li>
                            </ul>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('covid-test.index') }}" class="btn btn-sm btn-default">Back</a>
                                <div>
                                    <form action="{{ route('covid-test.destroy', $covidTest->id) }}" method="POST">
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
