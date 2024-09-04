<!DOCTYPE html>
<html>
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
          
          
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email Address</th>
                            <th>Phone Number</th>
                            <th>Message</th> 
                            <th>Send Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data )
                            
                     
                        <tr>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->phone}}</td>
                            <td>{{$data->message}}</td>
                           <td>
                            <a class="btn btn-success" href="{{url('send_mail', $data->id)}}">Send Mail</a>
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