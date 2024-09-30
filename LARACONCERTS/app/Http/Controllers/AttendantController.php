<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendant;
use Illuminate\Support\Facades\Auth;

class AttendantController extends Controller
{
    public function index()
    {
        $attendants = Attendant::all();
        return view('attendants.create', compact('attendants'));
    }

    // Create form
    public function create()
    {
        return view('attendants.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'concert_name' => 'required|string',
            'full_name' => 'required|string',
            'email' => 'required|email|unique:attendants',
            'contact_no' => 'nullable|string',
            'address' => 'required|string',
        ]);

        Attendant::create($request->except(['_token']));

        return redirect("/")->with('message', 'Attendant created successfully.');

    }

    // View Attendant
    public function manage() {
        $attendants = Attendant::all();
        return view('attendants.viewAttendant', compact('attendants'));
    }

    // Show Edit Form
    public function edit(Attendant $attendant){
        return view('attendants.editAttendant', ['attendant' => $attendant]);
    }

    // Update Attendant Data
    public function update(Request $request, Attendant $attendant){
        $validateform = $request->validate([
            'concert_name' => 'required|string',
            'full_name' => 'required|string',
            'email' => 'required|email',
            'contact_no' => 'nullable|string',
            'address' => 'required|string',
        ]);

        $attendant->update($validateform);
        // Attendant::$attendant->update($request->except(['_token']));

        return redirect('/attendants/viewAttendant')->with('message', 'Attendant updated successfully!');

    }
}