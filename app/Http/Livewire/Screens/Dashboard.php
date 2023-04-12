<?php

namespace App\Http\Livewire\Screens;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.screens.dashboard')
            ->layout('layouts.app');
    }
}
