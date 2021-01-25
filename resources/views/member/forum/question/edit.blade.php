@extends('layouts.member')
   
@section('contents')
    
<div class="lime-container">
    <div class="lime-body">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title">
                        <nav aria-label="breadcrumb">
                          <ol class="breadcrumb breadcrumb-separator-1">
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Question</li>
                          </ol>
                        </nav>
                        <h3>Question</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg">
                    <div class="card">
                        <div class="card-body">
                          
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{route('member.question.update', $question->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="title"> title</label>
                                            <input type="text" class="form-control" value="{{$question->title}}" name="title" />
                                        </div>
                                        <div class="form-group">
                                            <label for="title"> Description</label>
                                           <textarea class="form-control" name="description">{{$question->description}}</textarea> 
                                        </div>
                                        <div class="form-group">
                                            <label for="title"> Section</label>
                                            <select class="form-control" name="section_id">
                                                <option value="{{$question->section_id}}">SELECT</option>
                                                @foreach ($sections as $section)
                                                <option value="{{$section->id}}">{{$section->name}}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success" name="submit">Submit</button>
                                        </div>
                                    </form>

                                </div>
                                
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
        @endsection