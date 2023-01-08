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
                <div class="card-header">Subject (+)</div>
                <div class="card-body">
                    <form id="scholar_subject_proceed">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Number of subjects</label>
                                <input type="number" class="form-control" name="number_of_subjects" id="number_of_subjects"
                                    required>
                            </div>
                            <div class="col-md-12">
                                <br />
                                <input type="hidden" value="{{ $id }}" name="scholar_id">
                                <button class="btn btn-info float-right" type="submit">Proceed</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="show_number_of_subjects"></div>
                        </div>
                    </div>
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

        $("#scholar_subject_proceed").on('submit', (function(e) {
            e.preventDefault();
            $.ajax({
                url: "/scholar_subject_proceed",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $('.loading').hide();
                    $('#show_number_of_subjects').html(data);
                },
            });
        }));
    </script>


@endsection
