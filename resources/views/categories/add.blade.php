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
                            <a class="btn btn-sm btn-success" href="/admin/{{ $category->id }}/addWord">Add word</a>
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
                            <th>Answer</th>
                            <th>Choices</th>
                            <th>Action</th>
                        </tr>

                        @foreach ($category->questions as $question)
                            <tr>
                                <td>
                                    {{ $question->text }}
                                </td>
                                <td>
                                    {{-- {{ $question->answer()->get()[0]->text }} --}}

                                    {{ $question->answer()->text }}
                                    
                                    {{-- @foreach ($question->choices as $choice)
                                        @if ($choice->is_correct == 1)
                                            {{ $choice->text }}
                                        @endif
                                    @endforeach --}}
                                </td>
                                <td>
                                    @foreach ($question->choices as $choice)
                                        {{ $choice->text }}
                                    @endforeach
                                </td>
                                <td class="d-flex">
                                    <a class="btn btn-sm btn-warning" href='/admin/{{ $category->id }}/addWord/{{ $question->id }}/edit'>Edit</a>
                                    <form action="/admin/{{ $category->id }}/addWord/{{ $question->id }}/remove" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" class="btn btn-sm btn-link" value="Remove">
                                    </form>
                                </td>
                            </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection