<?php

namespace App\Livewire\Pages\Dashboard\AccessControl;

use App\Models\AccessControl;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'id'; // Default kolom sorting
    public $sortDirection = 'asc'; // Arah sorting

    protected $paginationTheme = 'custom-pagination';

    public function updatingSearch()
    {
        $this->resetPage(); // Reset pagination saat mencari
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function render()
    {
        // $today = Carbon::now();
        $data = AccessControl::query()
            ->where('identity', 'like', '%' . $this->search . '%') // Ganti dengan kolom pencarian Anda
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.pages.dashboard.access-control.index', ['data' => $data]);
    }
    // public function render()
    // {
    //     return view('livewire.pages.dashboard.person.index');
    // }
}
