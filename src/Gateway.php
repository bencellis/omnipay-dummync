<?php

namespace Omnipay\DummyNC;

use Omnipay\Common\AbstractGateway;
use Omnipay\DummyNC\Message\AuthorizeRequest;

/**
 * DummyNC Gateway
 *
 * This gateway is useful for testing.
 *
 */
class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'DummyNC';
    }

    public function getDefaultParameters()
    {
        return array();
    }

    public function purchase(array $parameters = array())
    {
    	return $this->createRequest('\Omnipay\DummyNC\Message\PurchaseRequest', $parameters);
    }

    public function completePurchase(array $parameters = array())
    {
    	return $this->createRequest('\Omnipay\DummyNC\Message\CompletePurchaseRequest', $parameters);
    }

}
