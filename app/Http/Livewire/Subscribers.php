<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subscriber;

class Subscribers extends Component
{
    public function delete(Subscriber $subscriber){
        $subscriber->delete();
    }

    public function render()
    {
        return view('livewire.subscribers')->with([
            'subscribers' => Subscriber::all()
        ]);;
    }
}
