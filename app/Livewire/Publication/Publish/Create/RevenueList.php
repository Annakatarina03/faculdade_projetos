<?php

namespace App\Livewire\Publication\Publish\Create;

use App\Models\CookBook;
use App\Models\Revenue;
use App\Traits\WithModal;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class RevenueList extends Component
{
    use WithPagination;
    use WithModal;

    public mixed $publish_revenues_active = [];
    public mixed $publish_revenues = [];
    public CookBook $cookbook;

    public function mount(CookBook $cookBook = null)
    {

        $this->cookbook = $cookBook;
    }

    public function toogle(): void
    {
        $this->publish_revenues_active = $this->publish_revenues;
        $this->add();
    }

    public function add()
    {
        $name = 'publish_revenues';

        Session::remove($name);

        $publish_revenues_session_collect = collect(Session::get('publish_revenues'));
        $publish_revenues_active_collect = collect($this->publish_revenues_active);

        $revenues_keys = $publish_revenues_session_collect->merge($publish_revenues_active_collect)->unique();

        Session::put($name, $revenues_keys->toArray());
        $this->publish_revenues_active = Session::get('publish_revenues', []);
    }


    public function render()
    {

        $cookbook = $this->cookbook;
        $publications_id = $cookbook->revenues->pluck('id');

        /**
         * @var \Illuminate\Pagination\LengthAwarePaginator $revenues
         */

        $revenues = Revenue::whereNotIn('id', $publications_id)
            ->orderBy('name')
            ->paginate(5)
            ->onEachSide(0);

        return view('livewire.publication.publish.create.revenue-list', compact(['cookbook', 'revenues']));
    }
}
