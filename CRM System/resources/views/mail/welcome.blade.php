<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Welcome to CRM App</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; margin: 0; padding: 20px;">
    <table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="max-width: 600px; margin: auto; background: #ffffff; padding: 20px; border-radius: 5px;">
        <tr>
            <td style="text-align: center; padding-bottom: 20px;">
                <h1 style="color: #333;">Welcome, {{ $user->name }}!</h1>
            </td>
        </tr>
        <tr>
            <td style="color: #555; font-size: 16px; line-height: 1.5;">
                <p>Thank you for joining CRM App. We're excited to have you with us.</p>
                <p>Your registered email is <strong>{{ $user->email }}</strong>.</p>
                <p>You can access your dashboard anytime by clicking the link below:</p>
                <p style="text-align: center; margin: 30px 0;">
                    <a href="{{ url('/dashboard') }}" style="background-color: #2F855A; color: white; padding: 12px 24px; text-decoration: none; border-radius: 4px; display: inline-block;">
                        Go to Dashboard
                    </a>
                </p>
                <p>If you have any questions, feel free to reach out to our support team.</p>
                <p>Best regards,<br>CRM App Team</p>
            </td>
        </tr>
    </table>
</body>
</html>
