<?php

namespace App\Livewire;
use Livewire\Attributes\On;

use Livewire\Component;

class SampleTest extends Component
{
    public function render()
    {
        return view('livewire.sample-test');
    }

    #[On('echo:sampleChannel, Test')]
    public function dump()
    {
        dd('Dump from livewire componente');
    }

}
