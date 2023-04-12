<?php

namespace App\Http\Livewire\Screens;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MealsForm extends Component
{
    public string $meals = '';

    protected $rules = [
        'meals' => ['required', 'string'],
    ];

    public function mount()
    {
        $this->meals = Auth::user()->data->get('meals', '');
    }

    public function submit()
    {
        $this->validate();

        $user = Auth::user();
        $user->data->put('meals', $this->meals);
        $user->save();

        return redirect()->route('chefForm');
    }

    public function render()
    {
        $options = [
            '4' => ['title' => '4 servings', 'price' => 8.49],
            '6' => ['title' => '6 servings', 'price' => 7.99],
            '8' => ['title' => '8 servings', 'price' => 7.49],
            '12' => ['title' => '12 servings', 'price' => 6.99],
        ];

        return view('livewire.screens.meals-form', ['options' => $options]);
    }
}
