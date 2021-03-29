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
                        <li class="breadcrumb-item"><a href="#">Test Centre</a></li>
                        <li class="breadcrumb-item active">Add Test Centre</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card-header">
                    <h3 class="card-title">DataTable Test Centre</h3>

                    <div class="text-right">
                        <a class="btn btn-success btn-sm" href="{{ route('add-testcentre') }}">Add Test Centre</a>
                    </div>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Centre Name</th>
                            <th>Address</th>
                            <th>Postal Code</th>
                            <th>Phone</th>
                            <th>City</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($testcentres as $key => $value)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $value->centreName}}</td>
                            <td>{{ $value->address}}</td>
                            <td>{{ $value->postalCode}}</td>
                            <td>{{ $value->phone}}</td>
                            <td>{{ $value->city}}</td>
                            <td class="text-center">
                                <form action="{{ route('testcentres.destroy', $value->id) }}" method="POST">
                                    <a class="btn btn-primary btn-sm" href="{{ route('testcentres.edit', $value->id) }}"><i class="nav-icon fas fa-edit"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="nav-icon fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Centre Name</th>
                            <th>Address</th>
                            <th>Postal Code</th>
                            <th>Phone</th>
                            <th>City</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                    {!! $testcentres->links() !!}
                </div>
            </div>
        </div>
    </section>

@endsection