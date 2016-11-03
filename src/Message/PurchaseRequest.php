<?php

namespace Omnipay\DummyNC\Message;

use Omnipay\Common\Message\AbstractRequest;

/**
 * DummyNC Purchase Request
 */
class PurchaseRequest extends AbstractRequest
{
	private $resultoutcomes = array(
		'success' => 'Your Order has been processed successfully',
		'fail' => 'There has been an error - your order has not been processed, please try again.',
		'cancel' => 'You have cancelled the transaction - you order has not been processed.'
	);

    public function getData()
    {
    	$this->validate('amount');		// must be defined

    	$data = array();
        $data['amount'] = $this->getAmount();
        $data['testOutcome'] = $this->getTestOutcome();

        // Either the nodifyUrl or the returnUrl can be provided.
        // The returnUrl is deprecated, as strictly this is a notifyUrl.
        if (!$data['MC_callback'] = $this->getNotifyUrl()) {
        	$this->validate('returnUrl');
        	$data['MC_callback'] =  $this->getReturnUrl();
        }
        $data['cartId'] = $this->getTransactionId();

        return $data;
    }

    public function sendData($data)
    {
    	$data['reference'] = uniqid();
        return $this->response = new PurchaseResponse($this, $data);
    }

    /*
     * functions for testing different scenarios - 'success', 'fail', 'cancel'
     */
    public function getTestOutcome() {
    	return $this->getParameter('testOutcome');
    }

    public function setTestOutcome($value = '') {
    	// this could be an invalid value - set to a valid value - default success
    	$value = in_array($value, array_keys($this->resultoutcomes)) ? $value : array_keys($this->resultoutcomes)[0];
    	return $this->setParameter('testOutcome', $value);
    }

    public function getOutcomeMessage($outcome) {
    	return $this->resultoutcomes[$outcome];
    }
}
