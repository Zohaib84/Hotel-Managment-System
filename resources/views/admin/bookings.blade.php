<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Booking Details</title>
    @include('admin.css')
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f6fa;
            color: #333;
        }

        .page-header {
            padding: 20px;
            background-color: #2c3e50;
            color: #ecf0f1;
            text-align: center;
            border-bottom: 3px solid #3498db;
        }

        .page-header h2 {
            margin: 0;
            font-size: 24px;
        }

        .page-content {
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 1200px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 16px;
        }

        table thead {
            background-color: #34495e;
            color: #fff;
            text-transform: uppercase;
        }

        table th,
        table td {
            padding: 12px;
            border-bottom: 1px solid #ecf0f1;
            vertical-align: middle;
        }

        table tbody tr:nth-child(even) {
            background-color: #ecf0f1;
        }

        table tbody tr:hover {
            background-color: #bdc3c7;
        }

        table td img {
            width: 80px;
            height: auto;
            border-radius: 4px;
            object-fit: cover;
        }

        .status-approved {
            color: #27ae60;
            font-weight: bold;
        }

        .status-rejected {
            color: #e74c3c;
            font-weight: bold;
        }

        .status-waiting {
            color: #f39c12;
            font-weight: bold;
        }

        .btn-custom {
            background-color: #3498db;
            color: #fff;
            border-radius: 20px;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            margin: 5px 0;
            text-align: center;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #2980b9;
        }

        .btn-danger {
            background-color: #e74c3c;
            color: #fff;
            border-radius: 20px;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            margin: 5px 0;
            text-align: center;
            transition: all 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #c0392b;
        }

        .btn-secondary {
            background-color: #2c3e50;
            color: #fff;
            border-radius: 20px;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            margin: 5px 0;
            text-align: center;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #34495e;
        }

        .btn-warning {
            background-color: #f39c12;
            color: #fff;
            border-radius: 20px;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            margin: 5px 0;
            text-align: center;
            transition: all 0.3s ease;
        }

        .btn-warning:hover {
            background-color: #e67e22;
        }

        /* Media Queries for responsiveness */
        @media (max-width: 768px) {
            table thead {
                display: none;
            }

            table, table tbody, table tr, table td {
                display: block;
                width: 100%;
            }

            table tr {
                margin-bottom: 15px;
                border-bottom: 2px solid #ecf0f1;
            }

            table td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }

            table td::before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 50%;
                padding-left: 15px;
                font-weight: bold;
                text-align: left;
                color: #2c3e50;
            }

            .btn-custom, .btn-danger, .btn-secondary, .btn-warning {
                width: 100%;
                margin: 5px 0;
            }

            .page-header h2 {
                font-size: 20px;
            }
        }

        @media (max-width: 576px) {
            .page-content {
                padding: 15px;
                margin: 10px;
            }

            .page-header {
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <h2>Booking Details</h2>
        </div>

        <div class="container-fluid">
            <table>
                <thead>
                    <tr>
                        <th>Room ID</th>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Arrival Date</th>
                        <th>Departure Date</th>
                        <th>Status</th>
                        <th>Room Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Delete</th>
                        <th>Status Update</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $data)
                    <tr>
                        <td data-label="Room ID">{{ $data->room_id }}</td>
                        <td data-label="Customer Name">{{ $data->name }}</td>
                        <td data-label="Email">{{ $data->email }}</td>
                        <td data-label="Phone">{{ $data->phone }}</td>
                        <td data-label="Arrival Date">{{ $data->start_date }}</td>
                        <td data-label="Departure Date">{{ $data->end_date }}</td>
                        <td data-label="Status">
                            @if ($data->status == 'approved')
                            <span class="status-approved">Approved</span>
                            @elseif ($data->status == 'rejected')
                            <span class="status-rejected">Rejected</span>
                            @else
                            <span class="status-waiting">Waiting</span>
                            @endif
                        </td>
                        <td data-label="Room Title">{{ $data->room->room_title }}</td>
                        <td data-label="Price">{{ $data->room->price }}</td>
                        <td data-label="Image">
                            <img src="/room/{{ $data->room->image }}" alt="Room Image">
                        </td>
                        <td data-label="Delete">
                            <a onclick="return confirm('Are you sure you want to delete this?');" class="btn-danger btn-custom" href="{{ url('delete_booking', $data->id) }}">Delete</a>
                        </td>
                        <td data-label="Status Update">
                            <a class="btn-secondary btn-custom" href="{{ url('approve_booking', $data->id) }}">Approve</a>
                            <a class="btn-warning btn-custom" href="{{ url('reject_booking', $data->id) }}">Reject</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('admin.footer')
</body>

</html>
