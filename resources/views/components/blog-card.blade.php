@props(['blog'])
<div class="card">
    <img
      src="/storage/{{$blog->photo}}"
      class="card-img-top"
      alt="..."
    />
    <div class="card-body">
      <h3 class="card-title">{{$blog->title}}</h3>
      <a href="/?author={{$blog->author->username}}">
        <p class="fs-6 text-secondary">
          {{$blog->author->name}}
          <span> - {{$blog->created_at->diffForHumans()}}</span>
        </p></a>
      <div class="tags my-3">
        <a href="/?category={{$blog->category->slug}}"><span class="badge bg-primary">{{$blog->category->name}}</span></a>
      </div>
      <p class="card-text">
        {{$blog->slug}}
      </p>
      <a href="/blogs/{{$blog->slug}}" class="btn btn-primary">Read More</a>
    </div>
  </div>