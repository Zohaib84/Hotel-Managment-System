<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
        }

        .page-content {
            margin-left: 250px; /* Adjust according to your sidebar width */
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            max-width: 800px;
            margin: 40px auto;
        }

        .page-header {
            background-color: #343a40;
            padding: 15px;
            border-radius: 8px 8px 0 0;
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        label {
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: #f9f9f9;
            transition: border 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        select:focus,
        textarea:focus {
            border-color: #007bff;
            background-color: #fff;
        }

        input[type="file"] {
            border: 0;
            background-color: #f4f4f4;
            padding: 10px;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            .page-content {
                margin-left: 0;
                padding: 15px;
            }

            form {
                gap: 15px;
            }
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')
    
    <div class="page-content">
        <div class="page-header">
            <h2>Add New Room</h2>
        </div>

        <form action="{{url('add_room')}}" method="POST" enctype="multipart/form-data" style="padding-bottom: 30px">
            @csrf
            <div>
                <label for="title">Room Title</label>
                <input type="text" id="title" name="title" required>
            </div>

            <div>
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="4" required></textarea>
            </div>

            <div>
                <label for="price">Price</label>
                <input type="number" id="price" name="price" required>
            </div>

            <div>
                <label for="room-type">Room Type</label>
                <select id="room-type" name="room_type" required>
                    <option value="regular">Regular</option>
                    <option value="premium">Premium</option>
                    <option value="deluxe">Deluxe</option>
                </select>
            </div>

            <div>
                <label for="wifi">Free Wifi</label>
                <select id="wifi" name="wifi" required>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>

            <div>
                <label for="image">Upload Image</label>
                <input type="file" id="image" name="image" required>
            </div>

            <div>
                <input type="submit" value="Add Room">
            </div>
        </form>
    </div>

    @include('admin.footer')
</body>
</html>
