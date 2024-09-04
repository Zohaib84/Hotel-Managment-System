<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Gallery Upload</title>
    @include('admin.css')
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f6fa;
            color: #333;
        }

        .page-content {
            padding: 40px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin: 40px auto;
            max-width: 1000px;
            text-align: center;
        }

        .page-header {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 20px;
            border-radius: 8px 8px 0 0;
        }

        .page-header h1 {
            margin: 0;
            font-size: 36px;
            font-weight: bold;
        }

        .gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
            margin-bottom: 40px;
        }

        .gallery-item {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .gallery img {
            width: 100%;
            max-width: 200px;
            height: auto;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .gallery img:hover {
            transform: scale(1.05);
        }

        .btn-danger {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background-color: #e74c3c;
            color: #fff;
            padding: 5px 10px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #c0392b;
        }

        form {
            margin-top: 30px;
        }

        form label {
            font-size: 18px;
            font-weight: bold;
            color: #2c3e50;
            display: block;
            margin-bottom: 10px;
        }

        form input[type="file"] {
            display: block;
            margin: 0 auto 20px auto;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 80%;
            max-width: 400px;
        }

        form input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            padding: 12px 24px;
            border: none;
            border-radius: 4px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form input[type="submit"]:hover {
            background-color: #2980b9;
        }

        @media (max-width: 768px) {
            .page-content {
                padding: 20px;
                margin: 20px;
            }

            .page-header h1 {
                font-size: 28px;
            }

            .gallery img {
                max-width: 150px;
            }

            form input[type="file"] {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <h1>Gallery</h1>
        </div>

        <div class="gallery">
            @foreach ($gallary as $item)
            <div class="gallery-item">
                <img src="/gallary/{{ $item->image }}" alt="Gallery Image">
                <a class="btn btn-danger" href="{{ url('delete_gallary', $item->id) }}">Delete</a>
            </div>
            @endforeach
        </div>

        <form action="{{ url('upload_gallary') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="image">Upload Image</label>
                <input type="file" name="image" id="image" required>
            </div>

            <div>
                <input type="submit" value="Add Image">
            </div>
        </form>
    </div>

    @include('admin.footer')
</body>

</html>
