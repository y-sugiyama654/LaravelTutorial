@if ($errors->any())
    <div id="error_explanation">
        <div class="alert alert-danger">
            The form contains {{ $errors->count() . Str::plural('error', $errors->count()) }}.
        </div>
        <ul>
            @foreach ($errors->all() as $error)
                <li style="list-style: none;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
