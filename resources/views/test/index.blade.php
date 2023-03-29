@extends('main')

@section('content')
Hi
<hr>
<div class="col-md-4">
    <label for="datePicker" class="form-label">Username</label>
    <div class="input-group has-validation">
        <input type="text" class="form-control" id="datePicker" aria-describedby="inputGroupPrepend" required placeholder="yyyy-mm-dd">
        {{-- <span class="input-group-text" id="inputGroupPrepend">
            <i class="bi bi-calendar3"></i>
        </span> --}}
        <div class="invalid-feedback">
            Please choose a username.
        </div>
    </div>
</div>

<script type="text/javascript">
    $( function() {
        $( "#datePicker" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd',
            // showOn: "button",
            // buttonImage: "img/calendar.gif",
            // buttonImageOnly: true,
            // buttonText: "Select date",
        });
    });
</script>
@endsection
