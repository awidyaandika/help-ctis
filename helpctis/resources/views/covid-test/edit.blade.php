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
                        <li class="breadcrumb-item active">Edit Data</li>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            @endif
                            <form action="{{ route('covid-test.update', $covidTest->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="patient_name">Patient <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('patient_name') is-invalid @enderror" name="patient_name" id="patient_name" value="{{ $covidTest->patient_name }}" readonly required>
                                    @error('patient_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Test Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="" id="" value="{{ $covidTest->test_date->format('Y-m-d') }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="test_name">Type Test <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('test_name') is-invalid @enderror" name="test_name" id="test_name" value="{{ $covidTest->test_name }}" readonly required>
                                    @error('test_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="symptoms">Symptoms <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('symptoms') is-invalid @enderror" name="symptoms" id="symptoms" readonly required>{{ $covidTest->symptoms }}</textarea>
                                    @error('symptoms')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="result_date">Result Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="result_date" id="resultdate" value="{{ $covidTest->result_date->format('Y-m-d') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status <span class="text-danger">*</span></label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="" selected disabled>-- Status --</option>
                                        <option value="Process" {{ old('status') == 'Process' || (isset($covidTest) && $covidTest->status == 'Process') ? 'selected' : '' }}>Process</option>
                                        <option value="Completed" {{ old('status') == 'Completed' || (isset($covidTest) && $covidTest->status == 'Completed') ? 'selected' : '' }}>Completed</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="result">Result <span class="text-danger">*</span></label>
                                    <select name="result" id="result" class="form-control">
                                        <option value="" selected disabled>-- Result --</option>
                                        <option value="HEALTHY and NEGATIVE COVID test results with the COVID-19 {{$covidTest->test_name}}">Negative</option>
                                        <option value="POSITIVE COVID test results with the COVID-19 {{$covidTest->test_name}}">Positive</option>
                                    </select>
                                    @error('result')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group d-flex justify-content-between">
                                    <div>
                                        <a href="{{ route('covid-test.index') }}" class="btn btn-sm btn-default">Back</a>
                                    </div>
                                    <div>
                                        <button type="reset" class="btn btn-sm btn-default">Reset</button>
                                        <button type="submit" class="btn btn-sm btn-success">Save</button>
                                    </div>
                                </div>
                            </form>
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

