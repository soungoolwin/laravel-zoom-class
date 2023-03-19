<x-admin_layout>
    <form action="/admin/blogs/{{$blog->id}}/edit" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <x-form.title_slug-input type='title' :old="old('title')" :original="$blog->title"/>
        <x-form.title_slug-input type='slug' :old="old('slug')" :original="$blog->slug"/>
        <x-form.category-dropdown :categories='$categories' />
        <x-form.photo-upload/>
        <x-form.textarea :old="old('body')" :original="$blog->body"/>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-admin_layout>