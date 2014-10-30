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
        $this->english->getDb()->exec('UPDATE messages SET language_id = 2 WHERE language_id = 1');
        $this->assertNull($this->getEnglish()->getGreeting());
    }

    protected function setUp()
    {
        exec(sprintf('mysql -u %s -e \'CREATE DATABASE IF NOT EXISTS hello_world_test;\'', HELLO_DB_USERNAME));
        $this->english = new English(new \PDO(HELLO_DB_DSN, HELLO_DB_USERNAME, HELLO_DB_PASSWORD));
        $this->english->getDb()->exec('CREATE TABLE messages (
          language_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
          message VARCHAR(25) NOT NULL)');
        $this->english->getDb()->exec("INSERT INTO messages(language_id, message) VALUES(1, 'Hello, World!')");
    }

    protected function tearDown()
    {
        $this->getEnglish()->getDb()->exec('DROP DATABASE hello_world_test');
    }

    protected function getEnglish()
    {
        return $this->english;
    }
}
