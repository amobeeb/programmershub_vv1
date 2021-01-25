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
                            <li class="breadcrumb-item active" aria-current="page">Article</li>
                          </ol>
                        </nav>
                        <h3>Articles</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg">
                    <div class="card">
                        <div class="card-title">
                            

                        </div>
                        <div class="card-body">
                            
                            <div class="row">
                                <div class="col-md-12">
                                @foreach ($articles as $article)
                                    
                              <a href="{{route('article.show', $article->slug)}}">
                               <div class="card">
                                   <div class="card-body">
                                       <h4>{{$article->title}}</h4>
                                       {{$article->members->surname}} {{$article->members->othername}}
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