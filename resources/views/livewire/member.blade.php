<div>
    <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Members</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Surname</th>
                                        <th>Othername</th>  
                                        <th>Role</th> 
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $count = 1;    
                                    @endphp
                                @foreach($members as $member)
                              
                                <tr>
                                <td>{{$count++}}</td>
                                <td>{{$member->surname}}</td>
                                <td>{{$member->othername}}</td>
                                <td>@php
                                  if($member->role == 1){
                                      echo 'President';
                                  }  else{
                                      echo 'Member';
                                  }
                                    @endphp</td>
                                <td>  <button class="btn btn-info" wire:click="view_member({{$member->id}})"><i class="fa fa-eye"></i></button>
                                    <button class="btn btn-danger" wire:click="delete_member({{$member->id}})"><i class="fa fa-trash"></i></button> 
                                </td> 
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                @if($is_members_details_set == 0)
                @else
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Member Details</h5>
                            <table class="table">
                                <tr>
                                    <th>Surname</th>
                                    <td>{{$surname}}</td>
                                </tr>
                                <tr>
                                    <td>Othername</td>
                                    <td>{{$othername}}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{$email}}</td>
                                </tr>
                                <tr>
                                    <td>Chapter</td>
                                    <td>{{$chapter}}</td>
                                </tr>
                                <tr>
                                    <td>Role</td>
                                    <td>@php
                                        if($role == 1){
                                            echo 'President';
                                        }  else{
                                            echo 'Member';
                                        }
                                          @endphp</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <button wire:click="update_roles({{$member_id}}, {{$role}})" class="btn btn-success">Change to @php
                                        if($role != 1){
                                            echo 'President';
                                        }  else{
                                            echo 'Member';
                                        }
                                          @endphp</button></td>
                                    
                                </tr>
                            </table>
                    </div>
                </div>
                @endif
            </div>
        </div>
</div>
