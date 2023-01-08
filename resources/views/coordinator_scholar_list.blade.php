@extends('layouts.coordinator')

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
                                <th>Full Name</th>
                                <th>More Info</th>
                                <th>Status</th>
                                <th>Course</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>School Yr Start</th>
                                <th>School Yr End</th>
                                <th>School</th>
                                <th>Year Level</th>
                            </thead>
                            <tbody>
                                @foreach ($scholar as $data)
                                    <tr>
                                        <td>{{ $data->first_name }} {{ $data->last_name }}</td>
                                        <td>
                                            <!-- Button trigger modal --> 
                                            <button type="button" class="btn btn-sm btn-primary btn-block" data-toggle="modal"
                                                data-target="#exampleModal">
                                                View
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Scholar Personnal
                                                                Information</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table table-bordered table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Birthday</th>
                                                                        <th>Age</th>
                                                                        <th>Address</th>
                                                                        <th>Number</th>
                                                                        <th>Gender</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>{{ $data->birthday }}</td>
                                                                        <td>{{ $data->age }}</td>
                                                                        <td>{{ $data->address }}</td>
                                                                        <td>{{ $data->number }}</td>
                                                                        <td>{{ $data->gender }}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            {{-- <button type="button" class="btn btn-sm btn-primary">Save
                                                                changes</button> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
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
