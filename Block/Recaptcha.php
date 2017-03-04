<?php
/**
 * Magento 2 Recaptcha for Contact Page, Customer Create, and Forgot Password
 * Copyright (C) 2017  Derek Marcinyshyn
 *
 * This file included in Monashee/Recaptcha is licensed under OSL 3.0
 *
 * http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * Please see LICENSE.txt for the full text of the OSL 3.0 license
 */

namespace Monashee\Recaptcha\Block;

use Magento\Framework\View\Element\Template;
use Monashee\Recaptcha\Helper\Data;

class Recaptcha extends Template
{

    /**
     * @var Data
     */
    protected $dataHelper;

    /**
     * Recaptcha constructor.
     * @param Template\Context $context
     * @param Data $dataHelper
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        Data $dataHelper,
        array $data = []
    ) {
        $this->dataHelper = $dataHelper;
        parent::__construct($context, $data);
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->dataHelper->isEnabled();
    }

    /**
     * @return string
     */
    public function getSiteKey()
    {
        return $this->dataHelper->getSiteKey();
    }
}