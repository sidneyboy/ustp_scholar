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
                <div class="card-header" style="font-weight: bold">Scholar Pending COE</div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table class="table table-bordered table-hover table-sm" id="table">
                            <thead>
                                <tr>
                                    <th>Scholar</th>
                                    <th>Submitted Date</th>
                                    <th>Status</th>
                                    <th>COE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attachments as $attachment)
                                    @if ($attachment->image_type == 'coe')
                                        <tr>
                                            <td>{{ $attachment->scholar->first_name }} {{ $attachment->scholar->last_name }}
                                            </td>
                                            <td>{{ date('F j, Y', strtotime($attachment->created_at)) }}
                                            </td>
                                            <td><a href="{{ url('coordinator_scholar_coe_process',[
                                                  'id' => $coordinator->id,
                                                  'attachment_id' => $attachment->id,
                                                  'scholar_id' => $attachment->scholar->id,
                                            ]) }}" class="btn btn-sm btn-block btn-success">Validate</a></td>
                                            <td><a href="{{ asset('/storage/' . $attachment->attachment) }}"
                                                    target="_blank">View
                                                    COE</a>
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
    </div>

@endsection
