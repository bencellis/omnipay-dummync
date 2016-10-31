<?php

namespace Omnipay\DummyNC\Message;

use Omnipay\Common\Message\AbstractRequest;

/**
 * DummyNC Purchase Request
 */
class PurchaseRequest extends AbstractRequest
{
	public function getcallbackURL()
	{
		error_log(__METHOD__);
		return $this->getParameter('callbackURL');
	}

	public function setcallbackURL($value)
	{
		error_log(__METHOD__);
		return $this->setParameter('callbackURL', $value);
	}

    public function getData()
    {
    	error_log(__METHOD__);
    	$data = array();

        $this->validate('amount');
        $data['amount'] = $this->getAmount();

        // Either the nodifyUrl or the returnUrl can be provided.
        // The returnUrl is deprecated, as strictly this is a notifyUrl.
        if (!$data['MC_callback'] = $this->getNotifyUrl()) {
        	$this->validate('returnUrl');
        	$data['MC_callback'] =  $this->getReturnUrl();
        }
        $data['callbackURL'] = $this->getcallbackURL();
        $data['cartId'] = $this->getTransactionId();

       	error_log(print_r($data, true));
        return $data;
    }

    public function sendData($data)
    {
    	error_log(__METHOD__);
    	$data['reference'] = uniqid();
        return $this->response = new PurchaseResponse($this, $data);
    }

}
