<form action="{{ route('scholar_subject_process') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <label for="">Attachment</label>
            <input type="file" class="form-control" required name="attachment" id="attachment">
        </div>
        <div class="col-md-4">
            <label for="">School Year</label>
            <input type="text" class="form-control" name="school_year" required>
        </div>
        <div class="col-md-4">
            <label for="">Semester</label>
            <select name="semester" class="form-control" required>
                <option value="" default>Select</option>
                <option value="1st Semester">1st Semester</option>
                <option value="2nd Semester">2nd Semester</option>
            </select>
        </div>
    </div>
    <br />
    @for ($i = 0; $i < $number_of_subjects; $i++)
        <p style="font-weight: bold;">Subject #{{ $i + 1 }}</p>
        <div class="row">
            <div class="col-md-3">
                <label for="">Subject Code</label>
                <input type="text" class="form-control" name="subject_code" required>
            </div>
            <div class="col-md-3">
                <label for="">Subject Name</label>
                <input type="text" class="form-control" name="subject_name" required>
            </div>
            <div class="col-md-3">
                <label for="">Subject Units</label>
                <input type="text" class="form-control" name="subject_units" required>
            </div>
            <div class="col-md-3">
                <label for="">Subject Grades</label>
                <input type="text" class="form-control" name="subject_grades" required>
            </div>
        </div>
    @endfor

    <br />
    <input type="hidden" value="{{ $id }}" name="scholar_id">
    <input type="hidden" value="{{ $number_of_subjects }}" name="number_of_subjects">
    <button class="btn btn-success float-right btn-sm" type="submit">Submit</button>

</form>
