@extends('layouts.admin')

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
                <div class="card-header">Add School</div>
                <form action="{{ route('add_course_process') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <input type="text" class="form-control" required name="course">
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm float-right btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
