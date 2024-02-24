<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Hotel Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('assets/styles/style.css')}}" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<div id="wrapper">
    <nav class="navbar header-top fixed-top navbar-expand-lg  navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">LOGO</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav side-nav" >
                    <li class="nav-item">
                        <a class="nav-link" style="margin-left: 20px;" href="{{route('admin.dashboard')}}">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.admins.index')}}" style="margin-left: 20px;">Admins</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.hotels.index')}}" style="margin-left: 20px;">Hotels</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.rooms.index')}}" style="margin-left: 20px;">Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.bookings.index')}}" style="margin-left: 20px;">Bookings</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-md-auto d-md-flex">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    @if(!auth('admin')->check())

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.login')}}">login
                            </a>
                        </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a class="nav-link  dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{auth()->user()->name??"User"}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <form method="POST" action="{{ route('admin.logout') }}">
                                @csrf

                                <x-dropdown-link class="alert-link "
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>

                    </li>


                </ul>
            </div>
        </div>
    </nav>
    {{ $slot }}
</div>
<script type="text/javascript">

</script>
</body>
</html>
