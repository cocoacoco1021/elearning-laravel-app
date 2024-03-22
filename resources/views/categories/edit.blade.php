@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <span> Admin | Categories</span>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a class="btn btn-sm" href="/admin">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="/admin/{{ $category->id }}/update" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="row">
                            <div class="col-sm-9 mx-auto">
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="">Title</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="title" value="{{ $category->title }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="">Description</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="description" value="{{ $category->description }}">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <input type="submit" value="Save Category" class="btn btn-success">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection