<?php


namespace App\Model;

use common\Database\DbConnector;

class Index extends AbstractModel
{
    private $dbconnectorIndex;

    public function __construct()
    {
        $connect = new DbConnector();
        $this->dbconnectorIndex = $connect->connect();

    }

    public function getAllTitle(): array
    {
        $sql = 'SELECT * FROM inds';
        $result = $this->dbconnectorIndex->query($sql);
        return $result->fetchAll();



    }
}