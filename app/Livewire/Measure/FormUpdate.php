<?php

namespace App\Livewire\Measure;

use App\Models\Measure;
use App\Traits\WithModal;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Component;

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


    public function update(): Redirector
    {

        $this->validate();

        $updated_measure = $this->measure->update([
            'name' => $this->name,
        ]);

        if ($updated_measure) {
            return redirect('admin/measures')->with('success', 'Medida atualizada com sucesso');
        }

        return redirect('admin/measures')->with('error', 'Erro na atualização da medida');
    }

    public function mount($id = null)
    {

        $measure = Measure::where('id', $id)->first();

        if (!$measure) {
            return redirect('admin/measures')->with('error', 'Medida não registrada');
        }

        $this->measure = $measure;
        $this->name = $measure->name;
    }

    public function render(): View
    {
        $measure = $this->measure;
        return view('livewire.measure.form-update', compact(['measure']));
    }
}
