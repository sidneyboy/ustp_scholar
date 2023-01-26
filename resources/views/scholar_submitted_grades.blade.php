@extends('layouts.scholar')

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
                <div class="card-header">Submitted Grades</div>
                <div class="card-body">
                    <table class="table table-bordered table-sm" id="table">
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
                            @foreach ($grade_details as $grades)
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
                                    <td><a href="{{ url('scholar_grades_view', [
                                        'id' => $id,
                                        'grade_id' => $grades->id,
                                    ]) }}"
                                            class="btn btn-sm btn-info btn-block">Show</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
