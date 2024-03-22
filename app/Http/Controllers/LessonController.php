<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Question;
use App\Choice;
use App\Lesson;
// use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    public function __construct(){
        
        $this->middleware('auth');
    }
    
    public function lesson($category_id){
        $lesson = Lesson::create([
            'category_id' => $category_id,
            'user_id' => auth()->user()->id
            // 'user_id' => Auth::user()->id
        ]);       
        
        return redirect()->route('category.lesson.answer', ['category_id' => $category_id , 'lesson_id' => $lesson->id]);
    }
}
