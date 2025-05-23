@extends('admin.master')


@section('title')
    Add Category Page
@endsection



@section('body')

    <h1 class="text-center text-success">{{ session('message')}}</h1>

    <div class="row">

        <div class="col-lg-10 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title mb-4">Add Category Form</h1>

                    <form action="{{ route('category.create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Category Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" id="horizontal-firstname-input">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="horizontal-email-input" class="col-sm-3 col-form-label">Category Description</label>
                                <div class="col-sm-9">
                                    <textarea name="description" class="form-control" id="horizontal-email-input"></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="horizontal-password-input" class="col-sm-3 col-form-label">Category Image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="image" class="form-control-file" id="horizontal-password-input">
                                </div>
                            </div>

                            <div class="form-group row justify-content-end">
                                <div class="col-sm-9">
                                    <div>
                                        <button type="submit" class="btn btn-primary w-md">Create New Category</button>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- end row -->



@endsection

