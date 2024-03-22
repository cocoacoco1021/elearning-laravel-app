<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Question;
use App\Choice;

class QuestionController extends Controller
{
    public function __construct(){
             
        $this->middleware('auth');
    }
    
    public function addWordstore(Request $request){
        // dd($request->all());
        $question = Question::create([
            'category_id' => $request->category_id,
            'text' => $request->text
        ]);

        $choice = Choice::create([
            'question_id' => $question->id,
            'text' => $request->choice1,
            'is_correct' => $request->is_correct == "choice1" ? true : false
        ]);

        $choice = Choice::create([
            'question_id' => $question->id,
            'text' => $request->choice2,
            'is_correct' => $request->is_correct == "choice2" ? true : false
        ]);

        $choice = Choice::create([
            'question_id' => $question->id,
            'text' => $request->choice3,
            'is_correct' => $request->is_correct == "choice3" ? true : false
        ]);

        // return back();
        return redirect()->route('admin.add', ['id' => $request->category_id]);
    }

    public function addWordedit($category_id, $question_id){
        $question = Question::find($question_id);
        $category = Category::find($category_id);
        return view('questions.addWordedit', compact('question', 'category'));
    }

    public function addWordupdate(Request $request, $category_id, $question_id){
        // dd($request->all());
        $question = Question::find($question_id);
        $category = Category::find($category_id);
        $choice1 = Choice::find($request->choice1_id);
        $choice2 = Choice::find($request->choice2_id);
        $choice3 = Choice::find($request->choice3_id);

        $question -> update([
            'category_id' =>$request->category_id,
            'text' => $request->text
        ]);

        $choice1->update([
            'question_id' =>$request->question_id,
            'text' =>$request->choice1,
            'is_correct' =>$request->is_correct == "choice1" ? true : false
        ]);

        $choice2->update([
            'question_id' =>$request->question_id,
            'text' =>$request->choice2,
            'is_correct' =>$request->is_correct == "choice2" ? true : false
        ]);

        $choice3->update([
            'question_id' =>$request->question_id,
            'text' =>$request->choice3,
            'is_correct' =>$request->is_correct == "choice3" ? true : false 
        ]);


        return redirect()->route('admin.add', ['id' => $category->id]);
    }

    public function addWordremove($category_id, $question_id){
        $category = Category::find($category_id);
        $question = Question::find($question_id);

        // $category->delete();
        $question->delete();

        return back();
    }
}
