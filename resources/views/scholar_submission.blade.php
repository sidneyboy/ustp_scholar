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
                <div class="card-header">Submission Activity</div>
                {{-- <div class="card-body">
                    <a href="{{ url('scholar_subject',['id' => $id]) }}" class="btn btn-sm float-right btn-info">+ New Subject and Grades</a>
                    <br /><br />
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>Subject</th>
                                <th>Units</th>
                                <th>Grades</th>
                                <th>Submitted Date</th>
                                <th>S.Y</th>
                                <th>Semester</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($grades) != 0)
                                @for ($i = 0; $i < count($grades); $i++)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $grades[$i]->subject_code }}</td>
                                        <td>{{ $grades[$i]->subject_name }}</td>
                                        <td>{{ $grades[$i]->subject_units }}</td>
                                        <td>{{ $grades[$i]->subject_grades }}</td>
                                        <td>{{ $grades[$i]->submitted_date }}</td>
                                        <td>{{ $grades[$i]->school_year }}</td>
                                        <td>{{ $grades[$i]->semester }}</td>
                                        <td>{{ $grades[$i]->status }}</td>
                                    </tr>
                                @endfor
                            @endif
                        </tbody>
                    </table>
                </div> --}}
                <form action="{{ route('scholar_submission_process_final') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">School</label>
                                <select name="school" id="school" class="form-control" required>
                                    <option value="" default>Select</option>
                                    @foreach ($school as $data)
                                        <option value="{{ $data->id }}">{{ $data->school }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="">Academic Year</label>
                                <select name="academic_year" id="academic_year" class="form-control" required>
                                    <option value="" default>Select</option>
                                    @foreach ($academic_year as $data)
                                        <option value="{{ $data->id }}">Academic Year - {{ $data->school_year }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="">Semester</label>
                                <select class="form-control" id="semester" required>
                                    <option value="" default>Select</option>
                                    <option value="1st Semester">1st Semester</option>
                                    <option value="2nd Semester">2nd Semester</option>
                                    <option value="3rd Semester">3rd Semester</option>
                                    <option value="Summer">Summer</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="">Grade Upload</label>
                                <input type="file" class="form-control" accept="image/*" id="file" name="file" required>
                            </div>
                        </div>
                        <input type="hidden" value="{{ $scholar->id }}" id="id" name="id">
                        <button id="submit" type="submit" style="display: none"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
