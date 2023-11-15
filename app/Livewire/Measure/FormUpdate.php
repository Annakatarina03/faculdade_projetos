<?php

namespace App\Livewire\Measure;

use App\Models\Measure;
use App\Traits\WithModal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

class FormUpdate extends Component
{
    use WithModal;

    public string $name;

    public Measure $measure;

    public function rules(): array
    {
        return [
            'name' => ['required', Rule::unique('measures', 'name')->ignore($this->measure->id)],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Campo obrigatório',
            'name.unique' => 'Medida já registrada',
        ];
    }


    public function update(): RedirectResponse|Redirector
    {

        $this->validate();

        $updated_measure = $this->measure->update([
            'name' => $this->name,
        ]);

        if ($updated_measure) {
            return redirect()
                ->route('admin.measures.index')
                ->with('success', 'Medida atualizada com sucesso');
        }

        return redirect()
            ->route('admin.measures.index')
            ->with('error', 'Erro na atualização da medida');
    }

    public function mount(int $id = null)
    {

        $this->measure = Measure::find($id);

        if (!$this->measure) {
            return redirect()
                ->route('admin.measures.index')
                ->with('error', 'Medida não registrada');
        }

        $this->name = $this->measure->name;
    }

    public function render(): View
    {
        return view('livewire.measure.form-update', compact(['measure']));
    }
}
