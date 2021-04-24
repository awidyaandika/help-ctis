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
                        <li class="breadcrumb-item"><a href="#">Tester</a></li>
                        <li class="breadcrumb-item active">View Tester</li>
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
                        <h3 class="card-title">List of Tester</h3>
                        @if(auth()->user()->position=='manager')
                            <a href="{{ route('tester.create') }}" class="btn btn-sm btn-primary">Add Data</a>
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
                        @foreach ($testers as $tester)
                            @if($tester->centre_name==Auth::user()->centre_name)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $tester->centre_name}}</td>
                                    <td>{{ $tester->username}}</td>
                                    <td>{{ $tester->name}}</td>
                                    <td>{{ $tester->gender}}</td>
                                    <td>{{ $tester->email}}</td>
                                    <td>{{ $tester->phone}}</td>
                                    <td>{{ $tester->address}}</td>
                                    @if(auth()->user()->position=='manager')
                                        <td>
                                            <form action="{{route('tester.destroy', $tester->id)}}" method="POST">
                                                <input name="_method" type="hidden" value="DELETE">
                                                <a class="btn btn-info btn-sm" href="{{ route('ts-show', $tester->id) }}"><i class="nav-icon fas fa-eye"></i></a>
                                                <a class="btn btn-warning btn-sm" href="{{ route('ts-edit', $tester->id) }}"><i class="nav-icon fas fa-edit"></i></a>
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
                    {!! $testers->links() !!}
                </div>
            </div>
        </div>
    </section>

@endsection
