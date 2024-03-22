<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Category;

class CategoryController extends Controller
{
    public function __construct(){
        
        $this->middleware('auth');
    }

    public function admin(){
        $listOfcategories=Category::all();
        return view('users.admin', compact('listOfcategories'));
    }

    public function store(Request $request){
        Category::create([
            'title' =>$request->title,
            'description' =>$request->description
        ]);
        return redirect('/admin');
    }

    public function create(){

        return view('categories.create');
    }

    public function show($id){
        $category=Category::find($id);

        return view('categories.show', compact('category'));
    }

    public function add($id){
        $category=Category::find($id);

        return view('categories.add', compact('category'));
    }

    public function addWord($id){
        $category=Category::find($id);
        return view('categories.addWord', compact('category'));
    }

    public function edit($id){
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id){
        $category=Category::find($id);

        $category->update([
            'title' =>$request->title,
            'description' =>$request->description
        ]);

        return redirect('/admin');
    }

    public function delete($id){
        $category = Category::find($id);

        $category->delete();
        
        return redirect('/admin');
    }
}
