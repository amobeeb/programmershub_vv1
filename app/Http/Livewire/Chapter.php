<?php

namespace App\Http\Livewire;
use App\Models\State;
use Livewire\Component;
use App\Models\Chapter as ChaptersModel;
class Chapter extends Component
{
    public $chapter_id = 0;
   public $isUpdate = 0;
   public $states;
   public $chapters;
   public $countChapterRows=1;
   public $chapter;
   public $state;
   public $comment;
   protected $rules = [
       'chapter' => 'required',
       'state' => 'required',
   ];

    private function get_chapters_records(){
        $this->chapter = '';
        $this->state = '';
        $this->comment = '';
        $this->chapters = ChaptersModel::get(); 
    }

    public function mount(){
        
        //    get data on first page load
            $this->get_chapters_records();
    }
    public function render()
    {
        $this->states = State::all();  
        return view('livewire.chapter');
    }

    public function add_chapter(){
     $this->validate();
     $chapter = new ChaptersModel; 
     $chapter->chapter_name = $this->chapter;
     $chapter->state = $this->state;
     $chapter->comments = $this->comment;
     $chapter->save();
     session()->flash('message', 'Chapter Saved successfully');
     $this->get_chapters_records();
    }

    public function delete_chapter($id){
        $chapter = ChaptersModel::find($id);
        $chapter->delete();
        $this->get_chapters_records();
    }

    public function edit_chapter($id){
        
        $this->isUpdate = 1;
        $chapter = ChaptersModel::find($id);
        $this->chapter = $chapter->chapter_name;
        $this->state = $chapter->state;
        $this->comments = $chapter->comments; 
        $this->chapter_id = $chapter->id; 
    }
    public function update_chapter($id){
        $chapter = ChaptersModel::find($id);
        
     $chapter->chapter_name = $this->chapter;
     $chapter->state = $this->state;
     $chapter->comments = $this->comment;
     $chapter->save();
     session()->flash('message', 'Chapter Updated successfully');
     $this->get_chapters_records();
    }
}
