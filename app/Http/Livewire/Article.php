<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
class Article extends Component
{
    public $article;
    public $comment;
    public $comments;
    public function render()
    {  
        return view('livewire.article');
    }
    public function get_all_comments(){
        $this->comments = Comment::where('article_id',$this->article->id)->get();

    }
    public function mount(){
        $this->get_all_comments();
    }
    public function add_comment(){
        $comment = new Comment;
        $comment->comment = $this->comment;
        $comment->article_id = $this->article->id;
        $comment->member_id = $this->article->member_id;
        $comment->save();
        $this->get_all_comments();
    }
}
