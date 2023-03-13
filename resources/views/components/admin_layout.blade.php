<x-layout>
    <div class="container">
        <div class="row my-5">
            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item"><a href="/admin/blogs">Blogs</a></li>
                    <li class="list-group-item"><a href="/admin/blogs/create">Blog Create</a></li>
                </ul>
            </div>
            <div class="col-md-8">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-layout>
