@extends('layouts.app')
@section('content')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Manage Book</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form   method="post" id="formData">
                        @csrf
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title"  value="{{ old('title') }}" class="form-control" placeholder="Title Post">
                            <span class="text-danger error-text title_error"  style="font-size: 13px"></span>
                        </div>
                        <div class="form-group">
                            <label for="">Code</label>
                            <input type="text" name="code"  value="{{ old('code') }}" class="form-control" placeholder="Code">
                            <span class="text-danger error-text code_error"  style="font-size: 13px"></span>
                        </div>
                        <div class="form-group">
                            <label for="">Author</label>
                            <textarea name="author" value="{{ old('author') }}" class="form-control" placeholder="Author"></textarea>
                            <span class="text-danger error-text author_error"  style="font-size: 13px"></span>
                        </div>
                        <button type="submit" id="btn-create" class="btn btn-success btn-block">Save Change</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <section class="container">
        <h4 class="text-center mt-4">Laravel AJAX CRUD Real Time</h4>
        <div class="card mt-5">
            <div class="card-header">
                <h5>Data Post</h5>
            </div>
            <div class="card-body">
                <button id="openModal" data-action="{{ route('book.store') }}" class="btn btn-success mb-3">+ Create Book</button>
                <div class="table-responsive">
                    <table class="table table-striped table-inverse table-responsive d-table">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Code</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="tbody">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('addon-script')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('/js/crud.js') }}"></script>
@endpush
