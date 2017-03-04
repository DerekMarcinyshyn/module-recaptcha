<?php
/**
 * Recaptcha
 *
 * @author Derek Marcinyshyn <derek@marcinyshyn.com>
 * @copyright (C) 2017  Derek Marcinyshyn
 * @license Open Software License version 3.0
 */
namespace Monashee\Recaptcha\Test\Unit\Plugin\Customer\Controller\Account;

use Monashee\Recaptcha\Plugin\Customer\Controller\Account\CreatePost;

class CreatePostTest extends \PHPUnit_Framework_TestCase
{

    public function testExists()
    {
        $this->assertTrue(class_exists(CreatePost::class));
    }
}