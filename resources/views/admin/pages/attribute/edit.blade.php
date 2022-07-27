@extends('admin.layouts.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    Manage Attribute
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.attributes.update' , $attributes->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        @include('admin.partials.messages')

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $attributes->title }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="" cols="20" rows="20" class="form-control" id="description">{{ $attributes->description }}</textarea>
                        </div>

                       
                        <button type="submit" class="btn btn-primary">Updated Attribute</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!-- main-panel ends -->
@endsection
