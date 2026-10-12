<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::latest()->get();

        return view('admin.complaints', compact('complaints'));
    }

    public function updateStatus(Request $request, Complaint $complaint)
    {
        $validated = $request->validate([
            'status' => [
                'required',
                Rule::in([
                    'Submitted',
                    'Analyzed',
                    'Under Review',
                    'Genuine',
                    'Sent to Department',
                    'In Progress',
                    'Resolved',
                    'Rejected',
                ]),
            ],
        ]);

        $complaint->update([
            'status' => $validated['status'],
        ]);

        return back()->with('success', 'Complaint status updated successfully.');
    }
}
