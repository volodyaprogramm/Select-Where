<?php


namespace App\Model;


use Common\Database\DBConnector;
class Gallery extends AbstractModel
{
    private $dbconnectorGarry;

    public function __construct()
    {
        $connect = new DbConnector();
        $this->dbconnectorGarry = $connect->connect();

    }

    public function getAllTitle(): array
    {
        $sql = 'SELECT * FROM galerry';
        $result = $this->dbconnectorGarry->query($sql);
        return $result->fetchAll();



    }
}
