<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{route('home.home')}}">Anna KeyPedia Shop</a>
        <div class="form-inline " id="navbarSupportedContent">
            <ul class="nav navbar-nav navbar-right me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link text-dark" aria-current="page" href="{{route('home.home')}}">Home</a></li>
                <li class="nav-item"><a class="nav-link text-dark" href="{{route('createCategory')}}"> Categorys</a></li>
                <li class="nav-item"><a class="nav-link text-dark" href="{{route('listProduct')}}"> Product</a></li>
                <li class="nav-item"><a class="nav-link text-dark" href="{{route('createProduct')}}">Create Product</a></li>

            </ul>
           
        </div>
    </div>
</nav>