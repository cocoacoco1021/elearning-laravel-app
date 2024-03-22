<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/members', 'UserController@members')->name('members');

Route::get('/members/{id}/show', 'UserController@show')->name('members.show');

Route::get('/profile', 'UserController@profile')->name('profile');

Route::get('/category', 'UserController@category')->name('category');

Route::get('/admin', 'CategoryController@admin')->name('admin');

Route::post('/admin/store', 'CategoryController@store')->name('admin.store');

Route::get('/admin/new', 'CategoryController@create')->name('admin.new');

Route::get('/admin/{id}/show', 'CategoryController@show')->name('admin.show');

Route::get('/admin/{id}/add', 'CategoryController@add')->name('admin.add');

Route::get('/admin/{id}/addWord', 'CategoryController@addWord')->name('admin.addWord');

Route::get('/admin/{id}/edit', 'CategoryController@edit')->name('admin.edit');

Route::patch('/admin/{id}/update', 'CategoryController@update')->name('admin.update');

Route::delete('/admin/{id}/delete', 'CategoryController@delete')->name('admin.delete');

Route::post('/admin/{id}/addWord/store', 'QuestionController@addWordstore')->name('admin.addWord.store');

// Route::post('/admin/{id}/addWord/store/choices', 'ChoiceController@addChoices')->name('admin.addWord.store.choices');

Route::get('/admin/{category_id}/addWord/{question_id}/edit', 'QuestionController@addWordedit')->name('admin.addWord.edit');

Route::patch('/admin/{category_id}/addWord/{question_id}/update', 'QuestionController@addWordupdate')->name('admin.addWord.update');

Route::delete('/admin/{category_id}/addWord/{question_id}/remove', 'QuestionController@addWordremove')->name('admin.addWord.remove');

Route::get('/category/{category_id}/lesson', 'LessonController@lesson')->name('category.lesson');

Route::get('/categroy/{category_id}/lesson/{lesson_id}/answer', 'AnswerController@lessonAnswer')->name('category.lesson.answer');

Route::post('/category/{category_id}/lesson/{lesson_id}/store', 'AnswerController@lessonStore')->name('category.lesson.store');

Route::get('/category/{category_id}/lesson/{lesson_id}/result', 'AnswerController@lessonResult')->name('category.lesson.result');

Route::get('/follow/{followed_id}', 'UserController@follow')->name('user.follow');

Route::get('/unfollow/{followed_id}', 'UserController@unfollow')->name('user.unfollow');
