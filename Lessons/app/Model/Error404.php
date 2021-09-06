<?php


namespace App\Model;


class Error404 extends AbstractModel
{

    public $title =
        [
            "keyone"=> 'manytext',
            "keytwo"=> '101',
            "keytree"=> 'London'
        ];

    public function getAboutByTitle($title)
    {

        if (array_key_exists($title, $this->title)) {
            return $this->title[$title];
        } else {
            return false;
        }

    }
    public function list()
    {
        return $this->title;
    }
}