<?php

namespace App\Livewire\Pages\Dashboard\Person;

use App\Livewire\Forms\PersonForm;
use App\Models\Person;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Add Person')]
class Create extends Component
{
    public PersonForm $form;

    public function store()
    {
        // dd($this->form);
        $this->validate();
        // dd($this->getErrorBag());


        Person::create([
            'name' => $this->form->name,
            'user_type' => $this->form->user_type,
            'begin_time' => $this->form->begin_time,
            'end_time' => $this->form->end_time,
            'note' => $this->form->note,
        ]);

        $this->form->reset();


        session()->flash('success', 'New Person Added Successfully');
        return $this->redirect('/dashboard/person', navigate: true);

        // return back()->with('success', 'Berhasil Menambahkan Person Baru');
    }

    public function render()
    {
        $types = ['normal', 'visitor', 'maintenance'];
        return view('livewire.pages.dashboard.person.create', compact('types'));
    }
}
