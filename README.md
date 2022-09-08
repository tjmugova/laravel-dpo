# [laravel-dpo](https://dpogroup.com/)

> A laravel package for integrating DPO Payment Gateway API  to your application.

Installation :traffic_light:
-------
Add the package to your composer.json

```
"require": {
    ... 
    "tjmugova/laravel-dpo": "{version}"
},
```

Or just run composer require

```bash
$ composer require tjmugova/laravel-dpo
```

### Configuration

Add your DPO Token, Payment Url, API Url, and Currency `.env`:

```dotenv
DPO_API_URL=https://secure.3gdirectpay.com/API/v6/ # always required
DPO_PAYMENT_URL=https://secure.3gdirectpay.com/payv2.php # always required
DPO_TOKEN=57466282-EBD7-4ED5-B699-8659330A6996 # always required
DPO_SERVICE_ID=1234
```

### Advanced configuration

Run `php artisan vendor:publish --provider="Tjmugova\Dpo\DpoProvider"`

```
/config/dpo.php
```

## Usage :white_check_mark:

For full documentation, please refer
to [DPO Public API Docs](https://directpayonline.atlassian.net/wiki/spaces/API/overview?homepageId=807369)


### Create Token



```

use Tjmugova\Dpo\Facades\Dpo;
...
$token=Dpo::token();
$token->addService([
    'serviceType' => 1111,
    'serviceDescription' => 'Invoice',
    'serviceDate' => \Carbon\Carbon::now()->format("Y/m/d h:i"),
]);
$response = $token->createToken([
    'paymentAmount' => 200,
    'customerFirstName' => 'Test',
    'companyRef' => '15',
    'paymentCurrency' => 'USD',
    'redirectURL' => 'https://example.com',
    'backURL' => 'https://example.com',
]);
```

### Redirect After Successfuly Token Request 

```php
return redirect($response['RedirectURL']);
```

### Verify Token 
You can verify a token received above. The method takes various parameters as specified in the DPO API docs.

```php
$token->verifyToken([
    'transToken' => $response['transToken'],
 
]);
```

----
**`NOTE:`**

If you find any bugs or you have some ideas in mind that would make this better. Please don't hesitate to create a pull
request.

If you find this package helpful, a simple star is very much appreciated.

----
**[MIT](LICENSE) LICENSE** <br>
