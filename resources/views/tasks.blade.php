<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            td{
                padding: 7px;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    TASKs
                </div>
                <table stles="text-align:center; border:1px solid;" >
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Due Date </th>
                        <th>Completed (1:true - 0:false)</th>
                    </tr>
                    @foreach($data as $val)
                    <tr>
                        <td>{{ $val->_id }}</td>
                        <td>{{ $val->title }}</td>
                        <td>{{ $val->description }}</td>
                        <td>{{ $val->due_date }}</td>
                        <td>{{ $val->completed }}</td>
                    </tr>
                    @endforeach
                </table>
                    
                  <div>
                
                <div class="links">            
                    @if(count($pagination->links) > 0):
                        @if(isset($pagination->links->next)){
                            <a href='{{ $pagination->links->next }}'>next</a>    
                        @endif
                        @if(isset($pagination->links->previous)){
                            <a href='{{ $pagination->links->previous }}'>previous</a>
                        @endif
                    @endif
                  </div>
                </div>
            </div>
        </div>
    </body>
</html>
