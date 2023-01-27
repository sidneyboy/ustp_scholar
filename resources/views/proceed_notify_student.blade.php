<form action="{{ route('notify_student_process') }}" method="post">
    @csrf
    <div class="card">
        <div class="card-header">Notify Student</div>
        <div class="card-body">
            <label for="">Message</label>
            <textarea name="message" class="form-control" cols="30" rows="5"></textarea>

            <table class="table table-bordered table-hover table-sm">
                <thead>
                    <tr>
                        <th>Scholar</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($scholar as $data)
                        <tr>
                            <td>{{ $data->first_name }} {{ $data->last_name }} </td>
                            <td>
                              {{ $data->status }}
                              <input type="hidden" value="{{ $data->id }}" name="scholar_id[]">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <button class="btn btn-success btn-sm float-right" type="submit">Notify Student</button>
        </div>
    </div>
</form>
