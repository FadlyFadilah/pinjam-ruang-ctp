<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Email</title>
</head>
<body>
    <h2>Contact Form Details</h2>
    <p><strong>First Name:</strong> {{ $formData['fname'] }}</p>
    <p><strong>Last Name:</strong> {{ $formData['lname'] }}</p>
    <p><strong>Email:</strong> {{ $formData['email'] }}</p>
    <p><strong>Subject:</strong> {{ $formData['subject'] }}</p>
    <p><strong>Message:</strong> {{ $formData['message'] }}</p>
</body>
</html>
