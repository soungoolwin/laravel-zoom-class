<nav class="navbar navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">Creative Coder</a>
      <div class="d-flex">
        <a href="/#home" class="nav-link">Home</a>
        <a href="/#blogs" class="nav-link">Blogs</a>
        <a href="#subscribe" class="nav-link">Subscribe</a>
      
        @if (!request()->user())
        <a href="/login" class="nav-link">Login</a>
        <a href="/register" class="nav-link">Register</a>
        @else
        <form action="/logout" method="POST">
          @csrf
          <button type="submit" class="btn btn-link text-decoration-none">Logout</button>
      </form>
        @endif

        
      </div>
    </div>
  </nav>
  @if (session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
@endif