<?php

use App\Livewire\Modal;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(Modal::class)
        ->assertStatus(200);
});
