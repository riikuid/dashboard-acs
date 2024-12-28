<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class AccessControlForm extends Form
{
    #[Validate('required|min:3')]
    public $identity;

    #[Validate('required|min:8')]
    public $ip_address;

    #[Validate('required')]
    public $is_active = false;

    public $note;
}
