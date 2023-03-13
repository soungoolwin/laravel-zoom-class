@props(['RandomBlogs'])

<section class="blogs_you_may_like" id="blogs">
    <div class="container">
      <h3 class="text-center my-4 fw-bold">Blogs You May Like</h3>
      <div class="row text-center">
        @foreach ($RandomBlogs as $RandomBlog)
        <div class="col-md-4 mb-4">
            <div class="card">
              <img
                src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <h3 class="card-title">{{$RandomBlog->title}}</h3>
                <p class="fs-6 text-secondary">
                  {{$RandomBlog->author->name}}
                  <span> - {{$RandomBlog->created_at->diffForHumans()}}</span>
                </p>
                <div class="tags my-3">
                  <span class="badge bg-primary">{{$RandomBlog->category->name}}</span>
                </div>
                <p class="card-text">
                  {{$RandomBlog->body}}
                </p>
                <a href="/blogs/{{$RandomBlog->slug}}" class="btn btn-primary">Read More</a>
              </div>
            </div>
          </div>
        @endforeach

      </div>
    </div>
  </section>