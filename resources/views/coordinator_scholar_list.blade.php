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
                        <table class="table table-bordered table-hover" id="table">
                            <thead>
                                <th>Full Name</th>
                                <th>Course</th>
                                {{-- <th>Start</th>
                                <th>End</th>
                                <th>School Yr Start</th>
                                <th>School Yr End</th> --}}
                                <th>School</th>
                                <th>Year Level</th>
                                <th>Status</th>
                                <th>More Info</th>
                                <th>Grades</th>
                                <th>COR</th>
                                <th>Logs</th>
                            </thead>
                            <tbody>
                                @foreach ($scholar as $data)
                                    <tr>
                                        <td>{{ $data->first_name }} {{ $data->last_name }}</td>
                                        <td>{{ $data->course }}</td>
                                        {{-- <td>{{ $data->semester_start }}</td>
                                        <td>{{ $data->semester_end }}</td>
                                        <td>{{ $data->school_year_start }}</td>
                                        <td>{{ $data->school_year_end }}</td> --}}
                                        <td>{{ $data->school }}</td>
                                        <td>{{ $data->year_level }}</td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#exampleModalstatus{{ $data->id }}">
                                                {{ $data->status }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalstatus{{ $data->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Status
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('coordinator_update_status') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="">Status</label>
                                                                    <select name="status" class="form-control" required>
                                                                        <option value="" default>Select</option>
                                                                        <option value="{{ $data->status }}" selected>
                                                                            {{ $data->status }}</option>
                                                                        @if ($data->status == 'Active')
                                                                            <option value="Inactive">Inactive</option>
                                                                            <option value="Graduated">Graduated</option>
                                                                            <option value="On Hold">On Hold</option>
                                                                        @elseif($data->status == 'Inactive')
                                                                            <option value="Active">Active</optio>
                                                                            <option value="Graduated">Graduated</option>
                                                                            <option value="On Hold">On Hold</option>
                                                                        @elseif($data->status == 'Graduated')
                                                                            <option value="Active">Active</option>
                                                                            <option value="Inactive">Inactive</option>
                                                                            <option value="On Hold">On Hold</option>
                                                                        @elseif ($data->status == 'On Hold')
                                                                            <option value="Active">Active</option>
                                                                            <option value="Inactive">Inactive</option>
                                                                            <option value="Graduated">Graduated</option>
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                                <input type="hidden" value="{{ $data->id }}"
                                                                    name="scholar_id">
                                                                <input type="hidden" value="{{ $coordinator->id }}"
                                                                    name="coordinator_id">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-sm btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-sm btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-sm btn-primary btn-block"
                                                data-toggle="modal"
                                                data-target="#exampleModalPersonalinformation{{ $data->id }}">
                                                View
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalPersonalinformation{{ $data->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
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
                                                                        <td>
                                                                            @php
                                                                                $today = date('Y-m-d');
                                                                                $diff = date_diff(date_create($data->birthday), date_create($today));
                                                                                echo $diff->format('%y');
                                                                            @endphp
                                                                        </td>
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
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-sm btn-primary btn-block"
                                                data-toggle="modal" data-target="#exampleModalgrades{{ $data->id }}">
                                                Show
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalgrades{{ $data->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Submitted
                                                                Grades
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table table-bordered table-sm">
                                                                <thead>
                                                                    <tr>
                                                                        <th>School</th>
                                                                        <th>Academ Year</th>
                                                                        <th>Semester</th>
                                                                        <th>Status</th>
                                                                        <th>Submitted Date</th>
                                                                        <th>Grades</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($data->grade_details as $grades)
                                                                        <tr>
                                                                            <td>{{ $grades->school->school }}</td>
                                                                            <td>{{ $grades->academ->school_year }}</td>
                                                                            <td>{{ $grades->semester }}</td>
                                                                            <td>
                                                                                @if ($grades->status == null)
                                                                                    Pending
                                                                                @else
                                                                                    {{ $grades->status }}
                                                                                @endif
                                                                            </td>
                                                                            <td>{{ date('F j, Y', strtotime($grades->created_at)) }}
                                                                            </td>
                                                                            <td><a href="{{ url('scholar_subject_view', [
                                                                                'id' => $id,
                                                                                'grades' => $grades->id,
                                                                            ]) }}"
                                                                                    class="btn btn-sm btn-info btn-block">Show</a>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#exampleModalcoe{{ $data->id }}">
                                                Show
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalcoe{{ $data->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Submitted COE
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table table-bordered table-hover table-sm">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Scholar</th>
                                                                        <th>Date Submitted</th>
                                                                        <th>Status</th>
                                                                        <th>Coe</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($data->attachments as $attachment)
                                                                        @if ($attachment->image_type == 'coe')
                                                                            <tr>
                                                                                <td>{{ $data->first_name }}
                                                                                    {{ $data->last_name }}</td>
                                                                                <td>{{ date('F j, Y', strtotime($attachment->created_at)) }}
                                                                                </td>
                                                                                <td>{{ $attachment->status }}</td>
                                                                                <td><a href="{{ asset('/storage/' . $attachment->attachment) }}"
                                                                                        target="_blank">View COE</a>



                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-sm btn-block btn-primary" data-toggle="modal"
                                                data-target="#exampleModal{{ $data->id }}">
                                                Logs
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Request Log
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table table-bordered table-hover table-sm">
                                                                <thead>
                                                                    <tr>
                                                                        <th>From</th>
                                                                        <th>To</th>
                                                                        <th>Date Approved</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($data->logs as $logs)
                                                                        <tr>
                                                                            <td>{{ $logs->transfer_from }}</td>
                                                                            <td>{{ $logs->transfer_to }}</td>
                                                                            <td>{{ date('F j, Y', strtotime($logs->created_at)) }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
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
