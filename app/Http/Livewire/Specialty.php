<?php

namespace App\Http\Livewire;
use App\Models\Specialty as SpecialtyModel;
use Livewire\Component;

class Specialty extends Component
{
    public  $countSpecialty = 1;
    public $specialties;
    public $isUpdated= 0;
    public $specialty_id;
    public $name;
    protected $rules = [
        'name' => 'required'
    ];
    public function get_all_specialty_records(){
        $this->specialties = SpecialtyModel::all();
    }
    public function mount(){
     $this->get_all_specialty_records();
    }
    public function render()
    { 
        return view('livewire.specialty');
    }

    public function add_specialty(){
        $this->validate();
        $specialty = new SpecialtyModel;
        $specialty->name = $this->name;
        $specialty->save();
        session()->flash('message', "Chapter Added Successfully");
        $this->get_all_specialty_records();

    }
    public function update_specialty($id){
        $this->validate();
        $specialty = SpecialtyModel::find($id);
        $specialty->name = $this->name;
        $specialty->save();
        session()->flash('message', "Chapter Updated Successfully");
        $this->get_all_specialty_records();

    }
    public function edit_specialty ($id){
        $this->isUpdated =1;
        $specialty = SpecialtyModel::find($id);
        $this->specialty_id= $specialty->id; 
        $this->name = $specialty->name;
    }
    public function delete_specialty($id){
        $specialty = SpecialtyModel::find($id);
        $specialty->delete();
        $this->get_all_specialty_records(); 
    }
    
}
