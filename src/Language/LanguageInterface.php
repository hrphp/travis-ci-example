<?php
/**
 * This file is part of the travis-ci-example package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hello\Language;

interface LanguageInterface
{
    public function getGreeting();
    public function getDb();
}
