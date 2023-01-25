@extends('layouts.admin')

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
                <div class="card-header" style="font-weight:bold">Scholar Request</div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table class="table table-bordered table-hover table-sm" id="table">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Request Name</th>
                                    <th>Request Details</th>
                                    <th>Request Type</th>
                                    <th>Request Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($scholar_request as $data)
                                    <tr>
                                        <td>{{ $data->scholar->first_name }} {{ $data->scholar->last_name }}</td>
                                        <td>{{ $data->request_name }}</td>
                                        <td>{{ $data->request_details }}</td>
                                        <td>{{ $data->request_type }}</td>
                                        <td>{{ $data->request_date }}</td>
                                        <td>
                                            @if ($data->status == 'Approved')
                                                {{ $data->status }}
                                            @else
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-sm btn-primary btn-block"
                                                    data-toggle="modal"
                                                    data-target="#exampleModalstatus{{ $data->id }}">
                                                    Change Status
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModalstatus{{ $data->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Scholar
                                                                    Request
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="{{ route('admin_scholar_request_process') }}"
                                                                method="post">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <label for="">Status</label>
                                                                    <select name="status" class="form-control" required>
                                                                        <option value="" default>Select</option>
                                                                        <option value="Approved">Approve</option>
                                                                        <option value="Rejected">Reject</option>
                                                                    </select>

                                                                    <input type="hidden" value="{{ $data->id }}"
                                                                        name="request_id">

                                                                    <input type="hidden" value="{{ $data->scholar->id }}" name="scholar_id">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-sm btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
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
