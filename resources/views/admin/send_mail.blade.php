<!DOCTYPE html>
<html>
<head> 
    <base href="/public">
    @include('admin.css')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .page-content {
            padding: 20px;
        }

        .page-header {
            background-color: #007bff;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .page-header h1 {
            font-size: 28px;
            margin: 0;
        }

        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        form div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
            color: #333;
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            form {
                padding: 20px;
            }

            .page-header h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')
    
    <div class="page-content" >
        <div class="page-header">
            <div class="container-fluid">
                <h1>Mail Sent to {{$data->name}}</h1>
            </div>
        </div>

        <div class="container"style="padding-bottom: 50px" >
            <form action="{{url('mail',$data->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="Greeting">Greeting</label>
                    <input type="text" name="greeting" required>
                </div>

                <div>
                    <label for="Mail">Mail Body</label>
                    <textarea name="body" rows="4" required></textarea>
                </div>

                <div>
                    <label for="Action">Action Text</label>
                    <input type="text" name="action_text" required>
                </div>

                <div>
                    <label for="Action">Action Url</label>
                    <input type="text" name="action_url" required>
                </div>

                <div>
                    <label>End Line</label>
                    <input type="text" name="endline" required>
                </div>

                <div>
                    <input type="submit" value="Send Mail">
                </div>
            </form>
        </div>
    </div>

    @include('admin.footer')
</body>
</html>
