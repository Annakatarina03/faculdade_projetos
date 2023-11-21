<?php

namespace App\Livewire\Office;

use App\Models\Office;
use App\Traits\WithModal;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Features\SupportRedirects\Redirector;

class FormCreate extends Component
{
    use WithModal;

    public string $name;

    public ?string $description = null;

    public function rules(): array
    {
        return
            [
                'name' => ['required', 'unique:positions,name']
            ];
    }

    public function messages(): array
    {
        return
            [
                'name.required' => 'Campo obrigatório',
                'name.unique' => 'Cargo já registrado',
            ];
    }

    public function create(): RedirectResponse|Redirector
    {
        $this->validate();

        /**
         * @var Office $office
         */

        $office = Office::create([
            'name' => $this->name,
            'description' => $this->description,
            'slug' => Str::slug($this->name)
        ]);

        if ($office) {
            return redirect()
                ->route('admin.positions.index')
                ->with('success', 'Cargo registrado com sucesso');
        }

        return redirect()
            ->route('admin.positions.index')
            ->with('error', 'Erro no registro do cargo');
    }

    public function render(): View
    {
        return view('livewire.office.form-create');
    }
}
