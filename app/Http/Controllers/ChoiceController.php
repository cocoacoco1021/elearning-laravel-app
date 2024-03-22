<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Choices;

class ChoiceController extends Controller
{
    // public function addChoices(Request $request){
    //     Choice::create([
    //         'question_id'=>$request->question_id,
    //         'text'=>$request->text,
    //         'is_correct'=>$request->is_correct
    //     ]);
    //     return redirect('/admin');
    // }
}
