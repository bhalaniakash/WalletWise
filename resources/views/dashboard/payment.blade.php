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
        console.log("Razorpay Key:", "{{ config('services.razorpay.key') }}");
    </script>

    <script>
        var options = {
            "key": "{{ config('services.razorpay.key') }}", // Use config() instead of env()
            "amount": {{ $amount }}, // Amount in paise
            "currency": "INR",
            "name": "Acme Corp", // Business name
            "description": "Test Transaction",
            "handler": function (response) {
                response.amount = {{ $amount }};
                console.log("Handler function triggered", response);
                fetch('/verify-payment', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(response)
                })
                    .then(res => res.json())
                    .then(data => {
                        console.log('Verify Payment Response:', data); // Debug Response
                        if (data.success) {
                            alert('Payment Verified! Redirecting...');
                            window.location.href = "{{ route('dashboard') }}"; // Redirect user
                        } else {
                            alert('Payment Failed: ' + data.error);
                            console.error('Payment Failed:', data.error);
                        }
                    })
                    .catch(err => console.error("Fetch error:", err));
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
                "color": "#343434"
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
    </script>
</body>

</html>