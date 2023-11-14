<?php

namespace App\Livewire\CookBook\MyCookBooks;

use App\Models\CookBook;
use App\Models\Employee;
use App\Traits\WithModal;
use Illuminate\View\View;
use Livewire\Component;
use Faker\Factory as Faker;
use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;

class FormCreate extends Component
{

    use WithModal;

    public string $title;

    public string $isbn;

    public string $editor;

    public function rules(): array
    {
        return
            [
                'title' => ['required', 'unique:cookbooks,title'],
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

    public function create(): RedirectResponse|Redirector
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
            ->create([
                'title' => $this->title,
                'isbn' => $this->isbn,
            ]);

        if ($cookbook) {
            return redirect()
                ->route('cookbook.my-cookbooks')
                ->with('success', 'Livro de receitas registrado com sucesso');
        }

        return redirect()
            ->route('cookbook.my-cookbooks')
            ->with('error', 'Erro no registro do livro de receitas');
    }

    public function  mount(): void
    {
        $faker = Faker::create();

        $this->isbn = $faker->isbn13();
        $this->editor = auth()->user()->name;
    }

    public function render(): View
    {
        return view('livewire.cook-book.my-cook-books.form-create');
    }
}
