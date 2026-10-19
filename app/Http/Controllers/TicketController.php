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


}
