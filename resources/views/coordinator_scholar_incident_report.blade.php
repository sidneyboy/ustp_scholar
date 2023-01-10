@extends('layouts.coordinator')

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
                <div class="card-header">File Incident Report</div>
                <form action="{{ route('coordinator_scholar_incident_report_process') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Scholar</label>
                                <select name="scholar_id" class="form-control" required>
                                    <option value="" default>Select</option>
                                    @foreach ($scholar as $data)
                                        <option value="{{ $data->id }}">{{ $data->first_name }} {{ $data->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="">Report Type</label>
                                <input type="text" class="form-control" name="report_type" required>
                            </div>
                            <div class="col-md-12">
                                <label for="">Action Taken</label>
                                <textarea class="form-control" name="action_taken" required></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="">Remarks</label>
                                <input type="text" class="form-control" name="remarks" required>
                            </div>
                            {{-- <div class="col-md-6">
                                <label for="">Attachment</label>
                                <input type="text" class="form-control" name="remarks" required>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" value="{{ $id }}" name="coordinator_id">
                        <button class="btn btn-success float-right btn-sm" style="margin-bottom: 5px">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
