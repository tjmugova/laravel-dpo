<?php
return [
    /*
   |--------------------------------------------------------------------------
   | API Credentials
   |--------------------------------------------------------------------------
   |
   | The following configuration options contain your API credentials, which
   | may be accessed from your dpo dashboard. These credentials will be
   | used to authenticate with the DPO API so you may send payments.
   |
   */
    'api_url' => env("DPO_API_URL", 'https://secure.3gdirectpay.com/API/v6/'),
    'payment_url' => env("DPO_PAYMENT_URL", 'https://secure.3gdirectpay.com/payv2.php'),
    'token' => env("DPO_TOKEN"),
    'service_id' => env("DPO_SERVICE_ID"),
    'currency' => env("DPO_CURRENCY", "USD"),

];