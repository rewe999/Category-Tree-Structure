@auth()
    <div class="col-md-6">
        <h3 class="text-center">Add New Category</h3>
        <form action="{{route('add.category',$id)}}" method="POST">
            @csrf

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            <div class="mb-3" {{ $errors->has('parent_id') ? 'has-error' : '' }}>
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title">
                <span class="text-danger">{{ $errors->first('title') }}</span>
            </div>
            <div class="mb-3" {{ $errors->has('parent_id') ? 'has-error' : '' }}>
                <label for="category margin-5" class="form-label">Category</label>
                <select class="form-control" name="parent_id" id="category">
                    <option value="0" name="id">default</option>

                    @foreach($allCategories as $category)
                        <option value="{{$category->id}}" name="id">{{$category->title}}</option>
                    @endforeach
                </select>
                <span class="text-danger">{{ $errors->first('parent_id') }}</span>
            </div>

            <button type="submit" class="btn btn-success center-block mt-2 center">Add</button>
        </form>

        @if($id > 0)
            <button class="btn btn-primary white center-block center"><a href="{{route('edit.view',$id)}}" class="white">Edit</a></button>
            <form action="{{route('delete.category',$id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger center-block center">Delete</button>
            </form>
        @endif
    </div>
@endauth

@guest()
    <div class="col-md-6">
        <div class="mb-3">
            @include('auth.login')
        </div>
    </div>
@endguest
