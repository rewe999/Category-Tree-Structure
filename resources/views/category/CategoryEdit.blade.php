@extends('layouts.category.categoryLayout')

@section('content')
    @auth()
        <div class="col-md-6 block-center">
            <h3>Edit Category - {{$category->title}}</h3>
            <form action="{{route('edit.category',$id)}}" method="POST">
                @csrf
                @method('PUT')

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                <div class="mb-3" {{ $errors->has('parent_id') ? 'has-error' : '' }}>
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$category->title}}">
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                </div>
                <div class="mb-3" {{ $errors->has('parent_id') ? 'has-error' : '' }}>
                    <label for="category margin-5" class="form-label">Change category</label>
                    <select class="form-control" aria-label="Default select example" name="parent_id">
                        <option value="0" name="id">default</option>

                        @foreach($allCategories as $category)
                            @if($category->id != $id)
                                <option value="{{$category->id}}" name="id">{{$category->title}}</option>
                            @endif
                        @endforeach
                    </select>
                    <span class="text-danger">{{ $errors->first('parent_id') }}</span>
                </div>

                <button type="submit" class="btn btn-primary center-block center">Edit</button>
            </form>

        </div>
    @endauth
@endsection
