<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthModal extends Component
{
    public $email;
    public $password;
    public $name;
    public $password_confirmation;

    public $isLoginMode = true;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function switchMode()
    {
        $this->resetErrorBag();
        $this->isLoginMode = !$this->isLoginMode;
    }

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
//            $this->modal='hidden';
            $this->dispatch('LoginSuccess');
        } else {
            session()->flash('error', 'Invalid credentials.');
        }
    }

    public function signup()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        Auth::login($user);
        $this->dispatch('LoginSuccess');
//        return redirect()->to('/dashboard');
    }

    public function render()
    {
        return view('livewire.auth-modal');
    }
}
