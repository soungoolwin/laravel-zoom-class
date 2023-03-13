
    <x-layout>

        <div class="container">
            <div class="row">
              <div class="col-md-6 mx-auto text-center">
                <img
                  src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
                  class="card-img-top"
                  alt="..."
                />
                <h3 class="my-3">{{$blog->title}}</h3>
                <p class="lh-md">
                  {{$blog->body}}
                </p>
              </div>
            </div>
          </div>
          <x-comments :blog='$blog' :comments='$blog->comments()->paginate(5)'/>
          <x-blogs_you_may_like :RandomBlogs='$RandomBlogs'/>
          <x-subscribe/>
    </x-layout>