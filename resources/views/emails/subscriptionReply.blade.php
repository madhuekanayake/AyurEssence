<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subjectText }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .email-header {
            background-color: #4CAF50;
            color: #fff;
            text-align: center;
            padding: 15px;
        }
        .email-body {
            padding: 20px;
            color: #333;
        }
        .highlight {
            background: #f9f9f9;
            border-left: 4px solid #4CAF50;
            padding: 10px 15px;
            margin: 15px 0;
        }
        .email-footer {
            text-align: center;
            color: #777;
            padding: 15px;
            font-size: 12px;
            background: #f4f4f4;
        }
        a {
            color: #4CAF50;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>{{ $subjectText }}</h1>
        </div>
        <div class="email-body">
            <p>Dear {{ $recipientName }},</p>
            <p>{!! nl2br(e($messageBody)) !!}</p>
            <div class="highlight">
                <p><strong>Note:</strong> Thank you for staying connected with us!</p>
            </div>
        </div>
        <div class="email-footer">
            <p>Best regards,<br>The Ayur Essence Team</p>
        </div>
    </div>
</body>
</html>
