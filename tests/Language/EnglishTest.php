<?php
/**
 * This file is part of the travis-ci-example package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HelloTest\Language;

use \Hello\Language\English;

class EnglishTest extends \PHPUnit_Framework_TestCase
{
    private $english;

    public function testGetDb()
    {
        $this->assertInstanceOf('\PDO', $this->getEnglish()->getDb());
    }

    public function testGetGreeting()
    {
        $expectedValue = 'Hello, World!';
        $this->assertSame($expectedValue, $this->getEnglish()->getGreeting());
    }

    public function setUp()
    {
        $this->english = new English(new \PDO(HELLO_DB_DSN, HELLO_DB_USERNAME, HELLO_DB_PASSWORD));
        $this->english->getDb()->exec('CREATE TABLE messages (
          language_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
          message VARCHAR(25) NOT NULL)');
        $this->english->getDb()->exec("INSERT INTO messages(language_id, message) VALUES(1, 'Hello, World!')");
    }

    protected function tearDown()
    {
        /*
        $this->getEnglish()->getDb()->exec('DROP TABLE messages');
        $this->getEnglish()->getDb()->close();
        */
    }

    protected function getEnglish()
    {
        return $this->english;
    }
}