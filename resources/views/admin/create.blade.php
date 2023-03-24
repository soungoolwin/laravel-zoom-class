<x-admin_layout>
    <form action="/admin/blogs/create" method="POST" enctype="multipart/form-data">
        @csrf
        <x-form.title_slug-input type='title' :old="old('title')" />
        <x-form.title_slug-input type='slug' :old="old('slug')" />
        <x-form.category-dropdown :categories='$categories' />
        <x-form.photo-upload />
        <x-form.textarea :old="old('body')" />
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-admin_layout>
