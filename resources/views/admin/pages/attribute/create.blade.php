@extends('admin.layouts.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    Create Attribute
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.attributes.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        @include('admin.partials.messages')

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="" cols="20" rows="20" class="form-control" id="description"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Attribute Create</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!-- main-panel ends -->
@endsection
