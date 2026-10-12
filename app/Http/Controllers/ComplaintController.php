<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use App\Mail\ComplaintDepartmentMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ComplaintController extends Controller
{
    public function store(Request $request)
    {
        // Validate complaint form
        $request->validate([
            'category' => 'required|string|max:100',
            'description' => 'required|string',
            'evidence' => 'nullable|file|mimes:jpg,jpeg,png,mp4,mov,avi|max:20480',
            'location' => 'required|string|max:500',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'reported_at' => 'nullable|date',
        ]);

        // Generate unique complaint ID
        $complaintId = 'PX-' . date('Ymd') . '-' . strtoupper(
            substr(uniqid(), -6)
        );

        // Upload evidence if available
        $evidencePath = null;

        if ($request->hasFile('evidence')) {
            $evidencePath = $request->file('evidence')
                ->store('complaints', 'public');
        }


       
// Automatically assign department
$departments = [
    'road' => 'Road Department',
    'garbage' => 'Sanitation Department',
    'water' => 'Water Department',
    'street_light' => 'Electricity Department',
    'traffic' => 'Traffic Department',
    'other' => 'Municipal Administration',
];

$department = $departments[$request->category]
    ?? 'Municipal Administration';



        // Create complaint
        Complaint::create([
            'complaint_id' => $complaintId,

            'user_id' => auth()->id(),

            'category' => $request->category,

            'description' => $request->description,

            'evidence' => $evidencePath,

            'location' => $request->location,

            'latitude' => $request->latitude,

            'longitude' => $request->longitude,

            'reported_at' => $request->reported_at,

            'priority' => 'Pending',

            'status' => 'Submitted',

            'department' => $department,
        ]);

        // Redirect after successful submission
        return redirect('/dashboard')
            ->with(
                'success',
                'Complaint submitted successfully. Complaint ID: ' . $complaintId
            );


            
$departmentEmail = config(
    'services.departments.' . $request->category
);

if ($departmentEmail) {
    try {
        Mail::to($departmentEmail)->send(
            new ComplaintDepartmentMail(
                Complaint::where('complaint_id', $complaintId)->firstOrFail()
            )
        );
    } catch (\Throwable $e) {
        Log::error('Problem-X department email failed', [
            'complaint_id' => $complaintId,
            'error' => $e->getMessage(),
        ]);
    }
}

    }
}