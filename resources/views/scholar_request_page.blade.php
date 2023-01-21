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
                <div class="card-body">
                    <a href="{{ url('scholar_request',['id' => $id]) }}" class="btn btn-sm float-right btn-info">+ Request</a>
                    <br /><br />
                    <table class="table table-bordered table-hover table-sm" id="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Status</th>
                                <th>Request Name</th>
                                <th>Request Details</th>
                                <th>Type</th>
                                <th>Request Date</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($request) != 0)
                                @for ($i = 0; $i < count($request); $i++)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $request[$i]->status }}</td>
                                        <td>{{ $request[$i]->request_name }}</td>
                                        <td>{{ $request[$i]->request_details }}</td>
                                        <td>{{ $request[$i]->request_type }}</td>
                                        <td>{{ $request[$i]->request_date }}</td>
                                        <td>{{ $request[$i]->request_date }}</td>
                                       
                                    </tr>
                                @endfor
                            @endif
                        </tbody>
                    </table>
                </div>
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

        //         $("#scholar_subject_proceed").on('submit', (function(e) {
        //             e.preventDefault();
        //             $.ajax({
        //                 url: "/scholar_subject_proceed",
        //                 type: "POST",
        //                 data: new FormData(this),
        //                 contentType: false,
        //                 cache: false,
        //                 processData: false,
        //                 success: function(data) {
        //                     $('.loading').hide();
        //                     $('#show_number_of_subjects').html(data);
        //                 },
        //             });
        //         }));
    </script>


@endsection
