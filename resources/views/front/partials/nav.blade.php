<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark primary-color">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="/">
        <img src="{{ asset('img/logo.png') }}" alt="">
    </a>

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">

        <!-- Links -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
            </li>
            <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-book"></i>
                    Books</a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="/books">All Books</a>
                    <a class="dropdown-item" href="/books/create">Add a Book</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-pencil"></i>
                    Authors</a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="/authors">All Authors</a>
                    <a class="dropdown-item" href="/authors/create">Add an Author</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bookmark"></i>
                    Types(Genres)</a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="/types">All Types</a>
                    <a class="dropdown-item" href="/type/create">Add a Type</a>
                </div>
            </li>

        </ul>
        <!-- Links -->

        {{-- <form class="form-inline">
            <div class="md-form my-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            </div>
        </form> --}}

        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="" class="nav-link">Register</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    Login
                </a>
            </li>


        </ul>
    </div>
    <!-- Collapsible content -->

</nav>
<!--/.Navbar-->
