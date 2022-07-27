@extends('admin.layouts.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
               
                    <div class="card-header">
                        Manage Attribute
                        <div class="d-flex flex-row-reverse">
                            <a href="{{ route('admin.attributes.create') }}">create</a>
                        </div>
                    </div>
                    
                    
                <div class="card-body">
                    <table class="table table-hover table-striped">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>

                        @foreach ($attributes as $attribute)
                            <tr>
                                <td>#</td>
                                <td>{{ $attribute->title }}</td>
                                <td>{{ $attribute->description }}</td>
                                {{-- {{ route('admin.units.destroy', $unit->id) }} --}}
                                <td>
                                    <a href="{{ route('admin.attributes.edit', $attribute->id) }}" class="btn btn-success">Edit</a>
                                    <a href="#deleteModal-{{ $attribute->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal-{{ $attribute->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                Delete Unit
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <mark>{{ $attribute->title }}</mark> will be deleted. Are you sure to delete ?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('admin.attributes.destroy', $attribute->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                <button type="submit" class="btn btn-primary">Yes, Delete</a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    </table>
                </div>
            </div>

        </div>
    </div>
    <!-- main-panel ends -->
@endsection
