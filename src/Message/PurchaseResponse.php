<?php

namespace Omnipay\DummyNC\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;
use Omnipay\Common\Exception\InvalidResponseException;

/**
 * DummyNC Purchase Response
 */
class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{
    public function isSuccessful()
    {
        return false;
    }

    public function isRedirect()
    {
    	if ($this->getRequest()->getTestOutcome()  == 'success')
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    }

    public function isCancelled()
    {
    	if ($this->getRequest()->getTestOutcome() == 'cancel')
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    }

    public function getData() {
    	error_log(__METHOD__);

		$data = array();
		$outcome = $this->getRequest()->getTestOutcome();			// set in calling code

		if ($outcome == 'fail')
		{
			throw new InvalidResponseException($this->getRequest()->getOutcomeMessage($result));
		}

		$data['testOutcome'] = $outcome;
		$this->setMessage($this->getRequest()->getOutcomeMessage($outcome));

		return $data;
    }

    // this should only be called if isRedirect() returns true
    public function getRedirectUrl()
    {
    	// here we just by pass the step to redirect to pay processor
    	// and instead use the success or fail URL to redirect the browser
  		if (!$redirecturl = $this->getRequest()->getNotifyUrl())
   		{
   			$redirecturl = $this->getRequest()->getReturnUrl();
   		}
        return $redirecturl;
    }

    public function getRedirectMethod()
    {
        return 'GET';
    }

    public function getRedirectData()
    {
        return null;
    }
}
