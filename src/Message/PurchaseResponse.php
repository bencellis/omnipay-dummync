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
        return $this->getRequest()->getcallbackURL() . '?' . http_build_query($this->data);
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
