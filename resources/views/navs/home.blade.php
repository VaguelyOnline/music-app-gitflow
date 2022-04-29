<div>

    <a href="/">Home</a>

    @if(Auth::user()->hasRole('client'))

        <a href="/">Client link 1</a>

    @endif

    @if(Auth::user()->hasRole('trainer'))

        @include('navs.trainer-links')

    @endif

    <a href="...">Logout</a>

</div>