
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Complaint | Problem-X</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #eef4fa;
            color: #173451;
            padding: 30px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }

        .topbar h1 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .topbar p {
            color: #667b91;
        }

        .back-btn {
            background: #123d70;
            color: white;
            padding: 12px 18px;
            border-radius: 8px;
            text-decoration: none;
        }

        .summary {
            background: white;
            padding: 22px;
            border-radius: 14px;
            margin-bottom: 22px;
            box-shadow: 0 4px 15px #1734510d;
        }

        .summary h3 {
            margin-bottom: 8px;
        }

        .complaint-card {
            background: white;
            border-radius: 14px;
            padding: 24px;
            margin-bottom: 18px;
            box-shadow: 0 4px 15px #1734510d;
        }

        .card-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .complaint-id {
            color: #0870c9;
            font-weight: bold;
            font-size: 17px;
        }

        .status {
            background: #fff2d5;
            color: #946200;
            padding: 8px 13px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .details {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .detail label {
            display: block;
            font-size: 12px;
            color: #73869a;
            margin-bottom: 7px;
            text-transform: uppercase;
        }

        .detail p {
            overflow-wrap: anywhere;
            line-height: 1.5;
        }

        .empty {
            background: white;
            padding: 45px 20px;
            border-radius: 14px;
            text-align: center;
        }

        .empty h2 {
            margin-bottom: 12px;
        }

        .empty p {
            color: #667b91;
            margin-bottom: 22px;
        }

        .report-btn {
            display: inline-block;
            background: #0870c9;
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 8px;
        }

        .evidence-link {
            color: #0870c9;
            text-decoration: none;
            font-weight: bold;
        }

        @media (max-width: 600px) {
            body {
                padding: 16px;
            }

            .details {
                grid-template-columns: 1fr;
            }

            .topbar h1 {
                font-size: 23px;
            }
        }
    </style>
</head>

<body>
<div class="container">

    <div class="topbar">
        <div>
            <h1>Track Your Complaints</h1>
            <p>Monitor the status of your reported civic problems.</p>
        </div>

        <a href="/dashboard" class="back-btn">← Dashboard</a>
    </div>

    <div class="summary">
        <h3>My Complaints</h3>
        <p>Total complaints submitted: {{ $complaints->count() }}</p>
    </div>

    @forelse ($complaints as $complaint)

        <div class="complaint-card">

            <div class="card-top">
                <span class="complaint-id">
                    {{ $complaint->complaint_id }}
                </span>

                <span class="status">
                    {{ $complaint->status }}
                </span>
            </div>

            <div class="details">

                <div class="detail">
                    <label>Category</label>
                    <p>{{ ucfirst(str_replace('_', ' ', $complaint->category)) }}</p>
                </div>

                <div class="detail">
                    <label>Priority</label>
                    <p>{{ $complaint->priority }}</p>
                </div>

                <div class="detail">
                    <label>Reported Date</label>
                    <p>
                        {{ $complaint->created_at
                            ? $complaint->created_at->format('d M Y, h:i A')
                            : 'Not available' }}
                    </p>
                </div>

                <div class="detail">
                    <label>Location</label>
                    <p>{{ $complaint->location }}</p>
                </div>

                <div class="detail">
                    <label>Description</label>
                    <p>{{ $complaint->description }}</p>
                </div>

                <div class="detail">
                    <label>Department</label>
                    <p>{{ $complaint->department ?? 'Not assigned yet' }}</p>
                </div>

                @if ($complaint->evidence)
                    <div class="detail">
                        <label>Evidence</label>
                        <p>
                            <a
                                class="evidence-link"
                                href="{{ asset('storage/' . $complaint->evidence) }}"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                View Uploaded Evidence
                            </a>
                        </p>
                    </div>
                @endif

            </div>
        </div>

    @empty

        <div class="empty">
            <h2>No Complaints Yet</h2>
            <p>Your submitted complaints will appear here.</p>
            <a href="/report" class="report-btn">+ Report a Problem</a>
        </div>

    @endforelse

</div>
</body>
</html>
