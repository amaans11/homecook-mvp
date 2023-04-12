<?php

namespace App\Http\Livewire\Screens;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class Welcome extends Component
{
    public string $name = '';
    public string $email = '';

    protected $rules = [
        'name' => ['required', 'string'],
        'email' => ['required', 'email', 'unique:users,email'],
    ];

    public function submit()
    {
        $this->validate();

        $password = Str::random(10);

        $credentials = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($password),
        ];

        User::create($credentials);

        if (Auth::attempt(['email' => $this->email, 'password' => $password])) {
            request()->session()->regenerate();

            return redirect()->route('dietForm');
        }
    }

    public function render()
    {
        return view('livewire.screens.welcome')
            ->layout('layouts.guest');
    }
}
