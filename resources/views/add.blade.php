@extends('template')

@section('body')

<div class="page-content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add New Article</h4>
            </div>
            <div class="card-body">
                <form id="form-add" autocomplete="off">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label class="form-label" for="title">Title</label>
                                <input type="text" class="form-control" id="title" placeholder="Title" required>
                                <span class="form-text text-danger mb-0"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label class="form-label" for="title">Category</label>
                                <input type="text" class="form-control" id="category" placeholder="Category" required>
                                <span class="form-text text-danger mb-0"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label class="form-label" for="title">Content</label>
                                <textarea class="form-control" id="content" placeholder="Content" required></textarea>
                                <span class="form-text text-danger mb-0"></span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 text-center">
                        <button class="btn btn-warning mx-1" id="draft">Draft</button>
                        <button class="btn btn-primary mx-1" id="publish">Publish</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
