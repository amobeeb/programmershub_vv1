<div> 
<div class="lime-container">
<div class="lime-body">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-separator-1">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Chapters</li>
                    </ol>
                </nav>
                <h3>Chapters</h3>
                <p class="page-desc">Add or update Programmers' Hub Community Chapters</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add Chapters</h5>
                    @if(session()->has('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                    @endif
                    <form wire:submit.prevent="@if($chapter_id==0) add_chapter @else update_chapter({{$chapter_id}}) @endif">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Chapter</label>
                            <input type="text" class="form-control" id="chapter" aria-describedby="emailHelp" placeholder="Enter Chapter" wire:model="chapter"> 
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">State</label>  
                            <select class="form-control" name="state" wire:model="state">
                                @foreach($states as $state)
                                <option value="{{$state->state_name}}">{{$state->state_name}}</option>
                                @endforeach 
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Comments (Optional)</label>  
                            <textarea class="form-control" wire:model="comment"></textarea>
                        </div>
                        @if($isUpdate == 0)
                        <button type="submit" class="btn btn-primary" >Submit</button>
                        @else
                        <button type="submit" class="btn btn-warning" >Update</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Chapters</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Chapter</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($chapters as $chapter)
                            <tr>
                            <td>{{$countChapterRows++}}</td>
                            <td>{{$chapter->chapter_name}}</td>
                            <td>
                                <button class="btn btn-danger" wire:click="delete_chapter({{$chapter->id}})"><i class="fa fa-trash"></i></button>
                                <button class="btn btn-warning"><i class="fa fa-pen" wire:click="edit_chapter({{$chapter->id}})"></i></button> 
                            </td>
                             
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
        
</div>
</div>
</div>
