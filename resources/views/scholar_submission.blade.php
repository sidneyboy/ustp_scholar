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
                <div class="card-body">
                    <input type="file" class="form-control" name="file" required>
                    <input type="hidden" value="{{ $scholar->id }}" id="id" name="id">
                </div>
                {{-- <div class="card-footer">
                    <button class="btn btn-success float-right btn-sm" style="margin-bottom: 10px;">Submit</button>
                </div> --}}

            </div>
        </div>
    </div>
    
  


@endsection
