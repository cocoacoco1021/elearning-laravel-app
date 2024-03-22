@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 mx-auto">
                <div class="row" style="margin-bottom: 20px">
                    <div class="col-sm-9">
                        <h1>{{ $category->title }}</h1>
                    </div>
                    <div class="col-sm-3 text-right">
                        <h3 class="text-muted">
                            <span class="text-info">{{ $questions->currentPage() }}</span>
                            of {{ $questions->lastPage() }}
                        </h3>
                    </div>
                </div>
                @foreach ($questions as $question)
                    <div class="card p-3">
                        <h2 class="text-info text-center">{{ $question->text }}</h2>

                        @foreach ($question->choices as $choice)
                            <div class="choices">
                                <div class="mt-3">
                                    <form class="button_to" method="post" action="/category/{{ $category->id }}/lesson/{{ $lesson_id }}/store">
                                        @csrf
                                        <input class="btn btn-outline-secondary btn-block" type="submit" value=" {{ $choice->text }} ">

                                        {{-- If last Page (no more next page)
                                            nextPageUrl value = results Page
                                        else (still have next page)
                                            nextPageUrl Value = nextPageUrl --}}

                                        @if ($questions->currentPage() == $questions->lastPage())
                                            <input type="hidden" name="nextPageUrl" value="/category/{{ $category->id }}/lesson/{{ $lesson_id }}/result">
                                            <input type="hidden" name="lastPage" value="true">
                                        @else
                                            <input type="hidden" name="nextPageUrl" value="{{ $questions->nextPageUrl() }}">
                                        @endif
                                        <input type="hidden" name="choice_id" value="{{ $choice->id }}">
                                        <input type="hidden" name="question_id" value="{{ $question->id }}">
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
                {{-- {{ $questions }} --}}
            </div>
        </div>
    </div>
@endsection