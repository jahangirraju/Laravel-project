@extends('admin.layouts.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    Edit Category
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.categories.update', $category->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        @include('admin.partials.messages')

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                value="{{ $category->name }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description(optional)</label>
                            <textarea name="description" id="" cols="20" rows="20" class="form-control" id="description">{!! $category->description !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="parent_category">Parent Category(optional)</label>
                            <select clase="form-control" name="parent_id">
                                <option value="">Please select primary category</option>
                                @foreach ($main_category as $cat)
                                    <option value="{{ $cat->id }}" {{ $cat->id == $category->parent_id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="image">Category old Image</label><br>
                            <img src="{!! asset('images/categories' . $category->image) !!}" width="100">
                            <br>
                            <label for="image">Category new Image</label>

                            <input type="file" class="form-control" name="image" id="image">
                        </div>

                        <button type="submit" class="btn btn-primary">updated Category</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!-- main-panel ends -->
@endsection
