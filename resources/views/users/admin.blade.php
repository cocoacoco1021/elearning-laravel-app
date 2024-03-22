@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <span>Admin | Categories</span>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a class="btn btn-sm btn-success" href="/admin/new">Add category</a>
                        </div>
                    </div>
                </div>
                 <table class="table">
                        <tbody>
                            <tr>
                                    <th class="col-xs-3">ID</th>
                                    <th class="col-xs-3">Title</th>
                                    <th class="col-xs-3">Description</th>
                                    <th class="col-xs-3">Words</th>
                                    <th class="col-xs-3">Action</th>
                                </div>
                            </tr>

                           @foreach($listOfcategories as $category)
                                <tr>
                                    <td>
                                        <a href="/admin/{{ $category->id }}/show">
                                            {{ $category->id }}
                                        </a>
                                    </td>
                                    <td>{{ $category->title }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>{{ $category->questions->count() }}</td>
                                    <td>
                                        <div class="row">
                                            <div>
                                                <a class="btn btn-sm btn-primary" href="/admin/{{ $category->id }}/add">Add Word</a>
                                            </div>
                                            <div class="ml-2">
                                                <a class="btn btn-sm btn-warning" href="/admin/{{ $category->id }}/edit">Edit</a>
                                            </div>
                                            <div class="d-flex ml-2">
                                                <form action="/admin/{{ $category->id }}/delete" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <input type="submit" class="btn btn-sm btn-link" value="Remove">
                                                </form>  
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection