<?php

namespace App\Livewire;

use App\Models\Comments;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class BlogContent extends Component
{
//    public $loginFormStatus = "hidden";
//    public $signupFormStatus = "hidden";
//    public $signupFormStatus = "hidden";
    public $modal="hidden";
    public $post;
    public $comments;
    public $commentCount;

//    protected $listeners = ['LoginSuccess' => '$refresh'];


    public $likeCount;
    public $userHasLiked;
    public $postId;
    public $newcomment;

    protected $rules = [
        'newcomment' => 'required|string|max:255',
    ];

    public function mount($id)
    {
        $this->postId = $id;
        $this->post = Post::with('author', 'tags', 'likes', 'comments')->find($id);
        $this->comments = $this->post->comments;
        $this->likeCount = $this->post->likes->count();
        $this->commentCount = $this->comments->count();
        $this->checkLike();
    }

    public function checkLike()
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $this->likeCount = $this->post->likes->count();
            $this->userHasLiked = $this->post->likes->contains('user_id', $userId);
        }
    }





    public function userNotAuth()
    {
        $this->modal = "";
    }

    #[On('LoginSuccess')]
    public function UserAuthed()
    {
        $this->modal='hidden';
        $this->mount($this->postId);
    }

    public function like()
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;

            if ($this->userHasLiked) {
                $this->post->likes()->where('user_id', $userId)->delete();
            } else {
                $this->post->likes()->create([
                    'user_id' => $userId,
                    'post_id' => $this->post->id,
                ]);
            }

            $this->checkLike();
        } else {
            $this->userNotAuth();
        }
    }

    public function submit(): void
    {
        if (Auth::check()) {
            $this->validate();

            Comments::create([
                'post_id' => $this->postId,
                'body' => $this->newcomment,
                'user_id' => auth()->id(),
                'isPublic' => 1,
            ]);

            $this->post = $this->post->refresh();
            $this->comments = $this->post->comments;
            $this->commentCount = $this->comments->count();
            $this->reset(['newcomment']);
            session()->flash('message', 'Comment added successfully.');
        } else {
            $this->userNotAuth();
        }
    }

    public function render()
    {
        return view('livewire.blog-content');
    }
}
