@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger border-left-danger" role="alert">
            <ul class="pl-4 my-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Scholar List</div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>first_name</th>
                                    <th>last_name</th>
                                    <th>birthday</th>
                                    <th>age</th>
                                    <th>address</th>
                                    <th>number</th>
                                    <th>gender</th>
                                    <th>email</th>
                                    <th>password</th>
                                    <th>status</th>
                                    <th>course</th>
                                    <th>semester_start</th>
                                    <th>semester_end</th>
                                    <th>school_year_start</th>
                                    <th>school_year_end</th>
                                    <th>school</th>
                                    <th>year_level</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($scholar as $data)
                                    <tr>
                                        <td>{{ $data->first_name }}</td>
                                        <td>{{ $data->last_name }}</td>
                                        <td>{{ $data->birthday }}</td>
                                        <td>{{ $data->age }}</td>
                                        <td>{{ $data->address }}</td>
                                        <td>{{ $data->number }}</td>
                                        <td>{{ $data->gender }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->password }}</td>
                                        <td>{{ $data->status }}</td>
                                        <td>{{ $data->course }}</td>
                                        <td>{{ $data->semester_start }}</td>
                                        <td>{{ $data->semester_end }}</td>
                                        <td>{{ $data->school_year_start }}</td>
                                        <td>{{ $data->school_year_end }}</td>
                                        <td>{{ $data->school }}</td>
                                        <td>{{ $data->year_level }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
