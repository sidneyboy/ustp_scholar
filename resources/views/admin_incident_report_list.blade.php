@extends('layouts.admin')

@section('main-content')

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
                <div class="card-header">File Incident Report List</div>
                <div class="card-body">
                    <table class="table table-bordered table-sm table-hover" id="table">
                        <thead>
                            <tr>
                                <th>Scholar</th>
                                <th>Report Type</th>
                                <th>Action Taken</th>
                                <th>Remarks</th>
                                <th>Report Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($incident_report as $data)
                                <tr>
                                    <td>{{ Str::ucfirst($data->scholar->first_name) }}
                                        {{ Str::ucfirst($data->scholar->last_name) }}</td>
                                    <td>{{ $data->report_type }}</td>
                                    <td>{{ $data->action_taken }}</td>
                                    <td>{{ $data->remarks }}</td>
                                    <td>{{ date('F j, Y', strtotime($data->created_at)) }}
                                    </td>
                                    <td>{{ $data->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
