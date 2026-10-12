<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Complaints | Problem-X</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #eef4fa;
            color: #173451;
            padding: 25px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 25px;
        }

        .header h1 {
            margin-bottom: 8px;
        }

        .header p {
            color: #687f95;
        }

        .btn {
            display: inline-block;
            background: #123d70;
            color: white;
            text-decoration: none;
            padding: 12px 17px;
            border-radius: 8px;
        }

        .alert {
            background: #e4f7e9;
            color: #176b36;
            padding: 14px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .table-wrap {
            overflow-x: auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px #1734510d;
        }

        table {
            width: 100%;
            min-width: 950px;
            border-collapse: collapse;
        }

        th, td {
            text-align: left;
            padding: 16px;
            border-bottom: 1px solid #e8eef4;
            vertical-align: top;
        }

        th {
            background: #123d70;
            color: white;
            font-size: 13px;
        }

        td {
            font-size: 14px;
        }

        .complaint-id {
            color: #0870c9;
            font-weight: bold;
        }

        .status-form {
            display: flex;
            flex-direction: column;
            gap: 9px;
            min-width: 180px;
        }

        select {
            padding: 10px;
            border: 1px solid #ccd8e4;
            border-radius: 7px;
            background: white;
        }

        button {
            padding: 10px;
            border: none;
            border-radius: 7px;
            background: #0870c9;
            color: white;
            cursor: pointer;
        }

        .empty {
            padding: 35px;
            text-align: center;
            color: #687f95;
        }
    </style>
</head>

<body>
<div class="container">

    <div class="header">
        <div>
            <h1>Complaint Management</h1>
            <p>View complaints and update their current status.</p>
        </div>

        <a href="/dashboard" class="btn">← Dashboard</a>
    </div>

    @if (session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert">
            Please select a valid complaint status.
        </div>
    @endif

    <div class="table-wrap">
        @if ($complaints->isEmpty())
            <div class="empty">
                <h3>No complaints found</h3>
                <p>Submitted complaints will appear here.</p>
            </div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Complaint ID</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Location</th>
                        <th>Department</th>
                        <th>Current Status</th>
                        <th>Update Status</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($complaints as $complaint)
                        <tr>
                            <td class="complaint-id">
                                {{ $complaint->complaint_id }}
                            </td>

                            <td>
                                {{ ucfirst(str_replace('_', ' ', $complaint->category)) }}
                            </td>

                            <td>{{ $complaint->description }}</td>

                            <td>{{ $complaint->location }}</td>

                            <td>
                                {{ $complaint->department ?? 'Not assigned' }}
                            </td>

                            <td>{{ $complaint->status }}</td>

                            <td>
                                <form
                                    class="status-form"
                                    action="{{ url('/admin/complaints/' . $complaint->id . '/status') }}"
                                    method="POST"
                                >
                                    @csrf
                                    @method('PATCH')

                                    <select name="status" required>
                                        @foreach ([
                                            'Submitted',
                                            'Analyzed',
                                            'Under Review',
                                            'Genuine',
                                            'Sent to Department',
                                            'In Progress',
                                            'Resolved',
                                            'Rejected'
                                        ] as $status)
                                            <option
                                                value="{{ $status }}"
                                                @selected($complaint->status === $status)
                                            >
                                                {{ $status }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <button type="submit">
                                        Update Status
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

</div>
</body>
</html>
