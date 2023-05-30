<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use App\Models\TicketReply;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SupportAgentController extends Controller
{
    public function index(Request $request){
        $tickets = Ticket::with('user')->where(['status'=> 0])->paginate(10);

        return view('agent.index', ['tickets'=>$tickets]);
    }

    public function search(Request $request)
    {
        $customerName = $request->input('customer_name');

        $tickets = Ticket::with('user')
                ->whereHas('user', function ($query) use ($customerName) {
                    $query->where('name', 'LIKE', "%{$customerName}%");
                })
                ->paginate(10);

        return view('agent.index', compact('tickets'));
    }

    public function showDetails($id)
    {
        $ticket = Ticket::with('user')->findOrFail($id);

        return view('agent.Details', compact('ticket'));
    }

    public function reply(Request $request)
    {
        $ticketId = $request->route('id');
        $message = $request->reply;

        TicketReply::create([
            'ticket_id' => $ticketId,
            'reply_message' => $message
        ]);

        $replies = TicketReply::where('ticket_id', $ticketId)->get();
        return back()->with('replies', $replies);
    }

}
