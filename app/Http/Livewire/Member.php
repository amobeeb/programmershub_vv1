<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Member as MemberModel;

class Member extends Component
{
    public $members;
    public $member_details;
    public $is_members_details_set = 0;
    public $surname;
    public $othername;
    public $email;
    public $chapter;
    public $role;
    public $member_id;
    
    public function get_members_records(){
        $this->members = MemberModel::latest()->get();
    }
    public function mount(){
        $this->get_members_records();
    }
    public function render()
    {
        return view('livewire.member');
    }
    public function view_member($id){
        $this->is_members_details_set = 1;
        $member_details = MemberModel::find($id);
        $this->member_id = $member_details->id;
        $this->surname = $member_details->surname;
        $this->othername = $member_details->othername;
        $this->email = $member_details->email;
        $this->chapter = $member_details->chapter->chapter_name;
        $this->role = $member_details->role;
    }
    public function delete_member($id){
        $this->is_members_details_set = 0;
        $member_details = MemberModel::find($id);
        $member_details->delete();
        $this->get_members_records();
    }   
    public function update_roles($id, $role){
        $member_details = MemberModel::find($id);
        $member_details->role = $role == 1? 0:1;
        $member_details->save();
        // $member_details->delete();
        $this->get_members_records();
        $this->view_member($id);
    }
}
