<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PersonForm extends Form
{
    #[Validate('required|min:3')]
    public $name;

    #[Validate('required')]
    public $user_type;

    #[Validate('required')]
    public $begin_time;

    #[Validate('required')]
    public $end_time;

    public $note;
}
