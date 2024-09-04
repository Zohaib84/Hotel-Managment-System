<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    @include('home.css')
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        /* Header */
        header {
            background-color: #f8f9fa;
            padding: 10px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Loader */
        .loader_bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.9);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .loader {
            text-align: center;
        }

        /* Room Section */
        .our_room {
            padding: 50px 0;
            background-color: #f0f0f0;
        }

        .titlepage {
            text-align: center;
            margin-bottom: 40px;
        }

        .titlepage h2 {
            font-size: 2.5em;
            font-weight: bold;
            color: #333;
        }

        .titlepage p {
            font-size: 1.1em;
            color: #666;
        }

        .room {
            margin-bottom: 30px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            background-color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .room_img figure {
            margin: 0;
            overflow: hidden;
            border-bottom: 1px solid #ddd;
            width: 100%;
        }

        .room_img figure img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s ease-in-out;
        }

        .room_img figure:hover img {
            transform: scale(1.05);
        }

        .bed_room {
            padding: 15px;
            text-align: center;
        }

        .bed_room h3 {
            font-size: 1.8em;
            color: #333;
            margin-bottom: 10px;
        }

        .bed_room h4 {
            font-size: 1.2em;
            color: #555;
            margin-bottom: 10px;
        }

        .bed_room p {
            color: #777;
            margin-bottom: 15px;
        }

        .room .btn {
            background-color: #ff6600;
            color: #fff;
            margin-top: 15px;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1em;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .room .btn:hover {
            background-color: #e65c00;
        }

        /* Form Section */
        .form-section {
            padding: 15px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .form-section label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-section input[type="text"],
        .form-section input[type="email"],
        .form-section input[type="number"],
        .form-section input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-section input[type="submit"] {
            background-color: #ff6600;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-section input[type="submit"]:hover {
            background-color: #e65c00;
        }

        @media (max-width: 767px) {
            .room_img figure img {
                height: auto;
            }

            .titlepage h2 {
                font-size: 2em;
            }

            .form-section input,
            .form-section input[type="submit"] {
                font-size: 0.9em;
            }
        }
    </style>
</head>
<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#"/></div>
    </div>
    <!-- end loader -->

    <!-- header -->
    <header>
        @include('home.header')
    </header>

    <!-- Room Details Section -->
    <div class="our_room">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Room Details</h2>
                        <p>Here are the room details,
                             categorized into Regular, Premium, and Deluxe:</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="room">
                        <div class="room_img">
                            <figure>
                                <img src="/room/{{$room->image}}" 
                                alt="{{$room->room_title}}" />
                            </figure>
                        </div>
                        <div class="bed_room">
                            <h3>{{$room->room_title}}</h3>
                            <p>{{$room->description}}</p>
                            <h4>Free Wifi: {{$room->wifi ? 'Yes' : 'No'}}</h4>
                            <h4>Room Type: {{$room->room_type}}</h4>
                            <h3>Price: ${{$room->price}}</h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    
                    <div class="form-section">
                        <h1 style="font-size: 40px!important">Book Room</h1>
                        <div>
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    <button type="button" class="close"
                                     data-bs-dismiss = "alert">X</button>
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                        </div>
                        
                        @if($errors->any())
                        <ul style="color: red;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                        <form action="{{url('room_booking',$room->id)}}" method="POST">
                            @csrf

                        
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name"
                        @if(Auth::id())
                        value="{{Auth::user()->name}}"
                        @endif
                        required>

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email"
                        @if(Auth::id())
                        value="{{Auth::user()->email}}"
                        @endif
                        required>

                        <label for="phone">Phone</label>
                        <input type="number" id="phone" name="phone"
                        @if(Auth::id())
                        value="{{Auth::user()->phone}}"
                        @endif>

                        <label for="startDate">Start Date</label>
                        <input type="date" id="startDate" name="startDate">

                        <label for="endDate">End Date</label>
                        <input type="date" id="endDate" name="endDate">

                        <input type="submit" class="btn" value="Book Room">
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end Room Details Section -->

    <!-- footer -->
    @include('home.footer')

    <script type="text/javascript">
    $(function(){
        var dtToday = new Date();
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if(month <10 )
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();

        var maxDate = year + '-' + month + '-' + day;
        $('#startDate').attr('min', maxDate);
        $('#endDate').attr('min', maxDate);
    });
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" 
integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" 
crossorigin="anonymous"></script>
</body>
</html>
