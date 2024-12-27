<?php

namespace App\Livewire\Pages\Dashboard\Person;

use App\Models\Person;
use Livewire\Attributes\Title;
use Livewire\Component;
use Yajra\DataTables\Facades\DataTables;

#[Title('Person')]
class Index extends Component

{
    public function render()
    {
        return view('livewire.pages.dashboard.person.index');
    }
}
