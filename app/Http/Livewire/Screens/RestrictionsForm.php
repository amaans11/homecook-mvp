<?php

namespace App\Http\Livewire\Screens;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RestrictionsForm extends Component
{
    public string $haveRestrictions = '';
    public array $restrictions = [];

    protected $rules = [
        'haveRestrictions' => ['required'],
        'restrictions' => ['exclude_if:haveRestrictions,false', 'required', 'array'],
        'restrictions.*' => ['exclude_if:haveRestrictions,false', 'required', 'string'],
    ];

    public function mount()
    {
        $this->restrictions = Auth::user()->data->get('restrictions', []);
        $this->haveRestrictions = is_array(Auth::user()->data->get('restrictions')) ? (count($this->restrictions) ? 'true' : 'false') : '';
    }

    public function submit()
    {
        $this->validate();

        $user = Auth::user();
        $user->data->put('restrictions', $this->haveRestrictions === 'true' ? $this->restrictions : []);
        $user->save();

        return redirect()->route('favoriteCuisineForm');
    }

    public function render()
    {
        $options = [
            'gluten' => 'Gluten',
            'halal' => 'Halal',
            'sugar' => 'Sugar',
            'seafood' => 'Seafood',
            'nuts' => 'Nuts',
            'lactose' => 'Lactose',
            'sodium' => 'Sodium',
            'other' => 'Other',
        ];

        return view('livewire.screens.restrictions-form', ['options' => $options]);
    }
}
