<?php

use App\Livewire\Model;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(Model::class)
        ->assertStatus(200);
});
