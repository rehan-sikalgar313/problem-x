<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Problem-X OTP</title>
</head>

<body style="margin:0; padding:0; background:#f4f7fb; font-family:Arial,sans-serif;">

    <div style="
        max-width:600px;
        margin:40px auto;
        background:white;
        padding:40px;
        border-radius:12px;
    ">

        <h1 style="color:#123b63;">
            PROBLEM-X
        </h1>

        <p style="color:#555;">
            Report. Connect. Resolve.
        </p>

        <hr>

        <h2 style="color:#222;">
            Email Verification
        </h2>

        <p style="color:#555;">
            Your Problem-X verification OTP is:
        </p>

        <div style="
            font-size:32px;
            font-weight:bold;
            letter-spacing:8px;
            color:#123b63;
            margin:30px 0;
        ">
            {{ $otp }}
        </div>

        <p style="color:#777;">
            This OTP is valid for <strong>10 minutes</strong>.
        </p>

        <p style="color:#777;">
            If you did not request this OTP, please ignore this email.
        </p>

        <hr>

        <p style="font-size:13px; color:#999;">
            Problem-X Civic Complaint Management System
        </p>

    </div>

</body>
</html>