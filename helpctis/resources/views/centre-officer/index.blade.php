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
                        <li class="breadcrumb-item"><a href="#">Centre Officer</a></li>
                        <li class="breadcrumb-item active">View Centre Officer</li>
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
                        <h3 class="card-title">List of Centre Officer</h3>
                        @if(auth()->user()->position=='manager')
                            <a href="{{ route('centre-officer.create') }}" class="btn btn-sm btn-primary">Add Data</a>
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
                            <th>Username</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            @if(auth()->user()->position=='manager')
                                <th>Action</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($centreofficers as $centreofficer)
                            @if($centreofficer->centre_name==Auth::user()->centre_name)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $centreofficer->centre_name}}</td>
                                    <td>{{ $centreofficer->username}}</td>
                                    <td>{{ $centreofficer->name}}</td>
                                    <td>{{ $centreofficer->gender}}</td>
                                    <td>{{ $centreofficer->email}}</td>
                                    <td>{{ $centreofficer->phone}}</td>
                                    <td>{{ $centreofficer->address}}</td>
                                    @if(auth()->user()->position=='manager')
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{ route('cf-show', $centreofficer->id) }}"><i class="nav-icon fas fa-eye"></i></a>
                                            <a class="btn btn-warning btn-sm" href="{{ route('cf-edit', $centreofficer->id) }}"><i class="nav-icon fas fa-edit"></i></a>
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
                                                            <a href="{{route('centre-officer.destroy', $centreofficer->id)}}" class="btn btn-outline-danger" onclick="event.preventDefault();
                           document.getElementById('delete-form').submit();">Delete</a>
                                                            <form id="delete-form" action="{{route('centre-officer.destroy', $centreofficer->id)}}" method="POST" class="d-none">
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
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Centre Name</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            @if(auth()->user()->position=='manager')
                                <th>Action</th>
                            @endif
                        </tr>
                        </tfoot>
                    </table>
                    {!! $centreofficers->links() !!}
                </div>
            </div>
        </div>
    </section>
@endsection
