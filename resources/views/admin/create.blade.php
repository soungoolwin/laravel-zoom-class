<x-admin_layout>
    <form action="{{ basename(request()->path()) === 'edit' ? '/admin/blogs/' . $blog->id . '/edit' : '/admin/blogs/create' }}" method="POST" enctype="multipart/form-data">
      @csrf
      @if (basename(request()->path()) === 'edit')
          @method('PATCH')
      @endif
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" value="{{ $blog ? $blog->title : old('title')}}" id="title" name="title" placeholder="Enter Title">
            @error('title')
                <div class="alert alert-danger"> {{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" value="{{ $blog ? $blog->slug : old('slug')}}" name="slug" id="slug" placeholder="Slug">
            @error('slug')
                <div class="alert alert-danger"> {{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <select name="category_id" class="form-select" aria-label="Default select example">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" id="category_id">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
          <div class="mb-3">
            <label for="formFile" class="form-label">Blog Photo</label>
            <input class="form-control" value="{{ old('photo') }}" name="photo" type="file" id="formFile">
          </div>
        </div>

        <div class="form-group">
            <label for="body">Body</label>
            <input type="textarea" value="{{ $blog ? $blog->body : old('body')}}" class="form-control" name="body" id="body" placeholder="Body">
            @error('body')
                <div class="alert alert-danger"> {{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-admin_layout>
