<div class="content container-fluid col-md-9" style="padding-top: 10px">
    @if(Session::has('flash_message'))
        <div class="alert-success">
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        </div>
    @endif
    @if(Session::has('alert-warning'))
        <div class="alert-warning">
            <div class="alert alert-warning">
                {{ Session::get('alert-warning') }}
            </div>
        </div>
    @endif
    @if((count( $errors ) > 0))
        <div class="alert alert-danger">
            <strong>Whoops! </strong> Hemos detectado un problema<br>
            <ul class="">
                @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    @yield('title')
    <div class="container-fluid">
        @yield('content')
    </div>
</div>