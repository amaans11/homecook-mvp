<?php

namespace App\Http\Livewire\Screens;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChefForm extends Component
{
    public string $budget = '';

    protected $rules = [
        'budget' => ['required', 'string'],
    ];

    public function mount()
    {
        $this->budget = Auth::user()->data->get('budgetForIngredients', '');
    }

    public function submit()
    {
        $this->validate();


        $user = Auth::user();
        $user->data->put('budgetForIngredients', $this->budget);
        $user->save();

        return redirect()->route('serviceFrequencyForm');
    }

    public function render()
    {
        $options = [
            'economical' => ['title' => 'Economical', 'description' => 'Amazing taste on the budget', 'price' => '3.50'],
            'standard' => ['title' => 'Standard', 'description' => 'Better cuts and ingredient variation', 'price' => '5.50'],
            'fully_organic' => ['title' => 'Fully Organic', 'description' => 'When you want it all bio', 'price' => '7.50'],
        ];

        return view('livewire.screens.chef-form', ['options' => $options]);
    }
}
