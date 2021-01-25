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
                            <li class="breadcrumb-item active" aria-current="page">Questions</li>
                          </ol>
                        </nav>
                        <h3>Personal: Questions</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg">
                    <div class="card">
                        <div class="card-title">
                            

                        </div>
                        <div class="card-body">
                            <a href="{{route('member.question.create')}}">Ask Question</a>
                            <div class="row">
                                <div class="col-md-12">
                                @foreach ($questions as $question)
                                    
                              <a href="{{route('question.show', $question->slug)}}">
                               <div class="card">
                                   <div class="card-body">
                                       <h4>{{$question->title}}</h4>
                                       {{-- <a href="{{route('question.show', $question->slug)}}">delete</a> --}}
                                       {{-- {{$question->members->surname}} {{$article->members->othername}} --}}
                                   </div>
                               </div>
                            </a>
                               @endforeach
                            </div>
                        </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
        @endsection