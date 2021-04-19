@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Covid Test</a></li>
                        <li class="breadcrumb-item active">View Covid Test</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between flex-wrap align-items-center">
                        <h3 class="card-title">List of Covid Test</h3>
                        @if(auth()->user()->position=='tester')
                            <a href="{{ route('covid-test.create') }}" class="btn btn-sm btn-primary">Add Data</a>
                        @endif
                    </div>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Centre Name</th>
                            <th>Tester</th>
                            <th>Patient</th>
                            <th>Test Date</th>
                            <th>Test Type</th>
                            <th>Symptomps</th>
                            <th>Result Date</th>
                            <th>Status</th>
                            <th>Result</th>
                            @if(auth()->user()->position=='tester')
                                <th>Action</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $covidtest)
                                @if($covidtest->centre_name==Auth::user()->centre_name)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $covidtest->centre_name}}</td>
                                        <td>{{ $covidtest->officer_name}}</td>
                                        <td>{{ $covidtest->patient_name}}</td>
                                        <td>{{ $covidtest->test_date}}</td>
                                        <td>{{ $covidtest->test_name}}</td>
                                        <td>{{ $covidtest->symptomps}}</td>
                                        <td>{{ $covidtest->result_date}}</td>
                                        <td>{{ $covidtest->status}}</td>
                                        <td>{{ $covidtest->result}}</td>
                                        @if(auth()->user()->position=='tester')
                                            <td>
                                                <form action="{{route('covid-test.destroy', $covidtest->id)}}" method="POST">
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <a class="btn btn-info btn-sm" href="{{ route('covid-test.show', $covidtest->id) }}"><i class="nav-icon fas fa-eye"></i></a>
                                                    <a class="btn btn-warning btn-sm" href="{{ route('covid-test.edit', $covidtest->id) }}"><i class="nav-icon fas fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="nav-icon fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Centre Name</th>
                            <th>Tester</th>
                            <th>Patient</th>
                            <th>Test Date</th>
                            <th>Type Test</th>
                            <th>Symptomps</th>
                            <th>Result Date</th>
                            <th>Status</th>
                            <th>Result</th>
                            @if(auth()->user()->position=='tester')
                                <th>Action</th>
                            @endif
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </section>

@endsection
