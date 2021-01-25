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
                        <h3>My Articles</h3>
                    </div>
                </div>
            </div>
           <livewire:personal-articles />
        </div>
    </div>
@endsection