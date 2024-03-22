<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Question;
use App\Choice;
use App\Answer;
use App\Lesson;

class AnswerController extends Controller
{
    public function __construct(){
        
        $this->middleware('auth');
    }

    public function lessonStore(Request $request, $category_id, $lesson_id){
        Answer::create([
            'lesson_id' => $lesson_id,
            'question_id' => $request->question_id,
            'choice_id' => $request->choice_id
        ]);
        
        if($request->lastPage == "true") {
            $lesson = Lesson::find($lesson_id);
            $category = Category::find($category_id);

            $lesson->activity()->create([
                'user_id' => auth()->user()->id,
                'text' => auth()->user()->name . ' finished ' . $category->title
            ]);
        }

        return redirect($request->nextPageUrl);
    }

    public function lessonAnswer($category_id, $lesson_id){
        $category = Category::find($category_id);
        $questions = $category->questions()->paginate(1);

        return view('lessons.lesson', compact('category', 'questions', 'lesson_id'));
    } 

    public function lessonResult($category_id, $lesson_id){
        $lesson = Lesson::find($lesson_id);
        // $lesson->answers;

        return view('lessons.result', compact('lesson'));
    }
}
