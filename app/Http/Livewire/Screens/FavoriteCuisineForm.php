<?php

namespace App\Http\Livewire\Screens;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FavoriteCuisineForm extends Component
{
    public array $cuisines = [];
    private array $options = [
        'arabic' => 'Arabic',
        'indian' => 'Indian',
        'italian' => 'Italian',
        'chinese' => 'Chinese',
        'thai' => 'Thai',
        'korean' => 'Korean',
        'continental' => 'Continental',
        'german' => 'German',
        'sushi' => 'Sushi',
        'vietnamese' => 'Vietnamese',
        'african' => 'African',
        'american' => 'American',
        'mexican' => 'Mexican',
        'french' => 'French',
        'other' => 'Other',
    ];

    protected $rules = [
        'cuisines' => ['required', 'array'],
        'cuisines.*' => ['required', 'string'],
    ];

    public function mount()
    {
        $this->cuisines = Auth::user()->data->get('favoriteCuisines', []);
    }

    public function submit()
    {
        $this->validate();

        $user = Auth::user();
        $user->data->put('favoriteCuisines', $this->cuisines);
        $user->save();

        return redirect()->route('peopleChefServeForm');
    }

    public function selectAll()
    {
        $this->cuisines = array_keys($this->options);
    }

    public function render()
    {

        return view('livewire.screens.favorite-cuisine-form', ['options' => $this->options]);
    }
}
