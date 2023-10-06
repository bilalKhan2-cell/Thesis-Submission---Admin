<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        p {
            color: #555;
            margin-bottom: 20px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registered Successful</h1>
        <p>Dear {{$team_lead_data->name}} Roll No: {{$team_lead_data->rollno}},</p>
        <P>Your Project ID is <b>{{$team_lead_data->project_id}}</b></P>
        <p>Your Team Lead Account Have Been Created Successfully In Sindh University Online Thesis Submission Portal.</p>
        <p>Here is your One-Time-Password <b>{{$pass}}<b>.</p>
        <p>Best regards,<br>{{Auth::user()->name}} ({{Auth::user()->email}})</p>
        <p>
            <a href="{{env('APP_URL')}}" class="button">Visit Website</a>
        </p>

        <br>
        
        <table align="center" border="2">
            <thead>
                <tr>
                    <th colspan="2">Team Members</th>
                </tr>
                <tr>
                    <th>Name</th>
                    <th>Roll No</th>
                </tr>
            </thead>
            <tbody>
                @foreach($team_lead_data->members as $key=>$val)
                @if(!empty($team_lead_data->members))
                <tr>
                    <td>{{$val->name}}</td>
                    <td>{{$val->rollno}}</td>
                </tr>
                @else
                    <tr><td colspan="2">No Memebrs Assigned</td></tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
