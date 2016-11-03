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
    	$data = array();
    	// pretend all is well in the world
    	$data['transStatus'] = 'Y';  // other option would be 'C' for cancelled
    	$data['rawAuthMessage'] = 'Order has been processed successfully.  :) ';

        return $data;
    }

    public function sendData($data)
    {
        return $this->response = new CompletePurchaseResponse($this, $data);
    }
}
