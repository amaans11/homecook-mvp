<?php

namespace App\Http\Livewire\Screens;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ServiceFrequencyForm extends Component
{
    public string $serviceFrequency = '';

    protected $rules = [
        'serviceFrequency' => ['required', 'string'],
    ];

    public function mount()
    {
        $this->serviceFrequency = Auth::user()->data->get('serviceUsageFrequency', '');
    }

    public function submit()
    {
        $this->validate();

        $user = Auth::user();
        $user->data->put('serviceUsageFrequency', $this->serviceFrequency);
        $user->data->put('hurdle_process', 'done');
        $user->save();

        $user->subscribeNewsletter();

        return redirect()->route('surveyCompleted');
    }

    public function render()
    {
        $options = [
            '< 1 / month' => '< 1 / month',
            '1 / month' => '1 / month',
            '2 / month' => '2 / month',
            '3 / month' => '3 / month',
            '4 / month' => '4 / month',
            '5+ / month' => '5+ / month',
        ];

        return view('livewire.screens.service-frequency-form', ['options' => $options]);
    }
}
