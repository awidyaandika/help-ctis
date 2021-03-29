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
                        <li class="breadcrumb-item active">View Test Centre</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="card-header">
                    <h3 class="card-title">DataTable Test Centre</h3>
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
                        </tr>
                        </thead>
                        @foreach ($testcentres as $testcentre)
                        <tbody>
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $testcentre->centreName}}</td>
                            <td>{{ $testcentre->address}}</td>
                            <td>{{ $testcentre->postalCode}}</td>
                            <td>{{ $testcentre->phone}}</td>
                            <td>{{ $testcentre->city}}</td>
                        </tr>
                        </tbody>
                        @endforeach
                        <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Centre Name</th>
                            <th>Address</th>
                            <th>Postal Code</th>
                            <th>Phone</th>
                            <th>City</th>
                        </tr>
                        </tfoot>
                    </table>
                    {!! $testcentres->links() !!}
                </div>
            </div>
        </div>
    </section>

@endsection
