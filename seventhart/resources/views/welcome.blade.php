@extends ('layouts.layout')

@section('content')

<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/contracts/create') }}">Enter new Contract</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <img src="/img/SeventhArtLogo.png" width="600" height="300">
        <div class="title m-b-md">
            <p><h2>Contract Entry System</h2></p>
        </div>
         
    </div>
</div>
@endsection

