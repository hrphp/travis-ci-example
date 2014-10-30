<?php
/**
 * This file is part of the travis-ci-example package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HelloTest\Mock;

class PDOMock extends \PDO
{
    public function __construct()
    {
    }

    public function query($sql)
    {
        return array();
    }
}
