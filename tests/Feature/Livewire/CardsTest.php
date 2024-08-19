<?php

use App\Livewire\Cards;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(Cards::class)
        ->assertStatus(200);
});
