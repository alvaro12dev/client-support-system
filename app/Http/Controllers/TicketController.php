<?php

namespace App\Http\Controllers;

use App\Models\Ticket;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with(['customer', 'category'])
            ->latest()
            ->paginate(10);

        return view('tickets.index', compact('tickets'));
    }
}
