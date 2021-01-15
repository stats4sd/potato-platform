<?php

namespace App\Mail;

use App\Models\DataMap;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewVariableSpottedEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $variable;
    public $dataMap;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Array $variable, DataMap $dataMap)
    {
        //
        $this->variable = $variable;
        $this->dataMap = $dataMap;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        dd('email');
        return $this->from("no-reply@stats4sd.org")
        ->subject('Yanapai Platform: New Variable Spotted!!')
            ->markdown('emails.new_variable');
   
    }
}