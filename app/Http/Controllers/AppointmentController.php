<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function create()
    {
        return view('appointments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'clinic_name' => 'required|string|max:255',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required',
        ]);

        Appointment::create([
            'beneficiary_id' => session('user_id'),
            'clinic_name' => $request->clinic_name,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'status' => 'booked',
        ]);

        return back()->with('success', 'Appointment booked');
    }

    public function my()
    {
        $appointments = Appointment::where('beneficiary_id', session('user_id'))->latest()->get();
        return view('appointments.my', compact('appointments'));
    }
}


