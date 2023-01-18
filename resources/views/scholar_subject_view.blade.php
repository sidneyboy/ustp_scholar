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
                    {{ Str::ucfirst($grade_details->scholar->last_name) }}'s Grades</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Original Image:</label>
                            {{-- <textarea name="" class="form-control" id="" cols="30" rows="10">{{ str_replace('-','     ',$grade_details->original_text_from_image) }}</textarea> --}}
                            <img src="{{ asset('/storage/' . $grade_details->attachment->attachment) }}" alt="">
                        </div>
                        <div class="col-md-12">
                            <label for="">Data Extracted From text:</label>
                            <textarea name="" class="form-control" id="" cols="30" rows="10">{{ str_replace('-', '     ', $grade_details->original_text_from_image) }}</textarea>
                            {{-- <img src="{{ asset('/storage/'. $grade_details->attachment->attachment) }}" alt=""> --}}
                        </div>
                        @foreach ($grades as $data)
                            <div class="col-md-2"></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
