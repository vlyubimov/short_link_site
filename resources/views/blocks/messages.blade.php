@if(count($errors) > 0)
    @foreach($errors->all() as $er)
        <div class="error-mess">
            {{ $er }}
        </div>

    @endforeach

@endif


@if(session('success'))
    <div class="success-mess">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="error-mess">
        {{ session('error') }}
    </div>
@endif
