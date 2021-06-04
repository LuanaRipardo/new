<?php

namespace App\Observers;

use App\Models\Contact;
use App\Support\MailService;

class ContactObserver
{
    public function created(Contact $contact)
    {
        $mail = new MailService();
        $mail->sendMailContact($contact->name, $contact->email, $contact->phone, $contact->message);
    }
}
