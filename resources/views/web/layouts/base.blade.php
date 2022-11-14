<!DOCTYPE html>
<html lang="en">

@include('web.layouts.header')

<body class="g-sidenav-show  bg-gray-100">

@include('web.layouts.sidenav')
    
    <main class="main-content ">

        @include('web.layouts.navbar')

        <div class="">
            @if(Session::has('success'))

            <div class="alert alert-success text-center" id="alert">
                <strong>Success:</strong> {{Session::get('success')}}
            </div>
        
            @elseif(session('error'))
                <div class="alert alert-danger text-center" id="alert">
                    
                    <strong>Error:</strong>{{Session::get('error')}}
                </div>
            @endif
            @yield('content')
            
            @include('web.layouts.footer')
        </div>
    </main>

    @include('web.layouts.scripts')
</body>

</html>