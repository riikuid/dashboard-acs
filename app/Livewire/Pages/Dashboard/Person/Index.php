<?php

namespace App\Livewire\Pages\Dashboard\Person;

use Livewire\Attributes\Title;
use App\Models\Person;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Person')]
class Index extends Component

{
    use WithPagination;

    public $search = '';
    public $sortField = 'id'; // Default kolom sorting
    public $sortDirection = 'asc'; // Arah sorting

    public $modalData = null;
    public $showModal = false;

    protected $paginationTheme = 'custom-pagination';

    // Method untuk membuka modal dan mengisi data
    public function openModal($personId)
    {
        $person = Person::find($personId);

        if (!$person) {
            session()->flash('error', 'Person not found.');
            return;
        }

        $this->modalData = $person;
        $this->showModal = true;
    }


    public function closeModal()
    {
        $this->modalData = null;
        $this->showModal = false;
    }


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

        return view('livewire.pages.dashboard.person.index', ['data' => $data]);
    }
    // public function render()
    // {
    //     return view('livewire.pages.dashboard.person.index');
    // }
}
