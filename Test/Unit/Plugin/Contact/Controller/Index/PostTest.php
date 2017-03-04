<?php
/**
 * Recaptcha
 *
 * @author Derek Marcinyshyn <derek@marcinyshyn.com>
 * @copyright (C) 2017  Derek Marcinyshyn
 * @license Open Software License version 3.0
 */
namespace Monashee\Recaptcha\Test\Unit\Plugin\Contact\Controller\Index;

use Monashee\Recaptcha\Plugin\Contact\Controller\Index\Post;

class PostTest extends \PHPUnit_Framework_TestCase
{

    public function testExists()
    {
        $this->assertTrue(class_exists(Post::class));
    }
}