<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div class="card p-3 my-5 shadow-lg">
                    <h3 class="text-primary text-center">Register Form</h3>
                    <form method="POST" action="/register">
                        @csrf
                        <div class="form-group">
                            <label for="usernameInput">Username</label>
                            <input name="username" type="text" value="{{ old('username') }} class="form-control" id="usernameInput"
                                aria-describedby="emailHelp" placeholder="Enter username">
                            @error('username')
                                <div class="alert alert-danger"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nameInput">Name</label>
                            <input name="name" type="text" value="{{ old('name') }} class="form-control" id="nameInput"
                                aria-describedby="emailHelp" placeholder="Enter name">
                            @error('name')
                                <div class="alert alert-danger"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input name="email" type="email" value="{{ old('email') }} class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter email">
                            @error('email')
                                <div class="alert alert-danger"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                                placeholder="Password">
                            @error('password')
                                <div class="alert alert-danger"> {{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
