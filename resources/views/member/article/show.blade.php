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
                            <a href="{{route('article.create')}}" class="btn btn-success">Create Article</a>

                        </div>
                        <div class="card-body">
                            
                            <div class="row">
                              <div class="col-md-12">
                               <div class="card">
                                   <div class="card-body">
                                       <h4>{{$article->title}}</h4>
                                   </div>
                               </div>
                              
                                </div>
                            </div>
                            <div class="row">
                              
                                <div class="col-md-12">
                                    
                                          <livewire:article :article="$article" />
                             
                                        </div>
                               
                             </div>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
        @endsection