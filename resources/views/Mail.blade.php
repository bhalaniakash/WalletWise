<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send email</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px;">
    <div
        style="max-width: 600px; background: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
        <h2 style="color: #6B4226; text-align: center;">Payment Reminder - WalletWise</h2>

        <p>Dear{{ $userName }},</p>

        <p>We hope you're doing well! This is a gentle reminder that you have a <strong>pending payment</strong> in your
            WalletWise account.</p>

        <table style="width: 100%; border-collapse: collapse; margin: 15px 0;">
            <tr>
                <td style="padding: 8px; border: 1px solid #ddd;"><strong>Amount Due:</strong></td>
                <td style="padding: 8px; border: 1px solid #ddd;">&#8377;{{ $dueAmount }}</td>
            </tr>
            <tr>
                <td style="padding: 8px; border: 1px solid #ddd;"><strong>Due Date:</strong></td>
                <td style="padding: 8px; border: 1px solid #ddd;">{{ $dueDate }}</td>
            </tr>
        </table>

        <p>To avoid any late fees or interruptions, please complete your payment before the due date.</p>

        <p>If you have already made the payment, please disregard this email.</p>

        <p>Thank you for choosing <strong>WalletWise</strong> to manage your finances.</p>

        <p style="font-size: 14px; color: #888;">Best regards,</p>
        <p style="font-size: 14px; color: #888;"><strong>WalletWise Team</strong></p>
    </div>
</body>


</html>