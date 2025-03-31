<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
</head>

<body>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var options = {
            "key": "{{ config('services.razorpay.key') }}", // Use config() instead of env()
            "amount": {{ $amount }}, // Amount in paise
            "currency": "INR",
            "name": "Acme Corp", // Business name
            "description": "Test Transaction",
            "handler": function(response) {
                var payId = response.razorpay_payment_id;
                // alert('Payment success: ' + payId);
                window.location.href='../dashboard';
            },
            "image": "https://example.com/your_logo",
            "order_id": "{{ $order }}", // Order ID as a string
            "prefill": {
                "name": "Gaurav Kumar",
                "email": "gaurav.kumar@example.com",
                "contact": "9000090000"
            },
            "notes": {
                "address": "Razorpay Corporate Office"
            },
            "theme": {
                "color": "#3399cc"
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
    </script>
</body>

</html>
