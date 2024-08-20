<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Blog extends Component
{
    public $posts;
    public function mount()
    {
        $this->posts=Post::with('author')
            ->orderBy('created_at', 'desc')
            ->get();
//        dd($this->posts);
    }
    public function render()
    {
        return view('livewire.blog');
    }
}
