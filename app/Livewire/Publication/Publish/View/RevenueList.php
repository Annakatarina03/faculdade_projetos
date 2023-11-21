<?php

namespace App\Livewire\Publication\Publish\View;

use App\Models\CookBook;
use App\Traits\WithModal;
use Livewire\Component;
use Livewire\WithPagination;

class RevenueList extends Component
{
    use WithPagination;
    use WithModal;

    public mixed $publish_revenues_active = [];
    public mixed $publish_revenues = [];
    public CookBook $cookbook;

    public function mount(CookBook $cookbook = null, $revenues)
    {
        $this->publish_revenues = $revenues;
        $this->cookbook = $cookbook;
    }

    public function render()
    {

        $cookbook = $this->cookbook;
        $publications_id = $cookbook->revenues->pluck('id');

        $revenues = $cookbook->revenues()
            ->wherePivot('cookbook_id', $this->cookbook->id)
            ->paginate(5);

        return view('livewire.publication.publish.view.revenue-list', compact(['cookbook', 'revenues']));
    }
}
