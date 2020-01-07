<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{route('view')}}"> <i class="fa fa-address-book" aria-hidden="true"></i> FindMyExpert</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{route('home')}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('create')}}">Add New</a>
            </li>
        </ul>
        <form class="form-inline">
            <button class="btn btn-outline-light" href="{{route('register')}}" type="button">Register</button>
        </form>
        <form class="form-inline">
            <button class="btn btn-outline-light" href="{{route('login')}}" type="button">Login</button>
        </form>
    </div>
</nav>