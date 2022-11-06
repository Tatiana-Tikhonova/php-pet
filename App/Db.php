<?php

namespace App;

use PDO;
use App\Models\Traits\Singleton;

/**
 * @class Db
 */
class Db
{
    use Singleton;
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
     * @param  string $sql
     * @param  array $params
     * @return bool
     */
    public function connect(string $sql, array $params = []): bool
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);
        return $res;
    }
    /**
     * @function query
     *
     * @param  string $sql
     * @param  string $class
     * @return array
     */
    public function getData(string $sql, string $class = 'stdClass'): array
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute();
        if (false !== $res) {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
        return [];
    }
}
