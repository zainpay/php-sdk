<?php

namespace Zainpay\SDK\Util;

class FilterUtil
{
    public static function ConstructFilterParams(?string $accountNumber, ?string $txnType, ?string $paymentChannel,  ?string $dateFrom,  ?string $dateTo)
    {
        $params = [];
        (!empty($accountNumber)) ? $params['accountNumber'] = $accountNumber : "";
        (!empty($txnType))       ? $params['txnType'] = $txnType : "";
        (!empty($paymentChannel))       ? $params['paymentChannel'] = $paymentChannel : "";
        (!empty($dateFrom))      ? $params['dateFrom'] = $dateFrom : "";
        (!empty($dateTo))        ? $params['dateTo'] = $dateTo : "";
        return $params;
    }

    public static function CardTxnHistoryFilterParams(?string $zainboxCode, ?int $count,  ?string $dateFrom,  ?string $dateTo)
    {
        $params = [];
        (!empty($zainboxCode))   ? $params['zainboxCode'] = $zainboxCode : "";
        (!empty($count))         ? $params['count'] = $count : $params['count'] = 20;
        (!empty($dateFrom))      ? $params['dateFrom'] = $dateFrom : "";
        (!empty($dateTo))        ? $params['dateTo'] = $dateTo : "";
        return $params;
    }
}
