@extends('admin.layouts.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    Manage Shelf
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.shelfs.update' , $shelfs->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        @include('admin.partials.messages')

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $shelfs->title }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="" cols="10" rows="10" class="form-control" id="description">{{ $shelfs->description }}</textarea>
                        </div>

                       
                        <button type="submit" class="btn btn-primary">Updated shelfs</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!-- main-panel ends -->
@endsection
