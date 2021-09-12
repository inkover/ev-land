<?php

namespace App\Http\Livewire\Activity;

use App\Services\Activity\SummaryService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{

    use WithPagination;

    private SummaryService $summaryService;

    public function __construct($id = null)
    {
        $this->summaryService = resolve(SummaryService::class);
        parent::__construct($id);
    }


    public function render()
    {
        $limit = 10;
        $offset = $this->page > 1 ? ($this->page - 1) * $limit : 0;

        $data = $this->summaryService->getList($limit, $offset);

        $items = $data['items'] ?? [];
        $total = $data['total'] ?? 0;

        $paginator = new LengthAwarePaginator($items, $total, $limit, $this->page);
        return view('livewire.activity.show', ['items' => $paginator]);
    }
}
