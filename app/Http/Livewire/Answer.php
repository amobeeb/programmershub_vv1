<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Answer as AnswerModel;
use Auth;
class Answer extends Component
{
    public $question;
    public $answers;
    public $reply;

    public function get_answer_records(){
        $this->answers = AnswerModel::where('question_id', $this->question->id)->latest()->get();
    }
    public function mount(){
        $this->get_answer_records();
    }
    public function render()
    {
        return view('livewire.answer');
    }

    public function add_answer(){
        $answer = new AnswerModel;
        $answer->question_id = $this->question->id;
        $answer->answers = $this->reply;
        $answer->votes = 0;
        $answer->approved = 0;
        $answer->member_id = Auth('members')->user()->id;
        $answer->save();
        $this->get_answer_records();
        $this->reply = '';

    }
}
