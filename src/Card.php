<?php

namespace Zainpay\SDK;

use GuzzleHttp\Exception\GuzzleException;
use Zainpay\SDK\Lib\RequestTrait;

class Card
{
    use RequestTrait;

    /**
     * @throws GuzzleException
     */
    public function initializeCardPayment(
        String $amount,
        String $txnRef,
        String $emailAddress,
        String $mobileNumber,
        String $zainboxCode,
        String $callBackUrl
    ): Response {
        return $this->post($this->getModeUrl() . 'zainbox/card/initialize/payment', [
            'amount' => $amount,
            'txnRef' => $txnRef,
            'emailAddress' => $emailAddress,
            'mobileNumber' => $mobileNumber,
            'zainboxCode' => $zainboxCode,
            'callBackUrl' => $callBackUrl
        ]);
    }

    /**
     * @throws GuzzleException
     */
    public function verifyCardPayment(
        String $transactionReference
    ): Response {
        return $this->get($this->getModeUrl() . 'virtual-account/wallet/deposit/verify/' . $transactionReference);
    }

    public function verifyCardPaymentV2(
        String $transactionReference
    ): Response {
        return $this->get($this->getModeUrl() . 'virtual-account/wallet/deposit/verify/v2/' . $transactionReference);
    }

    /**
     * Reconcile a hanging card payment
     *
     * @param string $txnRef - The transaction reference that was used to initiate the card payment
     * @return Response
     * @throws GuzzleException
     *
     * @link https://zainpay.ng/developers/api-endpoints?section=reconcile-card-payment
     */
    public function reconcileCardPayment(
        string $txnRef
    ): Response {
        return $this->post($this->getModeUrl() . 'transaction/reconcile/card-payment', [

            'txnRef' => $txnRef
        ]);
    }
}
