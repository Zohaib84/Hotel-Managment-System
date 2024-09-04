<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <style>
        /* Styling the table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: left;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
            color: #333;
            text-transform: uppercase;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        img {
            width: 100px;
            height: 70px;
            object-fit: cover;
            border-radius: 5px;
            transition: transform 0.2s;
        }

        img:hover {
            transform: scale(1.1);
        }

        .page-content {
            padding: 20px;
            background-color: #f8f9fa;
        }

        .page-header {
            padding-bottom: 20px;
            border-bottom: 1px solid #e9ecef;
            margin-bottom: 20px;
        }

        .container-fluid {
            max-width: 1200px;
            margin: auto;
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="mb-4">Room Listings</h2>
                
                <table>
                    <thead>
                        <tr>
                            <th>Room Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Wifi</th>
                            <th>Room Type</th>
                            <th>Image</th>
                            <th>Delete</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $room)
                        <tr>
                            <td>{{ $room->room_title }}</td>
                            <td>{{ Str::limit($room->description, 150) }}</td>
                            <td>${{ $room->price }}</td>
                            <td>{{ ucfirst($room->wifi) }}</td>
                            <td>{{ ucfirst($room->room_type) }}</td>
                            <td>
                                <img src="room/{{ $room->image }}" alt="Room Image">
                            </td>
                            <td>
                                <a onclick="return confirm('Are you sure you want to delete this!')"
                                 href="{{url('delete_data', $room->id)}}" class="btn btn-danger">Delete</a>
                            </td>

                            <td>
                                <a href="{{url('update_data', $room->id)}}" class="btn btn-warning">Update</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('admin.footer')

</body>

</html>
