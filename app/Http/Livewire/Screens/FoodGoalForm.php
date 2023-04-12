<?php

namespace App\Http\Livewire\Screens;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FoodGoalForm extends Component
{
    public array $goals = [];

    protected $rules = [
        'goals' => ['required', 'array', 'max:3'],
        'goals.*' => ['required', 'string'],
    ];

    public function mount()
    {
        $this->goals = Auth::user()->data->get('foodGoals', []);
    }

    public function submit()
    {
        $this->validate();

        $user = Auth::user();
        $user->data->put('foodGoals', $this->goals);
        $user->save();

        return redirect()->route('restrictionsForm');
    }

    public function render()
    {
        $options = [
            'energy_booster' => ['text' => 'Energy booster', 'icon' => asset('images/foodGoalIcons/1.png')],
            'weight_loss' => ['text' => 'Weight Loss', 'icon' => asset('images/foodGoalIcons/2.png')],
            'balance_diet' => ['text' => 'Balance Diet', 'icon' => asset('images/foodGoalIcons/4.png')],
            'anti_ageing' => ['text' => 'Anti-ageing', 'icon' => asset('images/foodGoalIcons/5.png')],
            'other' => ['text' => 'Other', 'icon' => null]
        ];

        return view('livewire.screens.food-goal-form', ['options' => $options]);
    }
}
