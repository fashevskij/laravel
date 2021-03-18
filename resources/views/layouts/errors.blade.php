



<div class="m-2">

    @if (session('flashText'))
        <div class="alert alert-danger">
            {{session('flashText')}}
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
