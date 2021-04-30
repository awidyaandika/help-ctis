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
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
                            <th>Symptoms</th>
                            <th>Result Date</th>
                            <th>Status</th>
                            <th>Result</th>
                            @if(auth()->user()->position=='tester' or auth()->user()->position=='patient' or auth()->user()->position=='officer')
                                <th>Action</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $covidtest)
                                @if(auth()->user()->position=='tester' or auth()->user()->position=='officer')
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $covidtest->centre_name}}</td>
                                        <td>{{ $covidtest->officer_name}}</td>
                                        <td>{{ $covidtest->patient_name}}</td>
                                        <td>{{ $covidtest->test_date}}</td>
                                        <td>{{ $covidtest->test_name}}</td>
                                        <td>{{ $covidtest->symptoms}}</td>
                                        <td>{{ $covidtest->result_date}}</td>
                                        <td>
                                            @if($covidtest->status == 'Process')
                                                <button type="button" class="btn btn-outline-primary btn-sm">Process</button>
                                            @elseif($covidtest->status == 'Completed')
                                                <button type="button" class="btn btn-outline-success btn-sm">Completed</button>
                                            @endif
                                        </td>
                                        <td>{{ $covidtest->result}}</td>
                                        @if(auth()->user()->position=='tester')
                                            <td>
                                                <a class="btn btn-info btn-sm" href="{{ route('ct-show', $covidtest->id) }}"><i class="nav-icon fas fa-eye"></i></a>
                                                <a class="btn btn-warning btn-sm" href="{{ route('ct-edit', $covidtest->id) }}"><i class="nav-icon fas fa-edit"></i></a>
                                                <a class="btn btn-danger btn-sm" href="javascript:void(0);" data-toggle="modal" data-target="#deleteModal"><i class="nav-icon fas fa-trash-alt"></i></a>
                                                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
                                                     aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabelLogout">Delete</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are you sure you want to delete this data?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                                                                <a href="{{route('covid-test.destroy', $covidtest->id)}}" class="btn btn-outline-danger" onclick="event.preventDefault();
                                                                            document.getElementById('delete-form').submit();">Delete</a>
                                                                <form id="delete-form" action="{{route('covid-test.destroy', $covidtest->id)}}" method="POST" class="d-none">
                                                                    <input name="_method" type="hidden" value="DELETE">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        @endif
                                        @if(auth()->user()->position=='officer')
                                            <td>
                                                <a class="btn btn-info btn-sm" href="{{ route('ct-show', $covidtest->id) }}"><i class="nav-icon fas fa-eye"></i></a>
                                            </td>
                                        @endif
                                    </tr>
                                @elseif(auth()->user()->position=='patient')
                                    @if($covidtest->patient_name==Auth::user()->name)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $covidtest->centre_name}}</td>
                                            <td>{{ $covidtest->officer_name}}</td>
                                            <td>{{ $covidtest->patient_name}}</td>
                                            <td>{{ $covidtest->test_date}}</td>
                                            <td>{{ $covidtest->test_name}}</td>
                                            <td>{{ $covidtest->symptoms}}</td>
                                            <td>{{ $covidtest->result_date}}</td>
                                            <td>{{ $covidtest->status}}</td>
                                            <td>{{ $covidtest->result}}</td>
                                            <td>
                                                <a class="btn btn-info btn-sm" href="{{ route('ct-show', $covidtest->id) }}"><i class="nav-icon fas fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endif
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
                            <th>Symptoms</th>
                            <th>Result Date</th>
                            <th>Status</th>
                            <th>Result</th>
                            @if(auth()->user()->position=='tester' or auth()->user()->position=='patient' or auth()->user()->position=='officer')
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
