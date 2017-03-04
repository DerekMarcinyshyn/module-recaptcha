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

namespace Monashee\Recaptcha\Plugin\Customer\Controller\Account;

use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Message\ManagerInterface;
use Monashee\Recaptcha\Helper\Data;

class ForgotPasswordPost
{

    /**
     * @var RedirectFactory
     */
    protected $resultRedirectFactory;

    /**
     * @var ManagerInterface
     */
    protected $messageManager;

    /**
     * @var Data
     */
    protected $dataHelper;

    /**
     * Post constructor.
     * @param RedirectFactory $resultRedirectFactory
     * @param ManagerInterface $messageManager
     * @param Data $dataHelper
     */
    public function __construct(
        RedirectFactory $resultRedirectFactory,
        ManagerInterface $messageManager,
        Data $dataHelper
    ) {
        $this->resultRedirectFactory = $resultRedirectFactory;
        $this->messageManager = $messageManager;
        $this->dataHelper = $dataHelper;
    }

    public function aroundExecute(
        \Magento\Customer\Controller\Account\ForgotPasswordPost $subject,
        \Closure $proceed
    ) {
        if ($this->dataHelper->isEnabled()) {
            $recaptchaResponse = $subject->getRequest()->getPost('g-recaptcha-response');

            if ($recaptchaResponse) {
                $secretKey = $this->dataHelper->getSecretKey();
                $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" .
                    $secretKey . "&response=" . $recaptchaResponse . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
                $result = json_decode($response, true);

                if (isset($result['success']) && $result['success']) {
                    return $proceed();
                } else {
                    return $this->recaptchaError();
                }
            } else {
                return $this->recaptchaError();
            }
        }

        return $proceed();
    }

    /**
     * Recaptcha Error
     *
     * @return \Magento\Framework\Controller\Result\Redirect
     */
    protected function recaptchaError(): \Magento\Framework\Controller\Result\Redirect
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $this->messageManager->addErrorMessage(__('There was an error with the Recaptcha, please try again.'));
        $resultRedirect->setPath('customer/account/forgotpassword');

        return $resultRedirect;
    }
}
