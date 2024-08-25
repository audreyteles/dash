<?php

namespace App\Livewire;

use App\Models\Card;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class Cards extends Component
{
    use withPagination;

    public $search = '';
    public int $tag = 0;

    public function render()
    {
        if ($this->tag != 0) {
            return view('livewire.cards')->with(['cards'=> Card::where('name','ilike', $this->search."%")->where('tag_id', "=", $this->tag)->paginate(12), 'tags' =>Tag::all()]);
        }
        else{
            return view('livewire.cards')->with(['cards'=> Card::where('name','ilike', $this->search."%")->with('tag')->paginate(12), 'tags' =>Tag::all()]);
        }
    }
}
