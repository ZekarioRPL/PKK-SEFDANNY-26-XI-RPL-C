<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TripayController extends Controller
{
  public function getPaymentChannels()
  {
    
    $apiKey = env('TRIPAY_API_KEY');

    $payload = ['code' => 'BRIVA'];
    
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_FRESH_CONNECT  => true,
      CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/merchant/payment-channel',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HEADER         => false,
      CURLOPT_HTTPHEADER     => ['Authorization: Bearer '.$apiKey],
      CURLOPT_FAILONERROR    => false,
      CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4
    ));
    
    $response = curl_exec($curl);
    $error = curl_error($curl);
    
    // dd($response);
    curl_close($curl);
    
    $response = json_decode($response)->data;
    // dd(json_decode($response)->data);
    return $response ? $response : $error;
    
  }
  
  public function requestTransaction($method, $film)
  {
    $apiKey       = env('TRIPAY_API_KEY');
    $privateKey   = env('TRIPAY_PRIVATE_KEY');
    $merchantCode = env('MERCHANT_CODE');
    // dd( $apiKey, $privateKey, $merchantCode);
    $merchantRef  = 'PX' . time();
    $amount  = $film->harga;
    // dd($amount, $privateKey, $merchantCode, $merchantRef);
    
    $user = auth()->user();

    $data = [
        'method'         => $method,
        'merchant_ref'   => $merchantRef,
        'amount'         => $amount,
        'customer_name'  => $user->name,
        'customer_email' => $user->email,
        'order_items'    => [
            [
                'name'        => $film->name,
                'price'       => $amount,
                'quantity'    => 1,
                // 'bioskop'    => $bioskop->name
                // 'image_url'   => 'https://tokokamu.com/product/nama-produk-1.jpg',
            ]
        ],
        'expired_time' => (time() + (24 * 60 * 60)), // 24 jam
        // 'signature'    => hash_hmac('sha256', $merchantCode.$merchantRef.$amount, $privateKey),
        'signature'    => hash_hmac('sha256', $merchantCode.$merchantRef.$amount, $privateKey)
    ];
    
    $curl = curl_init();
    
    curl_setopt_array($curl, [
        CURLOPT_FRESH_CONNECT  => true,
        CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/transaction/create',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER         => false,
        CURLOPT_HTTPHEADER     => ['Authorization: Bearer '.$apiKey],
        CURLOPT_FAILONERROR    => false,
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => http_build_query($data),
        CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4
    ]);
    
    $response = curl_exec($curl);
    $error = curl_error($curl);
    
    curl_close($curl);
    $response = json_decode($response)->data;

    // dd($response);
    return $response ? $response : $error;
  }
  
  public function detailTransaction($reference)
  {
    $apiKey = env('TRIPAY_API_KEY');
    
    $payload = ['reference'	=> $reference];
    
    $curl = curl_init();
    
    curl_setopt_array($curl, [
        CURLOPT_FRESH_CONNECT  => true,
        CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/transaction/detail?'.http_build_query($payload),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER         => false,
        CURLOPT_HTTPHEADER     => ['Authorization: Bearer '.$apiKey],
        CURLOPT_FAILONERROR    => false,
        CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4
    ]);
    
    $response = curl_exec($curl);
    $error = curl_error($curl);
    
    curl_close($curl);

    $response = json_decode($response)->data;
    // dd($response);
    return $response ? $response : $error;
  }
}
