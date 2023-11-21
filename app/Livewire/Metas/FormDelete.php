<?php

namespace App\Livewire\Metas;

use App\Models\SystemParameter;
use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;
use App\Traits\WithModal;
use Livewire\Component;

class FormDelete extends Component
{
    use WithModal;
  
    public SystemParameter $metas;

    public function mount(int $id = null): void
    {
        $this->metas = SystemParameter::where('month_production',$id);
    }

    public function delete(SystemParameter $metas): RedirectResponse|Redirector
    {

        if (!$metas) {
            return redirect()
                ->route('metas')
                ->with('error', 'metas não registradas');
        }
      

        $delete_metas = $metas->delete();

        if ($delete_metas) {
            return redirect()
                ->route('metas')
                ->with('success', 'metas excluído com sucesso');
        }

        return redirect()
            ->route('metas')
            ->with('error', 'Erro na exclusão das metas');
    }

    public function render()
    {
        return view('livewire.metas.form-delete');
    }
}
