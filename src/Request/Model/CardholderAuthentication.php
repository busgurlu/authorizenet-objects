<?php

namespace Academe\AuthorizeNetObjects\Request\Model;

/**
 *
 */

use Academe\AuthorizeNetObjects\TransactionRequestInterface;
use Academe\AuthorizeNetObjects\AbstractModel;

class CardholderAuthentication extends AbstractModel implements TransactionRequestInterface
{
    protected $authenticationIndicator;
    protected $cardholderAuthenticationValue;

    public function __construct($authenticationIndicator = null, $cardholderAuthenticationValue = null)
    {
        parent::__construct();

        $this->setAuthenticationIndicator($authenticationIndicator);
        $this->setCardholderAuthenticationValue($cardholderAuthenticationValue);
    }

    public function hasAny()
    {
        return $this->hasAuthenticationIndicator() || $this->hasCardholderAuthenticationValue();
    }

    public function jsonSerialize()
    {
        $data = [];

        if ($this->hasAuthenticationIndicator()) {
            $data['authenticationIndicator'] = $this->getAuthenticationIndicator();
        }

        if ($this->hashasCardholderAuthenticationValue()) {
            $data['cardholderAuthenticationValue'] = $this->getCardholderAuthenticationValue();
        }

        return $data;
    }

    protected function setAuthenticationIndicator($value)
    {
        $this->authenticationIndicator = $value;
    }

    protected function setCardholderAuthenticationValue($value)
    {
        $this->cardholderAuthenticationValue = $value;
    }
}
