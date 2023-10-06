<!DOCTYPE html>
<html>
<head>
    <title>User Registration Success</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="jumbotron">
        <h1 class="display-4">User Registration Successful</h1>
        <p class="lead">Hello {{ $user_data->name }},</p>
        <p>Your registration was successful. Here are your details:</p>
        <ul>
            <li><strong>Name:</strong> {{ $user_data->name }}</li>
            <li><strong>Email:</strong> {{ $user_data->email }}</li>
            <li><strong>CNIC:</strong> {{ $user_data->cnic }}</li>
            <li><strong>One-Time Password:</strong> {{ $otp }}</li>
        </ul>
        <hr class="my-4">
        <p>Thank you for joining our platform. We look forward to serving you!</p>
    </div>
</div>

</body>
</html>
