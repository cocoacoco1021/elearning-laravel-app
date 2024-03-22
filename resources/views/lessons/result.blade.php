@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="container">
             <div class="row">
                <div class="col-sm-7 mx-auto">
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-sm-6">
                            <h1>{{ $lesson->category->title }}</h1>
                        </div>
                        <div class="col-sm-6 text-right">
                            <h2 class="text-muted">
                                Result:
                                <span class="text-info">{{ $lesson->correctAnswers() }}</span>
                                of {{ $lesson->answers->count() }}
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table results">
                            <tbody>
                                <tr>
                                    <th>Word</th>
                                    <th>Your Answer</th>
                                    <th>Correct Answer</th>
                                    <th></th>
                                </tr>
                                @foreach ($lesson->answers as $answer)
                                <tr>
                                    <td>{{ $answer->question->text }}</td>
                                    <td>{{ $answer->choice->text }}</td>
                                    <td>{{ $answer->question->answer()->text }}</td>
                                    <td class="text-center">
                                        @if ($answer->choice->is_correct == 1)
                                            <i class="fa fa-check text-success">
                                                ✔
                                            </i>
                                        @else
                                            <i class="fa fa-check text-danger">
                                                ✖
                                            </i>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection