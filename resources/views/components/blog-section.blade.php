@props(['blogs', 'categories','currentCategory'=>null])
<section class="container text-center" id="blogs">
    <h1 class="display-5 fw-bold mb-4">Blogs</h1>
    <div class="dropdown">
      <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        {{isset($currentCategory) ? $currentCategory : 'Filter by Category'}}
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        @foreach ($categories as $category)
        <li><a class="dropdown-item" href="/?category={{$category->slug}}{{request('search') ? "&search=".request('search') : ''}}{{request('author') ? "&author=".request('author') : ''}}">{{$category->name}}</a></li> 
      @endforeach
      </ul>
    </div>
    <form action="/" class="my-3" method="GET">
      <div class="input-group mb-3">
        @if (request('category')) 
        <input
        type="hidden"
        name="category"
        value="{{request('category')}}"
      />
        @endif

        @if (request('author')) 
        <input
        type="hidden"
        name="author"
        value="{{request('author')}}"
      />
        @endif
        <input
          type="text"
          name="search"
          value="{{request('search')}}"
          autocomplete="false"
          class="form-control"
          placeholder="Search Blogs..."
        />
        <button
          class="input-group-text bg-primary text-light"
          id="basic-addon2"
          type="submit"
        >
          Search
        </button>
      </div>
    </form>
    <div class="row">
      @foreach ($blogs as $blog)
      <div class="col-md-4 mb-4">
        <x-blog-card :blog='$blog'/>
      </div>
      @endforeach
      {{$blogs->links()}}

    </div>
  </section>