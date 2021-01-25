<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('member')->group(function(){
    Route::get('login', [App\Http\Controllers\MemberController::class, 'login'])->name('member.auth.login');
    Route::post('login', [App\Http\Controllers\MemberController::class, 'member_login'])->name('member.auth.member_login');
    Route::get('register', [App\Http\Controllers\MemberController::class, 'register'])->name('member.auth.register');
    Route::middleware('member_status')->group(function(){
        Route::get('dashboard', [App\Http\Controllers\MemberController::class, 'dashboard'])->name('member.dashboard'); 
        Route::get('article/personal', [App\Http\Controllers\ArticleController::class, 'personal'])->name('article.personal');
        Route::resource('article', App\Http\Controllers\ArticleController::class);
    });
    Route::resource('member', App\Http\Controllers\MemberController::class);
    Route::prefix('forum')->group(function(){
        Route::get('/', [App\Http\Controllers\ForumController::class, 'explore_question'])->name('forum.index');

        Route::get('question/{id}', [App\Http\Controllers\ForumController::class, 'show_question'])->name('question.show');
        Route::get('question', [App\Http\Controllers\ForumController::class, 'question'])->name('member.question.index');
        Route::get('question/create', [App\Http\Controllers\ForumController::class, 'create_question'])->name('member.question.create');
        Route::post('question', [App\Http\Controllers\ForumController::class, 'store_question'])->name('member.question.store');
        Route::get('question/{id}/edit', [App\Http\Controllers\ForumController::class, 'edit_question'])->name('member.question.edit');
        Route::post('question/{id}', [App\Http\Controllers\ForumController::class, 'update_question'])->name('member.question.update');
        Route::post('question/{id}/delete', [App\Http\Controllers\ForumController::class, 'delete_question'])->name('member.question.delete');
    });
    Route::get('settings', [App\Http\Controllers\MemberController::class, 'edit'])->name('member.settings');
    Route::post('/update/image/{id}', [App\Http\Controllers\MemberController::class, 'update_image'])->name('member.update.picture');
    Route::post('/update/{id}', [App\Http\Controllers\MemberController::class, 'update'])->name('member.update');
    Route::post('/update/password/{id}', [App\Http\Controllers\MemberController::class, 'update_password'])->name('member.update.password');
   
});

Route::prefix('admin')->group(function(){
    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return view('administrator/dashboard');
    })->name('dashboard');
    Route::resource('chapter', App\Http\Controllers\ChapterController::class);
    Route::resource('specialty', App\Http\Controllers\SpecialtyController::class);
    Route::get('members', [App\Http\Controllers\MemberController::class, 'show'])->name('member.show');
    Route::prefix('articles')->group(function(){
        Route::get('published', [App\Http\Controllers\ArticleController::class, 'published'])->name('admin.article.published');
        Route::get('unpublished', [App\Http\Controllers\ArticleController::class, 'unpublished'])->name('admin.article.unpublished');
        Route::get('/{slug}', [App\Http\Controllers\ArticleController::class, 'unpublished'])->name('admin.article.show');
        Route::get('published/{id}', [App\Http\Controllers\ArticleController::class, 'toggle_article_approve'])->name('admin.article.toggle_approve');
        Route::get('unpublished/{id}', [App\Http\Controllers\ArticleController::class, 'toggle_article_approve'])->name('admin.article.toggle_unapprove');
    });
});
