@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                        <div class="col-sm-6">
                            <span>Admin|{{ $category->title }}|Word</span>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a class="btn btn-sm" href="/admin/{{ $category->id }}/add">Back</a>
                        </div>
                </div>
            </div>
            <div class="card-body">
                {{-- <form class="new_word" action='/admin/{{$category->id}}/addWord/{{$question->id}}/update' method="post"> --}}
                <form class="new_word" action="{{ route('admin.addWord.update', ['category_id' => $category->id, 'question_id' => $question->id]) }}" method="post">
                    @method('PATCH')
                    @csrf
                    <input type="hidden" name="category_id" value="{{ $category->id }}">
                    <div class="row">
                        <div class="col-sm-8 mx-auto">
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label for="word_content">Word</label>
                                </div>
                                <div class="col-sm-7">
                                <input class="form-control" type="text" name="text" value="{{ $question->text }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label for="Choices">Choices</label>
                                </div>
                                <div class="col-sm-9">
                                    @foreach ($question->choices as $key => $choice)
                                        <div class="form-group row">
                                            <div class="col-sm-9">
                                            <input class="form-control" type="text" name="choice{{ $key+1 }}" value="{{ $choice->text }}">
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="">Correct
                                                <input type="hidden" name="choice{{ $key+1 }}_id" value="{{ $choice->id }}">
                                                <input type="radio" name="is_correct" value="choice{{ $key+1 }}" {{$choice->is_correct == '1' ? 'checked' : '' }}>
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="text-center">
                                <input type="submit" class="btn btn-success" value="Save Word">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>    
@endsection