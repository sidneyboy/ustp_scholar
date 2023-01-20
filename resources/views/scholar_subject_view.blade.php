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
                <div class="card-header">{{ Str::ucfirst($grade_details->scholar->first_name) }}
                    {{ Str::ucfirst($grade_details->scholar->last_name) }}'s Grades

                    <!-- Button trigger modal -->
                    <button type="button" class="float-right btn btn-sm btn-danger" data-toggle="modal"
                        data-target="#exampleModalincident{{ $grade_details->id }}">
                        Incident Report
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalincident{{ $grade_details->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Create Incident Report</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('coordinator_incident_report_process') }}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="">Scholar Name</label>
                                            <input type="text" class="form-control" required disabled
                                                value="{{ ucfirst($grade_details->scholar->first_name) . ' ' . ucfirst($grade_details->scholar->first_name) }}">
                                            <input type="hidden" name="scholar_id"
                                                value="{{ $grade_details->scholar_id }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Report Type</label>
                                            <select name="report_type" id="report_type" class="form-control" required>
                                                <option value="" default>Select</option>
                                                <option value="Grade Discrepancy">Grade Discrepancy</option>
                                                <option value="Forge Signature">Forge Signature</option>
                                                <option value="No Signature">No Signature</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Action Taken</label>
                                            <textarea name="action_taken" class="form-control" required cols="30" rows="5"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Remarks</label>
                                            <input type="text" class="form-control" name="remarks" required>
                                            <input type="hidden" name="coordinator_id" value="{{ $coordinator->id }}">
                                            <input type="hidden" name="scholar_id"
                                                value="{{ $grade_details->scholar_id }}">
                                            <input type="hidden" name="grade_details_id" value="{{ $grade_id }}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-sm btn-success">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{ route('coordinator_final_edit_of_grades') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Original Image:</label><br />
                                <img src="{{ asset('/storage/' . $grade_details->attachment->attachment) }}"
                                    alt="">
                            </div>

                            <div class="col-md-12">
                                <table class="table table-bordered table-hover table-sm">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Code</th>
                                            <th>Descriptive Title</th>
                                            <th>Units</th>
                                            <th>Section</th>
                                            <th>Midterm</th>
                                            <th>Final</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i < count($grades); $i++)
                                            <tr>
                                                <td>{{ $i + 1 }}
                                                    <input type="hidden" value="{{ $grades[$i]->id }}" name="id[]">
                                                </td>
                                                <td><input required type="text" class="form-control"
                                                        name="subject_code[{{ $grades[$i]->id }}]"
                                                        value="{{ str_replace('-', ' ', $grades[$i]->subject_code) }}">
                                                </td>
                                                <td><input required type="text" class="form-control"
                                                        name="subject_name[{{ $grades[$i]->id }}]"
                                                        value="{{ str_replace('-', ' ', $grades[$i]->subject_name) }}">
                                                </td>
                                                <td><input required type="text" class="form-control"
                                                        name="subject_units[{{ $grades[$i]->id }}]"
                                                        value="{{ $grades[$i]->subject_units }}"></td>
                                                <td><input required type="text" class="form-control"
                                                        name="section[{{ $grades[$i]->id }}]"
                                                        value="{{ $grades[$i]->section }}"></td>
                                                <td><input required type="text" class="form-control"
                                                        name="midterm[{{ $grades[$i]->id }}]"
                                                        value="{{ str_replace('-', ' ', $grades[$i]->midterm) }}"></td>
                                                <td><input required type="text" class="form-control"
                                                        name="final[{{ $grades[$i]->id }}]"
                                                        value="{{ str_replace('-', ' ', $grades[$i]->final) }}"></td>
                                                <td><input required type="text" class="form-control"
                                                        name="remarks[{{ $grades[$i]->id }}]"
                                                        value="{{ $grades[$i]->remarks }}"></td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="coordinator_id" value="{{ $coordinator->id }}">
                        <input type="hidden" name="grade_details_id" value="{{ $grade_id }}">



                        <button class="btn btn-sm float-right btn-success" style="margin-bottom: 10px;"
                            type="submit">Save</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
