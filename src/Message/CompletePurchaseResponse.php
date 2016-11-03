<?php

namespace Omnipay\DummyNC\Message;

use Omnipay\Common\Message\AbstractResponse;

/**
 * DummyNC Complete Purchase Response
 */
class CompletePurchaseResponse extends AbstractResponse
{
    public function isSuccessful()
    {
        return isset($this->data['transStatus']) && 'Y' === $this->data['transStatus'];
    }

    public function isCancelled()
    {
        return isset($this->data['transStatus']) && 'C' === $this->data['transStatus'];
    }

    public function getTransactionReference()
    {
        return isset($this->data['transId']) ? $this->data['transId'] : null;
    }

    public function getMessage()
    {
        return isset($this->data['rawAuthMessage']) ? $this->data['rawAuthMessage'] : null;
    }
}
