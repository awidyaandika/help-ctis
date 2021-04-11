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
                        <li class="breadcrumb-item"><a href="#">Test Kit</a></li>
                        <li class="breadcrumb-item active">View Test Kit</li>
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
                        <h3 class="card-title">List of Test Kit</h3>
                        <a href="{{ route('test-kit.create') }}" class="btn btn-sm btn-primary">Add Data</a>
                    </div>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Test Centre</th>
                            <th>Test Name</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $testkit)
                            @if($testkit->centre_name==Auth::user()->centre_name)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $testkit->centre_name}}</td>
                                    <td>{{ $testkit->test_name}}</td>
                                    <td>{{ $testkit->stock}}</td>
                                    <td>
                                        <form action="{{route('test-kit.destroy', $testkit->id)}}" method="POST">
                                            <input name="_method" type="hidden" value="DELETE">
                                            <a class="btn btn-info btn-sm" href="{{ route('test-kit.show', $testkit->id) }}"><i class="nav-icon fas fa-eye"></i></a>
                                            <a class="btn btn-warning btn-sm" href="{{ route('test-kit.edit', $testkit->id) }}"><i class="nav-icon fas fa-edit"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="nav-icon fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Test Centre</th>
                            <th>Test Name</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection
