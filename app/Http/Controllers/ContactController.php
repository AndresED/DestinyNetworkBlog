<?php

namespace DestinyH\Http\Controllers;

use Illuminate\Http\Request;
use DestinyH\Ticket;

class ContactController extends Controller
{
    public function index()
    {
        return view('portal.views.contact');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'ticket_email' => 'email|required',
            'ticket_subject' => 'required',
            'ticket_content' => 'required',
            'g-recaptcha-response' => 'required|recaptcha',
        ]);

        try {
            $ticket = new Ticket();
            $ticket->ticket_email = $request->ticket_email;
            $ticket->ticket_subject = $request->ticket_subject;
            $ticket->ticket_content = $request->ticket_content;
            $ticket->save();
            $request->session()->flash('ticket_sent', 'success');
        }
        catch (\Exception $e)
        {
            return response()->view('errors.500');
        }
        return view('portal.views.contact');
    }
}
