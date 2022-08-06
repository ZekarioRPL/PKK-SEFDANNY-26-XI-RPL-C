<nav class="navbar navbar-expand-lg fixed-top trans-navigation">
    <div class="container">
        <a class="navbar-brand" href="index.html">
            <img src="images/12.png" alt="" class="img-fluid b-logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav"
            aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="fa fa-bars"></i>
            </span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="mainNav">
            <ul class="navbar-nav ">

                <li class="nav-item">
                    <a class="nav-link smoth-scroll" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link smoth-scroll" href="/tayangsekarang">Tayang Sekarang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link smoth-scroll" href="/segerahadir">Segera Hadir</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link smoth-scroll" href="/bioskop">Bioskop</a>
                </li>
                
                @if (auth()->user())
                <li class="nav-item">
                    <a class="nav-link smoth-scroll" href="/history">History</a>
                </li>
                @can('admin')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarWelcome" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarWelcome">
                        <a class="dropdown-item " href="/dashboard">
                            Dashboard
                        </a>
                        <a class="row justify-content-center m-2">
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="nav-link px-3 bg-dark text-light ml-5"
                                    style="border : 0px">Sign out</button>
                            </form>
                        </a>
                    </div>
                </li>
                @endcan
                @can('user')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarWelcome" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarWelcome">
                        <a class="row justify-content-center m-2">
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="nav-link px-3 bg-dark text-light ml-5"
                                    style="border : 0px">Sign out</button>
                            </form>
                        </a>
                    </div>
                </li>
                @endcan
                @else
                <li class="nav-item">
                    <a class="nav-link smoth-scroll" href="/login">Login</a>
                </li>
                @endif

            </ul>
        </div>
    </div>
</nav>