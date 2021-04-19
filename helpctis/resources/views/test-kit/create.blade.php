@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Test Kit</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('test-kit.index') }}">Test Kit</a></li>
                        <li class="breadcrumb-item active">Add Data</li>
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
                            <h3 class="card-title">Add Data</h3>
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
                            <form action="{{ route('test-kit.store') }}" method="POST">
                                @csrf
                                @foreach ($testcentres as $testcentre)
                                    @if($testcentre->centre_name==Auth::user()->centre_name)
                                        <input type="hidden" class="form-control" name="centre_id" id="centre_id" value="{{$testcentre->id}}" required>
                                    @endif
                                @endforeach
                                <div class="form-group">
                                    <label for="test_name">Test Name <span class="text-danger">*</span></label>
                                    <select name="test_name" id="test_name" class="form-control">
                                        <option value="" selected disabled>-- Test Name --</option>
                                        <option value="Swab">Swab</option>
                                        <option value="PCR">PCR</option>
                                        <option value="Rapid">Rapid Test</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="stock">Stock <span class="text-danger">*</span></label>
                                    <input type="number" min="1" class="form-control @error('stock') is-invalid @enderror" name="stock" id="stock" required>
                                    @error('stock')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group d-flex justify-content-between">
                                    <div>
                                        <a href="{{ route('test-kit.index') }}" class="btn btn-sm btn-default">Back</a>
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
