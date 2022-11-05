<?php

namespace App;

use PDO;
use stdClass;

/**
 * @class Db
 */
class Db
{
    protected $dbh;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->dbh = new PDO('mysql:host=127.0.0.1;dbname=php-pet', 'root', '');
    }

    /**
     * @function connect
     *
     * @param  mixed $sql
     * @return bool
     */
    public function connect($sql)
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute();
        return $res;
    }
    /**
     * @function query
     *
     * @param  mixed $sql
     * @return array
     */
    public function getDataObj($sql, $class = 'stdClass')
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute();
        if (false !== $res) {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
        return [];
    }
}
