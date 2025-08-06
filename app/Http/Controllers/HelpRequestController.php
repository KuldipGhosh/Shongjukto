<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HelpRequest;


class HelpRequestController extends Controller
{
    public function showForm()
    {
        return view('help_request');
    }
    public function beneficiaryRequests()
{
    $userId = session('user_id');

    // Fetch help requests submitted by the logged-in beneficiary
    $requests = HelpRequest::where('user_id', $userId)->orderBy('created_at', 'desc')->get();

    return view('beneficiary_requests', compact('requests'));
}

    public function submit(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'description' => 'nullable|max:1000',
        ]);

        HelpRequest::create([
            'user_id' => session('user_id'), // from login session
            'category' => $request->category,
            'description' => $request->description,
            'status' => 'pending', // default status
        ]);

        return back()->with('success', 'Help request submitted successfully!');
    }
    public function myRequests()
    {
        $userId = session('user_id');

        $requests = HelpRequest::where('user_id', $userId)->get();

        return view('my_requests', compact('requests'));
    }
}
