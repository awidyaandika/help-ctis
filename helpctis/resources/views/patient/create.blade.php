@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Patient</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('patient.index') }}">Patient</a></li>
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
            <form action="{{ route('patient.store') }}" method="POST">
                @csrf
                @foreach ($testcentres as $testcentre)
                    @if($testcentre->centre_name==Auth::user()->centre_name)
                        <input type="hidden" class="form-control" name="centre_name" id="centre_name" value="{{$testcentre->centre_name}}" required>
                    @endif
                @endforeach
                <div class="row">
                    <div class="col-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Patient Bio</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" required>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="gender">Gender <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="Male" value="Male" name="gender" checked>
                                                <label class="form-check-label" for="Male">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="Female" value="Female" name="gender">
                                                <label class="form-check-label" for="Female">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="dob">Date of Birth <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="dob" id="dob" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-5">
                                        <label for="phone">Phone <span class="text-danger">*</span></label>
                                        <input type="number" min="1" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" required>
                                        @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-7">
                                        <label for="email">Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" required>
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" required></textarea>
                                    @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Patient Account Detail</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="username">Username <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" required>
                                    @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">@if(isset($covid_test)) New @endif Password @if(empty($covid_test)) <span class="text-danger">*</span> @endif</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" {{ empty($covid_test) ? 'required' : '' }} autocomplete="new-password">
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Retype Password @if(empty($covid_test)) <span class="text-danger">*</span> @endif</label>
                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" {{ empty($covid_test) ? 'required' : '' }}>
                                </div>
                                <div class="form-group">
                                    <label for="position">Position <span class="text-danger">*</span></label>
                                    <select name="position" id="position" class="form-control">
                                        <option value="patient">Patient</option>
                                    </select>
                                </div>
                                <div class="form-group d-flex justify-content-between">
                                    <div>
                                        <a href="{{ route('patient.index') }}" class="btn btn-sm btn-default">Back</a>
                                    </div>
                                    <div>
                                        <button type="reset" class="btn btn-sm btn-default">Reset</button>
                                        <button type="submit" class="btn btn-sm btn-success">Save</button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </form>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
