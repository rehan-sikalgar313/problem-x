<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Problem-X</title>

    <style>
        /* =====================================================
           RESET
        ===================================================== */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            width: 100%;
            height: 100%;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #eef5fb;
            color: #123b68;
            overflow: hidden;
        }


        /* =====================================================
           FIXED SIDEBAR
        ===================================================== */

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;

            width: 255px;
            height: 100vh;

            background: linear-gradient(
                180deg,
                #082e57 0%,
                #073466 50%,
                #06294f 100%
            );

            color: white;

            display: flex;
            flex-direction: column;

            z-index: 1000;

            overflow: hidden;
        }


        /* =====================================================
           BRAND
        ===================================================== */

        .brand {
            padding: 22px 18px 18px;

            display: flex;
            align-items: center;
            gap: 12px;
        }

       .brand-logo {
    width: 48px;
    height: 48px;

    border-radius: 50%;

    background: white;

    display: flex;
    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    overflow: hidden;

    border: 3px solid rgba(255,255,255,0.7);
}

.brand-logo img {
    width: 100%;
    height: 100%;

    object-fit: cover;

    display: block;
}

        .brand-text h1 {
            font-size: 25px;
            line-height: 1;
            color: white;
        }

        .brand-text h1 span {
            color: #0ca5ff;
        }

        .brand-text p {
            font-size: 11px;
            margin-top: 5px;
            color: #d9ebff;
        }


        /* =====================================================
           NAVIGATION
        ===================================================== */

        .nav {
            padding: 8px 12px;

            display: flex;
            flex-direction: column;

            gap: 5px;
        }

        .nav a {
            height: 49px;

            padding: 0 15px;

            display: flex;
            align-items: center;
            gap: 15px;

            color: #edf7ff;

            text-decoration: none;

            border-radius: 8px;

            font-size: 15px;
            font-weight: 600;

            transition: 0.2s ease;
        }

        .nav a:hover {
            background: rgba(255,255,255,0.10);
        }

        .nav a.active {
            background: #087ddd;
            box-shadow: 0 5px 15px rgba(0,0,0,0.15);
        }

        .nav-icon {
            width: 23px;

            text-align: center;

            font-size: 17px;
        }


        /* =====================================================
           SIDEBAR DIVIDER
        ===================================================== */

        .sidebar-divider {
            height: 1px;

            background: rgba(255,255,255,0.18);

            margin: 8px 18px;
        }


        /* =====================================================
           SIDEBAR BOTTOM
        ===================================================== */

        .sidebar-bottom {
            margin-top: auto;

            padding: 18px;

            text-align: center;
        }

        .city-icon {
            font-size: 34px;

            margin-bottom: 8px;
        }

        .sidebar-bottom p {
            color: #d4e8fb;
            font-size: 13px;
            line-height: 1.4;
        }


        /* =====================================================
           MAIN AREA
        ===================================================== */

        .main {
            position: fixed;

            top: 0;
            right: 0;
            bottom: 0;
            left: 255px;

            overflow-y: auto;
            overflow-x: hidden;

            padding: 17px;

            background: #eef5fb;
        }


        /* =====================================================
           MAIN SCROLLBAR
        ===================================================== */

        .main::-webkit-scrollbar {
            width: 8px;
        }

        .main::-webkit-scrollbar-track {
            background: #e5edf5;
        }

        .main::-webkit-scrollbar-thumb {
            background: #9db3c8;
            border-radius: 10px;
        }


        /* =====================================================
           HERO
        ===================================================== */

        .hero {
            min-height: 370px;

            border-radius: 10px;

            padding: 42px 38px;

            background:
                linear-gradient(
                    100deg,
                    #0c3d70 0%,
                    #17639a 48%,
                    #a9bfd2 100%
                );

            display: flex;

            justify-content: space-between;
            align-items: center;

            gap: 30px;

            overflow: hidden;
        }

        .hero-content {
            max-width: 550px;
        }

        .hero-label {
            color: #d9f0ff;

            font-size: 14px;

            letter-spacing: 1px;

            margin-bottom: 12px;
        }

        .hero h2 {
            color: white;

            font-size: 47px;

            line-height: 1.08;

            margin-bottom: 18px;
        }

        .hero h2 span {
            color: #09a5ff;
        }

        .hero-description {
            color: white;

            font-size: 15px;

            line-height: 1.7;

            margin-bottom: 25px;
        }


        /* =====================================================
           HERO BUTTONS
        ===================================================== */

        .hero-buttons {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }

        .hero-btn {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            min-width: 208px;

            padding: 14px 20px;

            border-radius: 7px;

            text-decoration: none;

            font-size: 15px;

            font-weight: bold;

            transition: 0.2s ease;
        }

        .primary-btn {
            background: #0988ec;
            color: white;
        }

        .primary-btn:hover {
            background: #0074d1;
        }

        .secondary-btn {
            border: 1px solid white;
            color: white;
            background: rgba(255,255,255,0.05);
        }

        .secondary-btn:hover {
            background: white;
            color: #0b467c;
        }


        /* =====================================================
           MAP CARD
        ===================================================== */

        .map-card {
            width: 455px;

            background: white;

            border-radius: 12px;

            padding: 14px;

            box-shadow: 0 15px 35px rgba(0,0,0,0.15);

            flex-shrink: 0;
        }

        .map-title {
            display: flex;

            align-items: center;

            gap: 10px;

            font-weight: bold;

            color: #123b68;

            padding: 4px 7px 12px;
        }

        .map-layout {
            display: grid;

            grid-template-columns: 1.7fr 1fr;

            gap: 12px;
        }


        /* Fake map */

        .map {
            height: 215px;

            border-radius: 8px;

            position: relative;

            overflow: hidden;

            background: #dce9e0;
        }

        .road {
            position: absolute;

            background: white;

            height: 12px;

            width: 150%;

            transform: rotate(32deg);

            left: -30px;

            top: 70px;
        }

        .road.two {
            transform: rotate(-28deg);

            top: 130px;
        }

        .road.three {
            transform: rotate(8deg);

            top: 35px;
        }

        .marker {
            position: absolute;

            width: 19px;
            height: 19px;

            border-radius: 50%;

            box-shadow: 0 2px 5px rgba(0,0,0,.2);
        }

        .marker.red {
            background: #ff5151;
            top: 50px;
            left: 50%;
        }

        .marker.green {
            background: #19b77a;
            top: 95px;
            left: 72%;
        }

        .marker.blue {
            background: #0788ed;
            top: 160px;
            left: 55%;
        }

        .marker.yellow {
            background: #ffb216;
            top: 135px;
            left: 68%;
        }


        /* =====================================================
           MAP SIDE ISSUE
        ===================================================== */

        .map-issue {
            border: 1px solid #dbe5ee;

            border-radius: 7px;

            padding: 8px;

            overflow: hidden;
        }

        .issue-image {
            height: 70px;

            border-radius: 5px;

            background:
                linear-gradient(
                    170deg,
                    #9ba39e,
                    #666c68
                );

            margin-bottom: 8px;

            position: relative;
        }

        .pothole {
            width: 65px;
            height: 20px;

            border-radius: 50%;

            background: #252525;

            position: absolute;

            top: 28px;
            left: 35px;

            transform: rotate(-8deg);
        }

        .map-issue h4 {
            font-size: 12px;

            margin-bottom: 7px;

            color: #123b68;
        }

        .status {
            display: inline-block;

            background: #ffe3e3;

            color: #c53b3b;

            border-radius: 20px;

            padding: 4px 8px;

            font-size: 10px;

            font-weight: bold;

            margin-bottom: 8px;
        }

        .location {
            font-size: 10px;

            color: #65798c;

            margin-bottom: 9px;
        }

        .details-btn {
            display: block;

            text-align: center;

            padding: 6px;

            border: 1px solid #66aee7;

            color: #0874c8;

            border-radius: 5px;

            font-size: 10px;

            text-decoration: none;
        }


        /* =====================================================
           SECTION
        ===================================================== */

        .section {
            background: white;

            border-radius: 10px;

            padding: 22px;

            margin-top: 15px;
        }

        .section-title {
            font-size: 21px;

            color: #123b68;

            margin-bottom: 6px;
        }

        .section-subtitle {
            font-size: 13px;

            color: #55708d;

            margin-bottom: 18px;
        }


        /* =====================================================
           QUICK REPORT
        ===================================================== */

        .categories {
            display: grid;

            grid-template-columns:
                repeat(6, minmax(0, 1fr));

            gap: 16px;
        }

        .category {
            min-height: 108px;

            border: 1px solid #dce6ef;

            border-radius: 8px;

            display: flex;

            flex-direction: column;

            align-items: center;

            justify-content: center;

            text-decoration: none;

            color: #123b68;

            transition: 0.2s ease;

            padding: 12px 5px;

            text-align: center;
        }

        .category:hover {
            transform: translateY(-3px);

            box-shadow: 0 8px 20px rgba(18,59,104,.12);
        }

        .category-icon {
            width: 48px;
            height: 48px;

            border-radius: 50%;

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 22px;

            margin-bottom: 10px;
        }

        .red-icon {
            background: #ff4d57;
        }

        .green-icon {
            background: #19b879;
        }

        .blue-icon {
            background: #158eea;
        }

        .yellow-icon {
            background: #ffb21a;
        }

        .purple-icon {
            background: #7046d9;
        }

        .gray-icon {
            background: #7890a9;
        }

        .category span:last-child {
            font-size: 13px;
            font-weight: 600;
        }


        /* =====================================================
           FEATURES
        ===================================================== */

        .features {
            display: grid;

            grid-template-columns:
                repeat(4, minmax(0, 1fr));

            gap: 18px;
        }

        .feature {
            background: #f7fbff;

            border-radius: 8px;

            padding: 20px;

            min-height: 150px;
        }

        .feature-icon {
            width: 47px;
            height: 47px;

            border-radius: 50%;

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 21px;

            margin-bottom: 12px;
        }

        .feature h3 {
            font-size: 14px;

            color: #123b68;

            margin-bottom: 7px;
        }

        .feature p {
            font-size: 12px;

            color: #58728d;

            line-height: 1.5;
        }


        /* =====================================================
           HOW IT WORKS
        ===================================================== */

        .steps {
            display: grid;

            grid-template-columns:
                repeat(5, 1fr);

            gap: 20px;

            text-align: center;
        }

        .step {
            position: relative;
        }

        .step-number {
            width: 29px;
            height: 29px;

            margin: 0 auto 13px;

            border-radius: 50%;

            background: #0b88e9;

            color: white;

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 13px;

            font-weight: bold;
        }

        .step-icon {
            font-size: 25px;

            margin-bottom: 8px;
        }

        .step h4 {
            font-size: 12px;

            color: #123b68;

            margin-bottom: 6px;
        }

        .step p {
            font-size: 10px;

            color: #668098;

            line-height: 1.4;
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        .footer {
            margin-top: 15px;

            min-height: 70px;

            background: #062e57;

            color: white;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 18px 22px;

            font-size: 12px;
        }

        .footer-links {
            display: flex;

            gap: 18px;
        }

        .footer-links a {
            color: white;

            text-decoration: none;
        }

        .footer-links a:hover {
            color: #10a4ff;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 1200px) {

            .hero {
                align-items: stretch;
            }

            .map-card {
                width: 390px;
            }

            .hero h2 {
                font-size: 40px;
            }

            .categories {
                grid-template-columns:
                    repeat(3, 1fr);
            }

            .features {
                grid-template-columns:
                    repeat(2, 1fr);
            }

        }


        @media (max-width: 900px) {

            body {
                overflow: auto;
            }

            .sidebar {
                position: relative;

                width: 100%;
                height: auto;

                min-height: auto;
            }

            .nav {
                flex-direction: row;

                overflow-x: auto;
            }

            .nav a {
                min-width: 150px;
            }

            .sidebar-bottom,
            .sidebar-divider {
                display: none;
            }

            .main {
                position: relative;

                left: 0;

                width: 100%;

                overflow: visible;

                padding: 12px;
            }

            .hero {
                flex-direction: column;
            }

            .map-card {
                width: 100%;
            }

            .steps {
                grid-template-columns:
                    repeat(2, 1fr);
            }

        }


        @media (max-width: 600px) {

            .hero {
                padding: 28px 22px;
            }

            .hero h2 {
                font-size: 32px;
            }

            .hero-buttons {
                flex-direction: column;
            }

            .hero-btn {
                width: 100%;
            }

            .categories,
            .features,
            .steps {
                grid-template-columns: 1fr;
            }

            .footer {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

        }
        .success-alert {
    background: #e8f8ee;
    color: #16733b;
    border: 1px solid #b7e4c7;
    padding: 14px 18px;
    border-radius: 10px;
    margin-bottom: 18px;
    font-size: 15px;
    font-weight: 600;
}

.logout-btn {
    width: 100%;
    border: none;
    background: transparent;
    color: inherit;
    text-align: left;
    font: inherit;
    cursor: pointer;
}

    </style>
</head>


<body>


<!-- =========================================================
     FIXED SIDEBAR
========================================================= -->

<aside class="sidebar">

    <!-- BRAND -->

    <div class="brand">

        <div class="brand-logo">
    <img src="{{ asset('assets/india-logo.png') }}" alt="Problem-X Logo">
</div>

        <div class="brand-text">

            <h1>
                Problem<span>-X</span>
            </h1>

            <p>
                Report • Analyze • Resolve
            </p>

        </div>

    </div>


    <!-- NAVIGATION -->

    <nav class="nav">

        <a href="/dashboard" class="active">
            <span class="nav-icon">⌂</span>
            <span>Home</span>
        </a>

        <a href="/report">
            <span class="nav-icon">▤</span>
            <span>Report Complaint</span>
        </a>

        <a href="/track">
            <span class="nav-icon">⌕</span>
            <span>Track Complaint</span>
        </a>

        <a href="/map">
            <span class="nav-icon">◇</span>
            <span>Map</span>
        </a>

      
@if(auth()->check() && auth()->user()->role === 'admin')
    <a href="/admin/complaints" class="nav-link">
        <span>🛡️</span>
        <span>Admin Panel</span>
    </a>
@endif

        <a href="/about">
            <span class="nav-icon">ⓘ</span>
            <span>About</span>
        </a>

        <div class="sidebar-divider"></div>

        <a href="/contact">
            <span class="nav-icon">♟</span>
            <span>Contact</span>
        </a>

<form action="/logout" method="POST">
    @csrf

    <button type="submit" class="nav-link logout-btn">
        <span>🚪</span>
        <span>Logout</span>
    </button>
</form>


    <!-- SIDEBAR BOTTOM -->

    <div class="sidebar-bottom">

        <div class="city-icon">
            🏙️
        </div>

        <p>
            Building a Cleaner,<br>
            Safer & Smarter City
        </p>

    </div>

</aside>



<!-- =========================================================
     MAIN SCROLLABLE CONTENT
========================================================= -->

<main class="main">
    @if(session('success'))
    <div class="success-alert">
        ✅ {{ session('success') }}
    </div>
@endif


    <!-- =====================================================
         HERO
    ====================================================== -->

    <section class="hero">

        <div class="hero-content">

            <div class="hero-label">
                WELCOME TO PROBLEM-X
            </div>

            <h2>
                Together for a
                <br>
                <span>Cleaner, Safer & Smarter City</span>
            </h2>

            <p class="hero-description">
                Report civic issues, track their progress and help
                build a better tomorrow. Your voice matters!
            </p>

            <div class="hero-buttons">

                <a href="/report" class="hero-btn primary-btn">
                    ➤ &nbsp; Report a Complaint
                </a>

                <a href="/track" class="hero-btn secondary-btn">
                    ⌕ &nbsp; Track Complaint
                </a>

            </div>

        </div>


        <!-- MAP -->

        <div class="map-card">

            <div class="map-title">
                📍
                <span>Live City Map</span>
            </div>

            <div class="map-layout">

                <div class="map">

                    <div class="road"></div>
                    <div class="road two"></div>
                    <div class="road three"></div>

                    <div class="marker red"></div>
                    <div class="marker green"></div>
                    <div class="marker blue"></div>
                    <div class="marker yellow"></div>

                </div>


                <div class="map-issue">

                    <div class="issue-image">
                        <div class="pothole"></div>
                    </div>

                    <h4>
                        Pothole on Main Road
                    </h4>

                    <span class="status">
                        ● In Progress
                    </span>

                    <div class="location">
                        📍 Jalgaon, Maharashtra
                    </div>

                    <a href="/track" class="details-btn">
                        View Details →
                    </a>

                </div>

            </div>

        </div>

    </section>



    <!-- =====================================================
         QUICK REPORT
    ====================================================== -->

    <section class="section">

        <h2 class="section-title">
            Quick Report
        </h2>

        <p class="section-subtitle">
            Select a category to report an issue in your area.
        </p>


        <div class="categories">

            <a href="/report?category=road" class="category">

                <div class="category-icon red-icon">
                    🛣️
                </div>

                <span>
                    Pothole / Road Damage
                </span>

            </a>


            <a href="/report?category=garbage" class="category">

                <div class="category-icon green-icon">
                    🗑️
                </div>

                <span>
                    Garbage / Waste
                </span>

            </a>


            <a href="/report?category=water" class="category">

                <div class="category-icon blue-icon">
                    💧
                </div>

                <span>
                    Water Leakage
                </span>

            </a>


            <a href="/report?category=street-light" class="category">

                <div class="category-icon yellow-icon">
                    💡
                </div>

                <span>
                    Street Light
                </span>

            </a>


            <a href="/report?category=traffic" class="category">

                <div class="category-icon purple-icon">
                    🚦
                </div>

                <span>
                    Traffic Signal
                </span>

            </a>


            <a href="/report?category=other" class="category">

                <div class="category-icon gray-icon">
                    •••
                </div>

                <span>
                    Other Issue
                </span>

            </a>

        </div>

    </section>



    <!-- =====================================================
         FEATURES
    ====================================================== -->

    <section class="section">

        <div class="features">


            <div class="feature">

                <div class="feature-icon blue-icon">
                    🛡️
                </div>

                <h3>
                    Easy to Report
                </h3>

                <p>
                    Submit your complaint with details,
                    photos and location.
                </p>

            </div>


            <div class="feature">

                <div class="feature-icon green-icon">
                    ⌕
                </div>

                <h3>
                    Smart Analysis
                </h3>

                <p>
                    Our system analyzes and verifies the
                    complaint for authenticity.
                </p>

            </div>


            <div class="feature">

                <div class="feature-icon purple-icon">
                    🏛️
                </div>

                <h3>
                    Direct to Department
                </h3>

                <p>
                    Genuine complaints are routed to the
                    relevant department.
                </p>

            </div>


            <div class="feature">

                <div class="feature-icon yellow-icon">
                    📊
                </div>

                <h3>
                    Track in Real-time
                </h3>

                <p>
                    Monitor the status of your complaint
                    from submission to resolution.
                </p>

            </div>

        </div>

    </section>



    <!-- =====================================================
         HOW IT WORKS
    ====================================================== -->

    <section class="section">

        <h2 class="section-title">
            How It Works
        </h2>

        <p class="section-subtitle">
            Just a few simple steps to help make your city better.
        </p>


        <div class="steps">


            <div class="step">

                <div class="step-number">
                    1
                </div>

                <div class="step-icon">
                    👤
                </div>

                <h4>
                    Register / Login
                </h4>

                <p>
                    Create your account or log in to continue.
                </p>

            </div>


            <div class="step">

                <div class="step-number">
                    2
                </div>

                <div class="step-icon">
                    ▤
                </div>

                <h4>
                    Submit Complaint
                </h4>

                <p>
                    Add details, upload photo/video and location.
                </p>

            </div>


            <div class="step">

                <div class="step-number">
                    3
                </div>

                <div class="step-icon">
                    ⚙️
                </div>

                <h4>
                    System Analysis
                </h4>

                <p>
                    Verify complaint and check for duplicates.
                </p>

            </div>


            <div class="step">

                <div class="step-number">
                    4
                </div>

                <div class="step-icon">
                    🏢
                </div>

                <h4>
                    Department Routing
                </h4>

                <p>
                    Complaint is routed to the relevant department.
                </p>

            </div>


            <div class="step">

                <div class="step-number">
                    5
                </div>

                <div class="step-icon">
                    ✓
                </div>

                <h4>
                    Track & Resolve
                </h4>

                <p>
                    Follow the status until the issue is resolved.
                </p>

            </div>


        </div>

    </section>



    <!-- =====================================================
         FOOTER
    ====================================================== -->

    <footer class="footer">

        <div>
            <strong>Problem-X</strong>
            © 2026. All rights reserved.
        </div>

        <div class="footer-links">

            <a href="#">
                Privacy Policy
            </a>

            <span>|</span>

            <a href="#">
                Terms & Conditions
            </a>

            <span>|</span>

            <a href="/contact">
                Contact
            </a>

        </div>

    </footer>


</main>

</body>
</html>