<div id='alert-box' class="alert alert-danger"
        {!! $errors->any() ? '' : "style='display: none'" !!}
>
    <b>Ops...</b>
    <ul>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        @endif
    </ul>
</div>

@if (Session::has('flash_message'))
    <div class="alert alert-info" id="teste">
        {{ Session::get('flash_message') }}
    </div>
@endif
@if (Session::has('flash_error'))
    <div class="alert alert-danger" id="teste">
        {{ Session::get('flash_error') }}
    </div>
@endif