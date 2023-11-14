<?php

namespace App\Livewire\CookBook\MyCookBooks;

use App\Models\CookBook;
use App\Models\Employee;
use App\Traits\WithModal;
use Illuminate\View\View;
use Livewire\Component;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Livewire\Features\SupportRedirects\Redirector;

class FormUpdate extends Component
{

    use WithModal;

    public string $title;

    public string $isbn;

    public string $editor;

    public CookBook $cookbook;

    public function rules(): array
    {
        return
            [
                'title' => ['required', Rule::unique('cookbooks', 'title')->ignore($this->cookbook->id)],
            ];
    }

    public function messages(): array
    {
        return
            [
                'title.required' => 'Campo obrigatório',
                'title.unique' => 'Título já registrado',
            ];
    }

    public function update(): RedirectResponse|Redirector
    {
        $this->validate();

        /**
         * @var Employee $editor
         */

        $editor = Employee::find(auth()->user()->id);

        /**
         * @var CookBook $cookbook
         */

        $cookbook = $editor->cookbooks()
            ->update([
                'title' => $this->title,
                'isbn' => $this->isbn
            ]);

        if ($cookbook) {
            return redirect()
                ->route('cookbooks.my-cookbooks')
                ->with('success', 'Livro de receitas atualizado com sucesso');
        }

        return redirect()
            ->route('cookbooks.my-cookbooks')
            ->with('error', 'Erro na atualização do livro de receitas');
    }

    public function mount(int $id = null): void
    {
        $this->cookbook = CookBook::find($id);

        $this->title = $this->cookbook->title;
        $this->isbn = $this->cookbook->isbn;
        $this->editor = $this->cookbook->employee->name;
    }

    public function render(): View
    {
        return view('livewire.cook-book.my-cook-books.form-update');
    }
}
