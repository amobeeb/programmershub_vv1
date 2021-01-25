<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Section;
use Illuminate\Support\Str;
class ForumController extends Controller
{
    public function question(){
        $questions = Question::where('member_id', Auth('members')->user()->id)->latest()->get();
        return view('member.forum.question.index')->with('questions', $questions);
    }
    public function show_question($id){
        
        $question = Question::where('slug', $id)->first();
        return view('member.forum.question.show')->with('question', $question);
    }
    public function create_question(){
        $sections = Section::all();
        return view('member.forum.question.create')->with('sections', $sections);
    }
    public function store_question(Request $request){
        $question = new Question;
        $question->title = $request->title;
        $question->description = $request->description;
        $question->section_id = $request->section_id;
        $question->member_id = Auth('members')->user()->id;
        $question->slug = Str::slug($request->title);
        $question->save();
        dd("Saved");
    }
    public function edit_question($id){
        $sections = Section::all();
        $question = Question::find($id);
        return view('member.forum.question.edit')
        ->with('question', $question)
        ->with('sections', $sections);
    }
    public function update_question(Request $request, $id){
        $question =  Question::find($id);
        $question->title = $request->title;
        $question->description = $request->description;
        $question->section_id = $request->section_id;
        $question->member_id = Auth('members')->user()->id;
        $question->slug = Str::slug($request->title);
        $question->save();
        dd("updated");
    }
    public function delete_question(){
    }

    public function explore_question(){
        $questions = Question::latest()->get();
        return view('member.forum.index')->with('questions', $questions);
    }
    }
