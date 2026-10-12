<?php

namespace App\Mail;

use App\Models\Complaint;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ComplaintDepartmentMail extends Mailable
{
    use Queueable, SerializesModels;

    public Complaint $complaint;

    public function __construct(Complaint $complaint)
    {
        $this->complaint = $complaint;
    }

    public function build()
    {
        return $this->subject(
            'New Problem-X Complaint: ' . $this->complaint->complaint_id
        )->view('emails.complaint-department');
    }
}
