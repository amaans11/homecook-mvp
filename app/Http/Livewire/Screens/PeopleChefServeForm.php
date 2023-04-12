<?php

namespace App\Http\Livewire\Screens;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PeopleChefServeForm extends Component
{
    public string $peopleChefServe = '';

    protected $rules = [
        'peopleChefServe' => ['required', 'string'],
    ];

    public function mount()
    {
        $this->peopleChefServe = Auth::user()->data->get('peopleChefServe', '');
    }

    public function submit()
    {
        $this->validate();

        $user = Auth::user();
        $user->data->put('peopleChefServe', $this->peopleChefServe);
        $user->save();

        return redirect()->route('mealsForm');
    }

    public function render()
    {
        $options = [
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
            '6+' => '6+',
        ];

        return view('livewire.screens.people-chef-serve-form', ['options' => $options]);
    }
}
