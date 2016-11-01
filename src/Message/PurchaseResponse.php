<?php

namespace Omnipay\DummyNC\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * DummyNC Purchase Response
 */
class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{
    public function isSuccessful()
    {
    	error_log(__METHOD__);
        return false;
    }

    public function isRedirect()
    {
    	error_log(__METHOD__);
        return true;
    }

    public function getRedirectUrl()
    {
    	error_log(__METHOD__);
    	// here we just by pass the step to redirect to pay processor
    	// and instead use the success or fail URL to redirect the browser
		$result = $this->getRequest()->getTestResult();			// set in calling code
   		if ($result == 'success')
   		{
   			if (!$redirecturl = $this->getRequest()->getNotifyUrl())
   			{
   				$redirecturl = $this->getRequest()->getReturnUrl();
   			}
   		}
   		else
   		{ 			// cancel or fail
			$redirecturl = $this->getRequest()->getCancelUrl();
   		}
        return $redirecturl;
    }

    public function getRedirectMethod()
    {
    	error_log(__METHOD__);
        return 'GET';
    }

    public function getRedirectData()
    {
    	error_log(__METHOD__);
        return null;
    }
}
