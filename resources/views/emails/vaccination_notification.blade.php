<!DOCTYPE html>
<html>
<head>
    <title>Vaccination Appointment Notification</title>
</head>
<body>
    <h1>Hello, {{ $user->name }}!</h1>

    <p>We are happy to inform you that your vaccination appointment has been scheduled.</p>

    <p><strong>Vaccination Date:</strong> {{ $vaccinationDate->toFormattedDateString() }}</p>
    <p><strong>Vaccination Center:</strong> {{ $vaccineCenter->name }}</p>

    <p>Thank you for registering. Please arrive on time and bring any necessary documents.</p>

    <p>Best regards,</p>
    <p>The Vaccination Team</p>
</body>
</html>
