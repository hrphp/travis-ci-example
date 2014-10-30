<?php
/**
 * This file is part of the travis-ci-example package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hello;

use \Hello\Language\LanguageInterface;

class HelloWorld
{
    private $language;

    public function __construct(LanguageInterface $language)
    {
        $this->language = $language;
    }

    public function greet()
    {
        return sprintf('<pre>%s</pre>', $this->getLanguage()->getGreeting());
    }

    public function getLanguage()
    {
        return $this->language;
    }
}
