<?php

namespace Tjmugova\Dpo\Transactions;

use Tjmugova\Dpo\Dpo;
use Tjmugova\Dpo\Exceptions\HttpException;

class Token
{
    public Dpo $dpo;
    public array $services = [];

    public function __construct(Dpo $dpo)
    {
        $this->dpo = $dpo;
    }
    /**
     * @param array $payload
     * @return mixed
     * @throws HttpException
     */
    public function createToken($payload)
    {

        $postData = '<?xml version="1.0" encoding="utf-8"?><API3G>';
        $postData .= '<CompanyToken>' . $this->dpo->config['token'] . '</CompanyToken>';
        $postData .= '<Request>createToken</Request>';
        $postData .= '<Transaction>';
        $postData .= "<PaymentAmount>" . $payload['paymentAmount'] . "</PaymentAmount>";
        if (!empty($payload['paymentCurrency'])) {
            $postData .= "<PaymentCurrency>" . $payload['paymentCurrency'] . "</PaymentCurrency>";
        } else {
            $postData .= "<PaymentCurrency>" . $this->dpo->config['currency'] . "</PaymentCurrency>";
        }
        if (!empty($payload['companyRef'])) {
            $postData .= "<CompanyRef>" . $payload['companyRef'] . "</CompanyRef>";
        }
        if (!empty($payload['redirectURL'])) {
            $postData .= "<RedirectURL>" . $payload['redirectURL'] . "</RedirectURL>";
        }
        if (!empty($payload['backURL'])) {
            $postData .= "<BackURL>" . $payload['backURL'] . "</BackURL>";
        }
        if (!empty($payload['companyRefUnique'])) {
            $postData .= "<CompanyRefUnique>" . $payload['companyRefUnique'] . "</CompanyRefUnique>";
        }
        if (!empty($payload['ptl'])) {
            $postData .= "<PTL>" . $payload['ptl'] . "</PTL>";
        }
        if (!empty($payload['ptlType'])) {
            $postData .= "<PTLtype>" . $payload['ptlType'] . "</PTLtype>";
        }
        if (!empty($payload['transactionChargeType'])) {
            $postData .= "<TransactionChargeType>" . $payload['transactionChargeType'] . "</TransactionChargeType>";
        }
        if (!empty($payload['transactionAutoChargeDate'])) {
            $postData .= "<TransactionAutoChargeDate>" . $payload['transactionAutoChargeDate'] . "</TransactionAutoChargeDate>";
        }
        if (!empty($payload['customerEmail'])) {
            $postData .= "<customerEmail>" . $payload['customerEmail'] . "</customerEmail>";
        }
        if (!empty($payload['customerFirstName'])) {
            $postData .= "<customerFirstName>" . $payload['customerFirstName'] . "</customerFirstName>";
        }
        if (!empty($payload['customerLastName'])) {
            $postData .= "<customerLastName>" . $payload['customerLastName'] . "</customerLastName>";
        }
        if (!empty($payload['customerAddress'])) {
            $postData .= "<customerAddress>" . $payload['customerAddress'] . "</customerAddress>";
        }
        if (!empty($payload['customerCity'])) {
            $postData .= "<customerCity>" . $payload['customerCity'] . "</customerCity>";
        }
        if (!empty($payload['customerCountry'])) {
            $postData .= "<customerCountry>" . $payload['customerCountry'] . "</customerCountry>";
        }
        if (!empty($payload['customerDialCode'])) {
            $postData .= "<customerDialCode>" . $payload['customerDialCode'] . "</customerDialCode>";
        }
        if (!empty($payload['customerPhone'])) {
            $postData .= "<customerPhone>" . $payload['customerPhone'] . "</customerPhone>";
        }
        if (!empty($payload['customerZip'])) {
            $postData .= "<customerZip>" . $payload['customerZip'] . "</customerZip>";
        }
        if (!empty($payload['demandPaymentbyTraveler'])) {
            $postData .= "<DemandPaymentbyTraveler>" . $payload['demandPaymentbyTraveler'] . "</DemandPaymentbyTraveler>";
        }
        if (!empty($payload['emailTransaction'])) {
            $postData .= "<EmailTransaction>" . $payload['emailTransaction'] . "</EmailTransaction>";
        }
        if (!empty($payload['companyAccRef'])) {
            $postData .= "<CompanyAccRef>" . $payload['companyAccRef'] . "</CompanyAccRef>";
        }
        if (!empty($payload['userToken'])) {
            $postData .= "<userToken>" . $payload['userToken'] . "</userToken>";
        }
        if (!empty($payload['defaultPayment'])) {
            $postData .= "<DefaultPayment>" . $payload['defaultPayment'] . "</DefaultPayment>";
        }
        if (!empty($payload['defaultPaymentCountry'])) {
            $postData .= "<DefaultPaymentCountry>" . $payload['defaultPaymentCountry'] . "</DefaultPaymentCountry>";
        }
        if (!empty($payload['defaultPaymentMNO'])) {
            $postData .= "<DefaultPaymentMNO>" . $payload['defaultPaymentMNO'] . "</DefaultPaymentMNO>";
        }
        if (!empty($payload['transactionToPrep'])) {
            $postData .= "<TransactionToPrep>" . $payload['transactionToPrep'] . "</TransactionToPrep>";
        }
        if (!empty($payload['allowRecurrent'])) {
            $postData .= "<AllowRecurrent>" . $payload['allowRecurrent'] . "</AllowRecurrent>";
        }
        if (!empty($payload['fraudTimeLimit'])) {
            $postData .= "<FraudTimeLimit>" . $payload['fraudTimeLimit'] . "</FraudTimeLimit>";
        }
        if (!empty($payload['voidable'])) {
            $postData .= "<Voidable>" . $payload['voidable'] . "</Voidable>";
        }
        if (!empty($payload['chargeType'])) {
            $postData .= "<ChargeType>" . $payload['chargeType'] . "</ChargeType>";
        }
        if (!empty($payload['transMarketplace'])) {
            $postData .= "<TRANSmarketplace>" . $payload['transMarketplace'] . "</TRANSmarketplace>";
        }
        if (!empty($payload['transBlockCountries'])) {
            $postData .= "<TRANSblockCountries>" . $payload['transBlockCountries'] . "</TRANSblockCountries>";
        }
        if (!empty($payload['metaData'])) {
            $postData .= "<MetaData>" . $payload['metaData'] . "</MetaData>";
        }
        if (!empty($payload['smsTransaction'])) {
            $postData .= "<SMSTransaction>" . $payload['smsTransaction'] . "</SMSTransaction>";
        }
        if (!empty($payload['transactionType'])) {
            $postData .= "<TransactionType>" . $payload['transactionType'] . "</TransactionType>";
        }
        if (!empty($payload['deviceId'])) {
            $postData .= "<DeviceId>" . $payload['deviceId'] . "</DeviceId>";
        }
        if (!empty($payload['deviceCountry'])) {
            $postData .= "<DeviceCountry>" . $payload['deviceCountry'] . "</DeviceCountry>";
        }
        if (!empty($payload['transactionSource'])) {
            $postData .= "<TransactionSource>" . $payload['transactionSource'] . "</TransactionSource>";
        }
        $postData .= '</Transaction>';
        if (count($this->services)) {
            $postData .= "<Services>";
            foreach ($this->services as $key) {
                $postData .= "<Service>";
                $postData .= "<ServiceType>";
                $postData .= $key['serviceType'] ?? $this->dpo->config['service_id'];
                $postData .= "</ServiceType>";
                $postData .= "<ServiceDescription>";
                $postData .= $key['serviceDescription'];
                $postData .= "</ServiceDescription>";
                $postData .= "<ServiceDate>";
                $postData .= $key['serviceDate'];
                $postData .= "</ServiceDate>";
                if (!empty($key['serviceFrom'])) {
                    $postData .= "<ServiceFrom>" . $key['serviceFrom'] . "</ServiceFrom>";
                }
                if (!empty($key['serviceTo'])) {
                    $postData .= "<ServiceTo>" . $key['serviceTo'] . "</ServiceTo>";
                }
                if (!empty($key['serviceRef'])) {
                    $postData .= "<ServiceRef>" . $key['serviceRef'] . "</ServiceRef>";
                }
                $postData .= "</Service>";
                $postData .= "</Services>";
            }
        }
        $postData .= '</API3G>';
        $request = $this->dpo->http->send('POST', $this->dpo->config['api_url'], [
            'body' => $postData
        ]);
        $response = json_decode(json_encode(simplexml_load_string($request->body())), true);
        if ($response['Result'] === '000') {
            $response['RedirectURL'] = $this->redirectUrl($response['TransToken']);
        }
        return $response;

    }
    /**
     * @param array $payload
     * @return mixed
     * @throws HttpException
     */
    public function verifyToken($payload)
    {

        $postData = '<?xml version="1.0" encoding="utf-8"?><API3G>';
        $postData .= '<CompanyToken>' . $this->dpo->config['token'] . '</CompanyToken>';
        $postData .= '<Request>verifyToken</Request>';
        $postData .= "<TransactionToken>" . $payload['transToken'] . "</TransactionToken>";
        $postData .= "<PaymentAmount>" . $payload['paymentAmount'] . "</PaymentAmount>";
        if (!empty($payload['VerifyTransaction'])) {
            $postData .= "<VerifyTransaction>" . $payload['verifyTransaction'] . "</VerifyTransaction>";
        }
        if (!empty($payload['accRef'])) {
            $postData .= "<ACCref>" . $payload['accRef'] . "</ACCref>";
        }
        if (!empty($payload['customerPhone'])) {
            $postData .= "<customerPhone>" . $payload['customerPhone'] . "</customerPhone>";
        }
        if (!empty($payload['customerPhonePrefix'])) {
            $postData .= "<customerPhonePrefix>" . $payload['customerPhonePrefix'] . "</customerPhonePrefix>";
        }
        if (!empty($payload['customerEmail'])) {
            $postData .= "<customerEmail>" . $payload['customerEmail'] . "</customerEmail>";
        }
        $postData .= '</API3G>';
        $request = $this->dpo->http->send('POST', $this->dpo->config['api_url'], [
            'body' => $postData
        ]);
        $response = json_decode(json_encode(simplexml_load_string($request->body())), true);
        return $response;

    }

    public function redirectUrl($transToken)
    {
        return $this->dpo->config['payment_url'] . '?ID=' . $transToken;
    }

    public function addService(array $data)
    {
        $this->services[] = $data;
    }

    public function removeService($index)
    {
        unset($this->services[$index]);
    }
}