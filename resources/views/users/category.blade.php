@extends('layouts.app')

@section('styles')
  <link href="{{ asset('css/category.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container py-5 mx-auto">
        <ul class="nav nav-pills nav-warning float-right justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="/admin/new">Add category</a>
            </li>
        </ul>
        <h1>
            Categories 
            <small class="text-muted font-weight-normal">{{ $category->count() }}</small>
            {{-- <small class="text-muted font-weight-normal">{{ App\Category::all()->count() }}</small> --}}
        </h1>
        <div class="row object-list mt-4"> 
            @foreach ($listOfcategories as $category)
                <div class="col-md-6 mb-4">
                    <article class="card p-2 h-100">
                        <div class="card-body">
                            <h4 class="card-title">{{ $category->title }}</h4>
                            <p class="card-text">
                                <strong>[{{ $category->questions->count() }} words]</strong>
                                {{ $category->description }}
                            </p>
                            <div class="mt-5">
                                <a class="btn btn-outline-primary btn-block" href="/category/{{ $category->id }}/lesson">
                                        Learn
                                </a>
                            </div>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center paginate mt-5">
            {{ $listOfcategories->links() }}
        </div>
    </div>
@endsection