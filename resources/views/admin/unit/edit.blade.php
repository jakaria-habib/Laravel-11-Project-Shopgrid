
@extends('admin.master')


@section('title')
    Edit Unit Page
@endsection



@section('body')


    <h1 class="text-center text-success">{{ session('message')}}</h1>

    <div class="row">

        <div class="col-lg-10 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title mb-4">Edit Brand Form</h1>

                    <form action="{{ route('unit.update',[ 'id' =>$unit->id ]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Unit Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" value="{{ $unit->name }}" class="form-control" id="horizontal-firstname-input">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Unit Code</label>
                            <div class="col-sm-9">
                                <input type="text" name="code" value="{{ $unit->code }}" class="form-control" id="horizontal-firstname-input">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Unit Description</label>
                            <div class="col-sm-9">
                                <textarea name="description" class="form-control" id="horizontal-email-input">{{ $unit->description }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Edit Unit Info</button>
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

