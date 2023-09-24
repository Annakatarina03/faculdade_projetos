<?php

namespace App\Livewire\Component;

use Livewire\Component;

class Modal extends Component
{
    public $show = false;
    public $component;
    public $params = [];

    protected $listeners = ['open', 'close'];

    public function open($component, $params = []): void
    {
        $this->show = true;
        $this->component = $component;
        $this->params = $params;
    }

    public function close(): void
    {
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.component.modal');
    }
}
