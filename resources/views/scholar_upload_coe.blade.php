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
                <div class="card-header" style="font-weight: bold;">Upload Certificate of Enrollment</div>
                <form action="{{ route('scholar_upload_coe_process') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Certificate of Enrollment File</label>
                            <input type="file" class="form-control" required name="file">
                            <input type="hidden" value="{{ $scholar->id }}" name="id">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button style="margin-bottom:10px;" class="btn btn-sm float-right btn-success">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
