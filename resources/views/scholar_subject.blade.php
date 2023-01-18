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
                <div class="card-header">Submission of Grades</div>
                <div class="card-body">
                    <table class="table table-bordered table-sm table-hover">
                        <thead>
                            <tr>
                                <td>View Grades</td>
                                <td>Scholar</td>
                                <td>School</td>
                                <td>Academic Year</td>
                                <td>Semester</td>
                                <td>Date Submitted</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($grade_details as $data)
                                <tr>
                                    <td><a href="{{ url('scholar_subject_view',[
                                        'id' => $id,
                                        'grade_id' => $data->id
                                    ]) }}" class="btn btn-sm btn-info btn-block">View</a></td>
                                    <td>{{ $data->scholar->first_name }} {{ $data->scholar->last_name }}</td>
                                    <td>{{ $data->school->school }}</td>
                                    <td>{{ $data->academ->school_year }}</td>
                                    <td>{{ $data->semester }}</td>
                                    <td>{{ date('F j, Y', strtotime($data->created_at)) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
