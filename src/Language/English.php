<?php
/**
 * This file is part of the travis-ci-example package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hello\Language;

class English implements LanguageInterface
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function getGreeting()
    {
        $results = $this->getDb()->query('SELECT message FROM messages WHERE language_id = 1 LIMIT 0,1');
        foreach ($results as $row) {
            return $row['message'];
        }
    }

    public function getDb()
    {
        return $this->db;
    }
}
