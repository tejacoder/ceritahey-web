<?php

return [
    'mode' => env('TRIPAY_MODE', 'sandbox'),

    'merchant_code' => env('TRIPAY_MERCHANT_CODE', ''),

    'api_key' => env('TRIPAY_API_KEY', ''),

    'private_key' => env('TRIPAY_PRIVATE_KEY', ''),

    'channels' => explode(',', env('TRIPAY_CHANNELS', 'BRIVA,BNIVA,BCAVA,OVO,QRIS')),
];
