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
                <div class="card-header">Request</div>
                <form action="{{ route('scholar_request_process') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Request Type</label>
                                <select name="request_type" class="form-control" id="request_type" required>
                                    <option value="" default>Select</option>
                                    <option value="Transfer School">Transfer School</option>
                                    <option value="Transfer Course">Transfer Course</option>
                                </select>
                            </div>
                            <div class="col-md-4" style="display: none" id="show_school">
                                <label for="">School</label>
                                <select name="school" class="form-control">
                                    <option value="" default>Select</option>
                                    @foreach ($school as $data)
                                        <option value="{{ $data->school }}">{{ $data->school }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4" style="display: none" id="show_course">
                                <label for="">Course</label>
                                <select name="course" class="form-control">
                                    <option value="" default>Select</option>
                                    @foreach ($course as $data)
                                        <option value="{{ $data->course }}">{{ $data->course }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Academic Year</label>
                                <select name="year" class="form-control" required>
                                    <option value="" default>Select</option>
                                    @foreach ($year as $data)
                                        <option value="{{ $data->school_year }}">{{ $data->school_year }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Semester</label>
                                <select name="semester" class="form-control" required>
                                    <option value="" default>Select</option>
                                    <option value="1st Semester">1st Semester</option>
                                    <option value="2nd Semester">2nd Semester</option>
                                    <option value="Summer">Summer</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Reason/Attachment</label>
                                <input type="file" name="file" required class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="scholar_id" value="{{ $id }}">
                        <button class="btn btn-sm btn-success float-right" style="margin-bottom: 10px;">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#request_type").change(function() {
            if ($(this).val() == 'Transfer School') {
                $('#show_school').show();
                $('#show_course').hide();
            } else {
                $('#show_course').show();
                $('#show_school').hide();
            }
        });
    </script>


@endsection
