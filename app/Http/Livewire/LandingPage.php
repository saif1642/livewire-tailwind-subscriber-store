<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subscriber;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Notifications\VerifyEmail;

class LandingPage extends Component
{
    public $email = 'test@example.com';

    protected $rules = [
        'email' => 'required|email:filter|unique:subscribers,email'
    ];

    public function subscribe(){
        //\Log::debug($this->email);
        $this->validate();

        DB::transaction(function() {

            $subscriber = Subscriber::create([
                'email' => $this->email
            ]);
            $notification = new VerifyEmail;
            $subscriber->notify($notification);

        }, $deadLockRetries = 5);

        $this->reset('email');
    }

    public function render()
    {
        return view('livewire.landing-page');
    }
}
