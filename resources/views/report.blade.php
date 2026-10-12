<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Report Complaint - Problem-X</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #eef5fb;
            color: #123b68;
        }

        .page {
            max-width: 1100px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .header {
            background: linear-gradient(100deg, #0b3d70, #087ed0);
            color: white;
            padding: 28px 32px;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 30px;
            margin-bottom: 8px;
        }

        .header p {
            font-size: 14px;
            color: #e0f2ff;
        }

        .card {
            background: white;
            padding: 28px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(20, 60, 100, 0.08);
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: bold;
        }

        .required {
            color: #e53935;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 13px;
            border: 1px solid #d5e0ea;
            border-radius: 8px;
            outline: none;
            font-size: 14px;
            font-family: inherit;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #087ed0;
        }

        textarea {
            min-height: 130px;
            resize: vertical;
        }

        .categories {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }

        .category {
            border: 1px solid #d8e4ee;
            border-radius: 9px;
            padding: 16px;
            cursor: pointer;
            text-align: center;
            transition: .2s;
        }

        .category:hover {
            border-color: #087ed0;
            background: #f3f9ff;
        }

        .category input {
            width: auto;
            margin-right: 7px;
        }

        .category-icon {
            display: block;
            font-size: 27px;
            margin-bottom: 7px;
        }

        .upload {
            border: 2px dashed #b9ccdd;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            background: #f8fbfe;
        }

        .upload-icon {
            font-size: 35px;
            margin-bottom: 10px;
        }

        .upload input {
            border: none;
            background: transparent;
            padding: 10px;
        }

        .location-box {
            background: #f5f9fc;
            border: 1px solid #d8e4ee;
            border-radius: 10px;
            padding: 18px;
        }

        .location-btn {
            margin-top: 10px;
            padding: 11px 18px;
            border: none;
            border-radius: 7px;
            background: #087ed0;
            color: white;
            cursor: pointer;
            font-weight: bold;
        }

        .submit-btn {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 8px;
            background: #087ed0;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .submit-btn:hover {
            background: #066bb1;
        }

        .back {
            display: inline-block;
            margin-top: 18px;
            color: #087ed0;
            text-decoration: none;
            font-size: 14px;
        }

        @media (max-width: 700px) {
            .categories {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<div class="page">

    <div class="header">
        <h1>Report a Complaint</h1>
        <p>
            Report a civic issue with complete details so it can be
            analyzed and routed to the relevant department.
        </p>
    </div>

    <div class="card">

        <form action="/report" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="form-group">

                <label>
                    Problem Category <span class="required">*</span>
                </label>

                <div class="categories">

                    <label class="category">
                        <input type="radio" name="category" value="road" required>
                        <span class="category-icon">🛣️</span>
                        Pothole / Road Damage
                    </label>

                    <label class="category">
                        <input type="radio" name="category" value="garbage">
                        <span class="category-icon">🗑️</span>
                        Garbage / Waste
                    </label>

                    <label class="category">
                        <input type="radio" name="category" value="water">
                        <span class="category-icon">💧</span>
                        Water Leakage
                    </label>

                    <label class="category">
                        <input type="radio" name="category" value="street_light">
                        <span class="category-icon">💡</span>
                        Street Light
                    </label>

                    <label class="category">
                        <input type="radio" name="category" value="traffic">
                        <span class="category-icon">🚦</span>
                        Traffic Signal
                    </label>

                    <label class="category">
                        <input type="radio" name="category" value="other">
                        <span class="category-icon">•••</span>
                        Other Issue
                    </label>

                </div>

            </div>


            <div class="form-group">

                <label>
                    Problem Description <span class="required">*</span>
                </label>

                <textarea
                    name="description"
                    placeholder="Describe the problem in detail..."
                    required
                ></textarea>

            </div>


            <div class="form-group">

                <label>
                    Photo / Video Evidence
                </label>

                <div class="upload">

                    <div class="upload-icon">
                        📷
                    </div>

                    <p>
                        Upload a photo or video of the problem
                    </p>

                    <input
                        type="file"
                        name="evidence"
                        accept="image/*,video/*"
                    >

                </div>

            </div>


            <div class="form-group">

                <label>
                    Problem Location <span class="required">*</span>
                </label>

                <div class="location-box">

                    <input
                        type="text"
                        name="location"
                        placeholder="Enter problem address"
                        required
                    >

                    <button
                        type="button"
                        class="location-btn"
                    >
                        📍 Use My Location
                    </button>

                </div>

            </div>


            <div class="form-group">

                <label>
                    Date & Time
                </label>

                <input
                    type="datetime-local"
                    name="reported_at"
                >

            </div>


            <button type="submit" class="submit-btn">
                Submit Complaint →
            </button>

        </form>

        <a href="/dashboard" class="back">
            ← Back to Dashboard
        </a>

    </div>

</div>

</body>
</html>