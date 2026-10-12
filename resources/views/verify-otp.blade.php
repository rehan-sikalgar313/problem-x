<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Verify OTP - Problem-X</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #0b2d4d, #1769aa);
            padding: 20px;
        }

        .otp-box {
            width: 100%;
            max-width: 430px;
            background: white;
            padding: 40px;
            border-radius: 18px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.2);
            text-align: center;
        }

        .logo {
            width: 60px;
            height: 60px;
            margin: 0 auto 15px;
            border-radius: 50%;
            background: #0b2d4d;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            font-weight: bold;
        }

        h1 {
            color: #0b2d4d;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #666;
            line-height: 1.5;
            margin-bottom: 25px;
        }

        .email {
            color: #0b2d4d;
            font-weight: bold;
            word-break: break-all;
        }

        .otp-input {
            width: 100%;
            padding: 15px;
            border: 2px solid #ddd;
            border-radius: 10px;
            text-align: center;
            font-size: 24px;
            letter-spacing: 8px;
            outline: none;
            margin-bottom: 20px;
        }

        .otp-input:focus {
            border-color: #1769aa;
        }

        button {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 10px;
            background: #0b2d4d;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #1769aa;
        }

        .success {
            background: #e8f7ee;
            color: #177245;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .error {
            background: #fdecec;
            color: #b42318;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .resend {
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }

        .resend button {
            width: auto;
            padding: 0;
            margin-top: 8px;
            background: none;
            color: #1769aa;
            font-size: 14px;
            font-weight: bold;
        }

        .resend button:hover {
            background: none;
            color: #0b2d4d;
        }

        .back {
            display: block;
            margin-top: 20px;
            color: #1769aa;
            text-decoration: none;
            font-size: 14px;
        }
    </style>
</head>

<body>

<div class="otp-box">

    <div class="logo">
        PX
    </div>

    <h1>Verify Your Email</h1>

    <p class="subtitle">
        We have sent a 6-digit OTP to
        <br>

        <span class="email">
            {{ session('registration_email') }}
        </span>
    </p>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="error">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="error">
            {{ $errors->first() }}
        </div>
    @endif

    <!-- VERIFY OTP -->

    <form action="/verify-otp" method="POST">

        @csrf

        <input
            type="text"
            name="otp"
            class="otp-input"
            placeholder="000000"
            maxlength="6"
            inputmode="numeric"
            required
        >

        <button type="submit">
            Verify OTP
        </button>

    </form>


    <!-- RESEND OTP -->

    <div class="resend">

        Didn't receive the OTP?

        <form action="/resend-otp" method="POST">

            @csrf

            <button type="submit" id="resendButton">
                Resend OTP
            </button>

        </form>

    </div>


    <a href="/register" class="back">
        ← Back to Registration
    </a>

</div>

</body>
</html>