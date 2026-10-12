<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register - Problem-X</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #eef5fb;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .register-container {
            width: 100%;
            max-width: 460px;
            background: #ffffff;
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
        }

        .logo {
            text-align: center;
            margin-bottom: 10px;
        }

        .logo h1 {
            color: #123d70;
            font-size: 32px;
        }

        .subtitle {
            text-align: center;
            color: #777;
            margin-bottom: 28px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: 600;
            color: #333;
        }

        input {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #ccd6e0;
            border-radius: 9px;
            font-size: 15px;
            outline: none;
            transition: 0.2s;
        }

        input:focus {
            border-color: #0870c9;
            box-shadow: 0 0 0 3px rgba(8, 112, 201, 0.10);
        }

        .password-box {
            position: relative;
        }

        .show-password {
            position: absolute;
            right: 12px;
            top: 13px;
            cursor: pointer;
            color: #0870c9;
            font-size: 13px;
        }

        .terms {
            display: flex;
            align-items: flex-start;
            gap: 9px;
            margin: 18px 0;
            font-size: 14px;
            color: #555;
        }

        .terms input {
            width: auto;
            margin-top: 3px;
        }

        .terms a {
            color: #0870c9;
            text-decoration: none;
        }

        .otp-btn {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 9px;
            background: #0870c9;
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
        }

        .otp-btn:hover {
            background: #065a9f;
        }

        .login-link {
            text-align: center;
            margin-top: 22px;
            color: #666;
        }

        .login-link a {
            color: #0870c9;
            font-weight: 600;
            text-decoration: none;
        }

        .error {
            color: #d93025;
            font-size: 13px;
            margin-top: 5px;
        }

        @media (max-width: 500px) {
            .register-container {
                padding: 25px 20px;
            }
        }
    </style>
</head>

<body>

<div class="register-container">

    <div class="logo">
        <h1>Problem-X</h1>
    </div>

    <p class="subtitle">
        Create your Citizen Account
    </p>

    <form method="POST" action="/register" id="registerForm">

        @csrf

        <!-- Full Name -->
        <div class="form-group">
            <label for="full_name">Full Name</label>

            <input
                type="text"
                id="full_name"
                name="full_name"
                placeholder="Enter your full name"
                value="{{ old('full_name') }}"
                required
            >

            @error('full_name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>


        <!-- Gmail / Mobile -->
        <div class="form-group">
            <label for="contact">Gmail / Mobile Number</label>

            <input
                type="text"
                id="contact"
                name="contact"
                placeholder="example@gmail.com or 9876543210"
                value="{{ old('contact') }}"
                required
            >

            @error('contact')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>


        <!-- Password -->
        <div class="form-group">

            <label for="password">Password</label>

            <div class="password-box">

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Create password"
                    required
                >

                <span
                    class="show-password"
                    onclick="togglePassword('password', this)"
                >
                    Show
                </span>

            </div>

            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror

        </div>


        <!-- Confirm Password -->
        <div class="form-group">

            <label for="password_confirmation">
                Confirm Password
            </label>

            <div class="password-box">

                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Confirm password"
                    required
                >

                <span
                    class="show-password"
                    onclick="togglePassword('password_confirmation', this)"
                >
                    Show
                </span>

            </div>

        </div>


        <!-- Terms -->
        <div class="terms">

            <input
                type="checkbox"
                id="terms"
                name="terms"
                required
            >

            <label for="terms">
                I agree to the
                <a href="#">Terms & Conditions</a>
                of Problem-X.
            </label>

        </div>


        <!-- Send OTP -->
        <button type="submit" class="otp-btn">
            Send OTP
        </button>

    </form>


    <div class="login-link">

        Already have an account?

        <a href="/login">
            Login
        </a>

    </div>

</div>


<script>

function togglePassword(inputId, element) {

    const input = document.getElementById(inputId);

    if (input.type === "password") {

        input.type = "text";
        element.textContent = "Hide";

    } else {

        input.type = "password";
        element.textContent = "Show";

    }

}

</script>

</body>

</html>