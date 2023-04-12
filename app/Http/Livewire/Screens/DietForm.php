<?php

namespace App\Http\Livewire\Screens;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DietForm extends Component
{
    public array $diets = [];

    protected $rules = [
        'diets' => ['required', 'array'],
        'diets.*' => ['required', 'string'],
    ];

    public function mount()
    {
        $this->diets = Auth::user()->data->get('diets', []);
    }

    public function submit()
    {
        $this->validate();

        $user = Auth::user();
        $user->data->put('diets', $this->diets);
        $user->save();

        return redirect()->route('foodGoalForm');
    }

    public function goBack()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('welcome');
    }

    public function render()
    {
        $options = [
            'meat_and_veggies' => 'Meat & veggies',
            'vegetarian' => 'Vegetarian',
            'vegan' => 'Vegan',
            'pescatarian' => 'Pescatarian',
            'flexitarian' => 'Flexitarian',
            'other' => 'Other',
        ];

        return view('livewire.screens.diet-form', ['options' => $options]);
    }
}
