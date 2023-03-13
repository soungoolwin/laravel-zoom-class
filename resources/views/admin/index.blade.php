<x-admin_layout>

    <h2 class="text-center">All Blogs</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>   
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <th scope="row">{{ $blog->id }}</th>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->category->name }}</td>
                    <td>
                        <form action="/admin/blogs/{{$blog->id}}" method="POST">
                          @csrf
                          @method('DELETE')
                            <button type="submit" class="btn btn-warning">Delete</button>
                        </form>
                        <form action="/admin/blogs/{{$blog->id}}/edit" method="GET">
                          @csrf
                          <button type="submit" class="btn btn-danger">Edit</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $blogs->links() }}
    </div>
</x-admin_layout>
