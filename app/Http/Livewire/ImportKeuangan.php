<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ImportKeuangan extends Component
{
    public $select;
    public function render()
    {
        return view('livewire.import-keuangan');
    }
}
