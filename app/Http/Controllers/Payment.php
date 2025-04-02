<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Razorpay\Api\Api;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Payment extends Controller
{
    public function index(): \Illuminate\View\View
    {
        return view('razorpay');
    }

    public function payment(Request $request): \Illuminate\View\View
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $amount = $request->amount;

        try {
            $api = new Api(env('RZR_KEY'), env('RZR_SECRET')); // Use correct env variables

            $order_data = [
                'receipt' => 'order_' . rand(1000, 9999),
                'amount' => $amount * 100, // Convert to paise
                'currency' => 'INR',
            ];

            $order = $api->order->create($order_data);

            return view('dashboard.payment', [
                'order' => $order['id'],
                'amount' => $amount * 100,
            ]);
        } catch (\Exception $e) {
            Log::error('Error creating Razorpay order', ['error' => $e->getMessage()]);
            return back()->withErrors(['error' => 'Unable to process payment. Please try again later.']);
        }
    }

    public function verifyPayment(Request $request): \Illuminate\Http\JsonResponse
    {
        Log::info('Verify Payment Data:', $request->all());

        $request->validate([
            'razorpay_order_id' => 'required|string',
            'razorpay_payment_id' => 'required|string',
            'razorpay_signature' => 'required|string',
        ]);

        try {
            $api = new Api(env('RZR_KEY'), env('RZR_SECRET'));

            $attributes = [
                'razorpay_order_id' => $request->razorpay_order_id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature' => $request->razorpay_signature,
            ];

            $api->utility->verifyPaymentSignature($attributes);

            Log::info('Payment verification successful!');

            $user = Auth::user();
            if (!$user) {
                Log::error('User not authenticated.');
                return response()->json(['success' => false, 'error' => 'User not found'], 401);
            }

            $user->plan_type = 'premium';
            $user->save();

            Log::info('User plan updated to premium!', ['user_id' => $user->id]);

            return response()->json(['success' => true, 'message' => 'Payment Verified!']);
        } catch (\Exception $e) {
            Log::error('Payment verification failed!', ['error' => $e->getMessage()]);

            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
}
