<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HelpRequest;

class VolunteerController extends Controller
{
    // Show all pending requests
    public function showRequests()
    {
        $requests = HelpRequest::where('status', 'pending')->get();
        return view('volunteer.requests', compact('requests'));
    }

    // Accept a pending request
    public function acceptRequest($id)
    {
        $request = HelpRequest::findOrFail($id);

        if ($request->status !== 'pending') {
            return back()->with('error', 'Request is already accepted or completed.');
        }

        $request->status = 'accepted';
        $request->save();

        return back()->with('success', 'Request accepted successfully!');
    }

    // Decline a pending request
    public function declineRequest($id)
    {
        $request = HelpRequest::findOrFail($id);

        if ($request->status !== 'pending') {
            return back()->with('error', 'Request is already processed.');
        }

        $request->status = 'declined';
        $request->save();

        return back()->with('success', 'Request declined successfully!');
    }
}
