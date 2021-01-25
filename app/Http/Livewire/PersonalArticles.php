<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Article;
class PersonalArticles extends Component
{
    public $articles;
    public $loading = '';
    public function mount(){
        $this->articles = Article::where('member_id', Auth('members')->user()->id)->latest()->get();
    }
    public function render()
    { 
        return view('livewire.personal-articles');
    }
    public function unpublished(){
        $this->loading  = 'loading';
        $this->articles = Article::where('member_id', Auth('members')->user()->id)->where('is_approved',0)->latest()->get();
    }
    public function published(){
        $this->articles = Article::where('member_id', Auth('members')->user()->id)->where('is_approved',1)->latest()->get();
    }
}
