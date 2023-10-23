<?php

namespace App\Livewire\Office;

use App\Models\Office;
use App\Traits\WithModal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Features\SupportRedirects\Redirector;

class FormUpdate extends Component
{
    use WithModal;

    public string $name;

    public ?string $description;

    public Office $office;

    public function rules(): array
    {
        return [
            'name' => ['required', Rule::unique('positions', 'name')->ignore($this->office->id)],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Campo obrigatório',
            'name.unique' => 'Cargo já registrado',
        ];
    }


    public function update(): RedirectResponse|Redirector
    {

        $this->validate();

        $updated_office = $this->office->update([
            'name' => $this->name,
            'description' => $this->description,
            'slug' => Str::slug($this->name)
        ]);

        if ($updated_office) {
            return redirect()
                ->route('admin.positions.index')
                ->with('success', 'Cargo atualizado com sucesso');
        }

        return redirect()
            ->route('admin.positions.index')
            ->with('error', 'Erro na atualização do cargo');
    }

    public function mount($id = null)
    {

        $office = Office::find($id);
        if (!$office) {
            return redirect()
                ->route('admin.positions.index')
                ->with('error', 'Cargo não registrado');
        }

        $this->office = $office;
        $this->name = $office->name;
        $this->description = $office->description;
    }

    public function render(): View
    {
        $office = $this->office;
        return view('livewire.office.form-update', compact(['office']));
    }
}
