@props(['blog','comments'])

<section class="container">
    <div class="col-md-8  mx-auto">
        @auth
            <form method="POST" action="/{{ $blog->slug }}/comment">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Discuss your thoughts</label>
                    <textarea name="body" class="form-control my-3" id="exampleFormControlTextarea1" rows="3"></textarea>
                    @error('body')
                        <div class="alert alert-danger"> {{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
            <div class="container">
                <div class="col-md-12 text-center">
                    <form action="/blogs/{{$blog->slug}}/subscribe" method="POST">
                        @csrf
                        @if (auth()->user()->isSubscribed($blog))
                        <button type="submit" class="btn btn-warning">Unsubscribe</button>
                        @else
                            
                        <button type="submit" class="btn btn-success">Subscribe</button>
                        @endif
                    </form>
                </div>
            </div>
        @endauth


        @if (!request()->user())
            <p class="my-3"><a href="{{ route('login') }}?redirect={{ urlencode(Request::url()) }}">Log in</a> to
                participate in the discission.</p>
        @endif
        <h5 class="my-3 text-secondary">Comments ({{count($comments)}})</h5>
        @foreach ($comments as $comment)
            <x-single-comment :comment='$comment' />
        @endforeach
        {{$comments->links()}}
    </div>
</section>
