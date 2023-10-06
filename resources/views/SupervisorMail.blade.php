<!DOCTYPE html>
<html>
<head>
    <title>Login Successful</title>
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
        <p>Dear {{$supervisor->name}}.,</p>
        <P>Your CNIC is <b>{{$supervisor->cnic}}</b></P>
        <p>Your Supervisor Account Have Been Created Successfully In Sindh University Online Thesis Submission Portal.</p>
        <p>Here is your One-Time-Password <b>{{$pass}}<b>.</p>
        <p>Best regards,<br> Usindh Admin (admin@usindh.com)</p>
        <p>
            <a href="{{env('APP_URL')}}" class="button">Visit Website</a>
        </p>
    </div>
</body>
</html>
