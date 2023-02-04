<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
class PayPalController extends Controller
{
    /**
     * create transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTransaction()
    {
        return view('page_user.paypal.paypal_test');
    }

    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction(Request $request)
    {
        // dump("duy");
        // die();
        $usd = session()->get('totalPaypal');
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
      
        $paypalToken = $provider->getAccessToken();
        
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction'),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $usd,
                    ]
                ]
            ]
        ]);
        
        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('checkout')
                ->with('error', 'Lỗi thanh toán.');

        } else {
            return redirect()
                ->route('checkout')
                ->with('error', $response['message'] ?? 'Lỗi thanh toán.');
        }
    }

    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
           session()->put('success_totalPaypal',true);
            return redirect()
                ->route('checkout')
                ->with('success', 'Thanh toán paypal thành công, hãy ghi thông tin của bạn để gửi cho shop.');
        } else {
            return redirect()
                ->route('checkout')
                ->with('error', $response['message'] ?? 'Lỗi thanh toán.');
        }
    }

    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('success')
            ->with('error', $response['message'] ?? 'Đóng giao dịch thành công.');
    }
}
