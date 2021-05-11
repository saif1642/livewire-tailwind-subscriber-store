<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subscriber;

class Subscribers extends Component
{
    public $search;
    public function remove(Subscriber $subscriber){
        $subscriber->delete();
    }

    public function render()
    {
        $subscriber = Subscriber::where('email','like',"%{$this->search}%")->get();
        return view('livewire.subscribers')->with([
            'subscribers' => $subscriber
        ]);;
    }
}
