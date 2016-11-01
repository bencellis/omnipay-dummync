<?php

namespace Omnipay\DummyNC\Message;

use Omnipay\Common\Exception\InvalidResponseException;

/**
 * DummyNC Complete Purchase Request
 */
class CompletePurchaseRequest extends PurchaseRequest
{
    public function getData()
    {
        return $this->httpRequest->request->all();

    	//return array();
    }

    public function sendData($data)
    {
        return $this->response = new CompletePurchaseResponse($this, $data);
    }
}
