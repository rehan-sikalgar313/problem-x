
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Problem-X Complaint</title>
</head>
<body>
    <h2>New Complaint Received - Problem-X</h2>

    <p><strong>Complaint ID:</strong>
        {{ $complaint->complaint_id }}</p>

    <p><strong>Category:</strong>
        {{ $complaint->category }}</p>

    <p><strong>Description:</strong>
        {{ $complaint->description }}</p>

    <p><strong>Location:</strong>
        {{ $complaint->location }}</p>

    <p><strong>Reported At:</strong>
        {{ $complaint->reported_at }}</p>

    <p><strong>Status:</strong>
        {{ $complaint->status }}</p>

    <p>Please review this complaint through the authorized
       Problem-X administration process.</p>
</body>
</html>
