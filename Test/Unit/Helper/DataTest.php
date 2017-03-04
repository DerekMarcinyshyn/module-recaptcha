<?php
/**
 * Recaptcha
 *
 * @author Derek Marcinyshyn <derek@marcinyshyn.com>
 * @copyright (C) 2017  Derek Marcinyshyn
 * @license Open Software License version 3.0
 */
namespace Monashee\Recaptcha\Test\Unit\Helper;

use Monashee\Recaptcha\Helper\Data;

class DataTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Data
     */
    protected $_dataHelper;

    /**
     * Is called before running a test
     */
    protected function setUp()
    {
        $objectManager = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $this->_dataHelper = $objectManager->getObject(Data::class);
    }

    public function testExists()
    {
        $this->assertTrue(class_exists(Data::class));
    }

    public function testEnabled()
    {
        $this->assertNull($this->_dataHelper->isEnabled());
    }

    public function testSiteKey()
    {
        $this->assertNull($this->_dataHelper->getSiteKey());
    }

    public function testSecretKey()
    {
        $this->assertNull($this->_dataHelper->getSecretKey());
    }
}
