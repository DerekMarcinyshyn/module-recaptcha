<?php
/**
 * Recaptcha
 *
 * @author Derek Marcinyshyn <derek@marcinyshyn.com>
 * @copyright (C) 2017  Derek Marcinyshyn
 * @license Open Software License version 3.0
 */
namespace Monashee\Recaptcha\Test\Unit\Block;

use Monashee\Recaptcha\Block\Recaptcha;

class RecaptchaTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Recaptcha
     */
    protected $_recaptcha;

    protected function setUp()
    {
        $objectManager = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $this->_recaptcha = $objectManager->getObject(Recaptcha::class);
    }

    public function testRecaptchaExists()
    {
        $this->assertTrue(class_exists(Recaptcha::class));
    }

    public function testIsEnabled()
    {
        $this->assertNull($this->_recaptcha->isEnabled());
    }

    public function testGetSiteKey()
    {
        $this->assertNull($this->_recaptcha->getSiteKey());
    }
}