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
                        <div class="card-body">
                          
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{route('article.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="title"> title</label>
                                            <input type="text" class="form-control" name="title" />
                                        </div>
                                        <div class="form-group">
                                            <label for="title"> Description</label>
                                           <textarea class="form-control" name="description"></textarea> 
                                        </div>
                                        <div class="form-group">
                                            <label for="title"> Cover Image</label>
                                            <input type="file" class="form-control" name="cover" />
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