<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Storage;

class AdminClientController extends Controller
{
    // Display a list of clients
    public function index()
    {
        $clients = Client::all();
        return view('admin.clients.index', compact('clients'));
    }

    // Show the form to create a new client
    public function create()
    {
        return view('admin.clients.create');
    }

    // Store a new client
    public function store(Request $request)
    {
        $request->validate([
            'client_title_en' => 'required|string|max:255',
            'client_title_ar' => 'nullable|string|max:255',
            'client_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $client = new Client();
        $client->client_title_en = $request->client_title_en;
        $client->client_title_ar = $request->client_title_ar;

        // Handle image upload
        if ($request->hasFile('client_image')) {
            $client->client_image = $request->file('client_image')->store('client_images', 'public');
        }

        $client->save();

        return redirect()->route('admin.clients.index')->with('status-success', 'Client created successfully');
    }

    // Show the form to edit a client
    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    // Update an existing client
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'client_title_en' => 'required|string|max:255',
            'client_title_ar' => 'nullable|string|max:255',
            'client_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $client->client_title_en = $request->client_title_en;
        $client->client_title_ar = $request->client_title_ar;

        // Handle image update
        if ($request->hasFile('client_image')) {
            // Delete the old image if it exists
            if ($client->client_image) {
                Storage::delete('public/' . $client->client_image);
            }

            // Store the new image
            $client->client_image = $request->file('client_image')->store('client_images', 'public');
        }

        $client->save();

        return redirect()->route('admin.clients.index')->with('status-success', 'Client updated successfully');
    }

    // Delete a client
    public function destroy(Client $client)
    {
        // Delete the image if it exists
        if ($client->client_image) {
            Storage::delete('public/' . $client->client_image);
        }

        $client->delete();

        return redirect()->route('admin.clients.index')->with('status-success', 'Client deleted successfully');
    }
}
