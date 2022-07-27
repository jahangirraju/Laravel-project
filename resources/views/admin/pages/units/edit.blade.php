@extends('admin.layouts.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    Manage units
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.units.update' , $units->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        @include('admin.partials.messages')

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $units->title }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="" cols="20" rows="20" class="form-control" id="description">{{ $units->description }}</textarea>
                        </div>

                       
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!-- main-panel ends -->
@endsection
