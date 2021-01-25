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
                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                </ol>
            </nav>
            <h3>Settings</h3>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg">

        <div class="card">
            <div class="card-body"> 
                <div class="card-title">Change Password</div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('member.update.picture', Auth('members')->user()->id)}}" method="POST" enctype="multipart/form-data" class="form-inline">
                            @csrf
                            <div class="row"> 
                                    <div class="form-group"> 
                                        <input type="file" class="form-control" name="member_image" />
                                    </div> 
                                <button type="submit" class="btn btn-info" name="submit">Submit</button> 
                            </div>
                           
                        </form>
                        <img src="/storage/member/profile/{{$member->profile_pix}}" height="100" width="100" />
                    </div> 
                </div> 
            </div>
        </div>

        <div class="card">
           
            <div class="card-body"> 
                <div class="card-title">Profile</div>
                <div class="row">
                    <div class="col-md-12">
                       
                            
                            <form method="POST" action="{{ route('member.update',Auth('members')->user()->id) }}">
                                @csrf
                                <div class="form-group"> 
                                    <input type="text" class="form-control"   aria-describedby="username" placeholder="Enter username" name="username" value="{{$member->username}}" required autofocus >
                                </div>
                                <div class="form-group"> 
                                    <input type="text" class="form-control"   aria-describedby="surname" placeholder="Enter surname" name="surname" value="{{$member->surname}}" required autofocus >
                                </div>
                                <div class="form-group"> 
                                    <input type="text" class="form-control"  aria-describedby="othername" placeholder="Enter othername" name="othername" value="{{$member->othername}}" required autofocus >
                                </div>
                                <div class="form-group"> 
                                    <select class="form-control" name="gender">
                                        <option selected value="{{$member->gender}}" >Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select> 
                                </div>
                                <div class="form-group"> 
                                    <select class="form-control" name="chapter_id">
                                        <option selected value="{{$member->chapter_id}}" >Select Chapter</option>
                                        @foreach ($chapters as $chapter)
                                        <option value="{{$chapter->id}}">{{$chapter->chapter_name}}</option> 
                                        @endforeach
                                    </select> 
                                </div>
                                
                                <div class="form-group"> 
                                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{$member->email}}" required autofocus >
                                </div>
                                <div class="form-group"> 
                                    <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter twitter" name="twitter" value="{{$member->twitter}}" required autofocus >
                                </div>
                                <div class="form-group"> 
                                    <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter bio" name="bio" value="{{$member->bio}}" required autofocus >
                                </div>
                                 
                                <button type="submit" class="btn btn-primary float-right m-l-xxs">  
                                    {{ __('Update') }} 
                                </button>
                            </form>

                    </div> 
                </div> 
            </div>
        </div>

        <div class="card">
          
            <div class="card-body">
                <div class="card-title">Change Password</div> 
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('member.update.password', Auth('members')->user()->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group">
                                <label for="title"> Password</label>
                                <input type="text" class="form-control"  name="password" />
                            </div>
                            <div class="form-group">
                                <label for="title"> Change Password</label>
                                <input type="text" class="form-control"   name="password_confirmation" />
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