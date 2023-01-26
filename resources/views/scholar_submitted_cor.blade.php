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
                <div class="card-header">Submitted COR</div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-sm" id="table">
                        <thead>
                            <tr>
                                <th>Date Submitted</th>
                                <th>Status</th>
                                <th>Coe</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($scholar->attachments as $attachment)
                                @if ($attachment->image_type == 'coe')
                                    <tr>

                                        <td>{{ date('F j, Y', strtotime($attachment->created_at)) }}
                                        </td>
                                        <td>{{ $attachment->status }}</td>
                                        <td><a href="{{ asset('/storage/' . $attachment->attachment) }}"
                                                target="_blank">View COE</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
