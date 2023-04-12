<?php

namespace App\Http\Livewire\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.components.header');
    }
}
