



<div class="m-2">

    @if (session('flash text'))
        <div class="alert alert-danger">
            {{session('flash text')}}
        </div>

    @endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    </div>
