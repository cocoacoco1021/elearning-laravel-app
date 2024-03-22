@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <span>Admin | {{ $category->title }} - Words</span>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a class="btn btn-sm" href="/admin">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h2>{{ $category->title }}</h2>
                    <p>{{ $category->description }}</p>
                </div>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Words</th>
                            <th>Choices</th>
                            <th>Answer</th>
                        </tr>
                        @foreach ($category->questions as $question)
                            <tr>
                                <td>
                                    {{ $question->text }}
                                </td>
                                <td class="d-flex" >
                                    @foreach ($question->choices as $choice)
                                        <p class="ml-3 mb-0">{{ $choice->text }}</p>
                                    @endforeach 
                                </td>
                                <td>
                                    {{ $question->answer()->text }}
                                </td>
                            </tr>        
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection