<?php

namespace App\Livewire\Office;

use App\Models\Office;
use App\Traits\WithModal;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Component;
use Illuminate\Support\Str;

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
            'description' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Campo obrigatório',
            'name.unique' => 'Cargo já registrado',
            'description.required' => 'Campo obrigatório',
        ];
    }


    public function update(): Redirector
    {

        $this->validate();

        $updated_office = $this->office->update([
            'name' => $this->name,
            'description' => $this->description,
            'slug' => Str::slug($this->name)
        ]);

        if ($updated_office) {
            return redirect('admin/positions')->with('success', 'Cargo atualizado com sucesso');
        }

        return redirect('admin/positions')->with('error', 'Erro na atualização do cargo');
    }

    public function mount($id = null)
    {

        $office = Office::where('id', $id)->first();
        if (!$office) {
            return redirect('admin/positions')->with('error', 'Cargo não registrado');
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
