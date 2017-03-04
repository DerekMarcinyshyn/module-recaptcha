<?php
/**
 * Custom SMTP
 *
 * @author Derek Marcinyshyn <derek@marcinyshyn.com>
 * @copyright (C) 2016  Derek Marcinyshyn
 * @license Open Software License version 3.0
 */

require_once realpath('./vendor/autoload.php');

/**
 * @SuppressWarnings(PHPMD.ShortMethodName)
 */
function __()
{
    return $argc = func_get_args();
}