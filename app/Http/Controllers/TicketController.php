<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Category;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with(['customer', 'category'])
            ->latest()
            ->paginate(10);

        return view('tickets.index', compact('tickets'));
    }

    
    public function create()
{
    $customers = Customer::orderBy('name')->get();
    $categories = Category::orderBy('name')->get();

    return view('tickets.create', compact('customers', 'categories'));
}

    
public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'customer_id' => 'required|exists:customers,id',
        'category_id' => 'required|exists:categories,id',
        'priority' => 'required|in:low,medium,high',
    ]);

    $validated['status'] = 'open';

    Ticket::create($validated);

    return redirect()
        ->route('tickets.index')
        ->with('success', 'Ticket creado correctamente.');
}


public function show(Ticket $ticket)
{
    $ticket->load(['customer', 'category']);

    return view('tickets.show', compact('ticket'));
}


public function edit(Ticket $ticket)
{
    return view('tickets.edit', compact('ticket'));
}


public function update(Request $request, Ticket $ticket)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'status' => 'required|in:open,in_progress,closed',
        'priority' => 'required|in:low,medium,high',
    ]);

    $ticket->update($validated);

    return redirect()
        ->route('tickets.show', $ticket)
        ->with('success', 'Ticket actualizado correctamente.');
}


}
