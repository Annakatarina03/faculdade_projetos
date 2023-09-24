<?php

namespace App\Traits;

trait WithModal
{
    public function openModal($component, $params = [])
    {
        $this->dispatch('open', $component, $params)->to('component.modal');
    }

    public function closeModal()
    {
        $this->dispatch('close')->to('component.modal');
    }
}
