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
                        <li class="breadcrumb-item active" aria-current="page">Specialty</li>
                        </ol>
                    </nav>
                    <h3>Specialty</h3>
                    <p class="page-desc">Add or update Specialty</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        @if(session()->has('message'))
                        <div class="alert alert-success">{{session('message')}}</div>
                        @endif
                        <h5 class="card-title">Add Specialty</h5>
                       
                        <form wire:submit.prevent="@if($isUpdated==0) add_specialty @else update_specialty({{$specialty_id}}) @endif">
                            <div class="form-group">
                                <label for="name">Specialty Name</label>
                                <input type="text" class="form-control" id="name"   placeholder="Enter Specialty" wire:model="name"> 
                                @error('name') {{$message}} @enderror
                            </div> 
                            @if($isUpdated == 0)
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
                        <h5 class="card-title">Specialty</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Specialty</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
    
                                @foreach($specialties as $specialty)
                                <tr>
                                <td>{{$countSpecialty++}}</td>
                                <td>{{$specialty->name}}</td>
                                <td>
                                    <button class="btn btn-danger" wire:click="delete_specialty({{$specialty->id}})"><i class="fa fa-trash"></i></button>
                                    <button class="btn btn-warning"><i class="fa fa-pen" wire:click="edit_specialty({{$specialty->id}})"></i></button> 
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
    