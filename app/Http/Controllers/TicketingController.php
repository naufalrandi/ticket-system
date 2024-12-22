<?php

namespace App\Http\Controllers;

use App\Models\Ticketing;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TicketingController extends Controller
{
    public function index()
    {
        $ticket = Ticketing::all();
        return Inertia::render('Ticketing/Index', ['ticket' => $ticket]);
    }

    public function create()
    {
        return Inertia::render('Ticketing/Create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Ticketing::create($data);
        return redirect()->route('ticket.index');
    }

    public function edit($id)
    {
        $post = Ticketing::findOrFail($id);
        return Inertia::render('Ticketing/Edit', ['post' => $post]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $post = Ticketing::findOrFail($id);
        $post->update($data);
        return redirect()->route('ticket.index');
    }

    public function destroy($id)
    {
        $post = Ticketing::findOrFail($id);
        $post->delete();
        return redirect()->route('ticket.index');
    }
}
