<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use App\Models\TicketReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index(Request $request){
        $tickets = Ticket::paginate(10);

        return view('agent.index', ['tickets'=>$tickets]);
    }

    public function create()
    {
        return view('customer.createTicket');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ticket_name' => 'required',
            'description' => 'required',
        ]);

        $ticket = Ticket::create([
            'user_id' => Auth::guard('web')->user()->id,
            'name' => $validatedData['ticket_name'],
            'problem_description' => $validatedData['description'],
            'status' => false,
            'reference' => uniqid(),
        ]);
        return redirect()->route('customer.tickets');
    }

    public function reply(Request $request, $ticketId)
    {
        $validatedData = $request->validate([
            'reply_message' => 'required',
        ]);

        $ticket = Ticket::findOrFail($ticketId);

        $reply = TicketReply::create([
            'ticket_id' => $ticket->id,
            'reply_message' => $validatedData['reply_message'],
        ]);
    }

}
