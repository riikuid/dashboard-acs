<?php

namespace App\Livewire\Pages\Dashboard\Person;

use App\Models\Person;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class PersonTable extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'id'; // Default kolom sorting
    public $sortDirection = 'asc'; // Arah sorting

    protected $paginationTheme = 'custom-pagination'; // Gunakan tema bootstrap (opsional)

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
        $today = Carbon::now();
        $data = Person::query()
            ->select('*', DB::raw("CASE WHEN end_time > '$today' THEN 'Active' ELSE 'Expired' END AS status"))
            ->where('name', 'like', '%' . $this->search . '%') // Ganti dengan kolom pencarian Anda
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.pages.dashboard.person.person-table', ['data' => $data]);
    }
}
