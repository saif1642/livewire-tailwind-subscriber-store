<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subscriber;

class LandingPage extends Component
{
    public $email = 'test@example.com';

    public function subscribe(){
        //\Log::debug($this->email);
        $subscriber = Subscriber::create([
            'email' => $this->email
        ]);
        $this->reset('email');
    }

    public function render()
    {
        return view('livewire.landing-page');
    }
}
