<?php

namespace Common\Database;

use Common\Database\Connector;

class Select extends Where
{

    protected $tableName;
    protected $columnsName = '*';
    protected $orderBy;
    protected $join;
    protected $limit;
    protected $where;




    /**
     * @param mixed $where
     */
    public function setWhere($where): void
    {
        $this->where = $where;
    }

    /**
     * @param mixed $tableName
     */
    public function setTableName($tableName): void
    {
        $this->tableName = $tableName;
    }

    /**
     * @param mixed $columnsName
     */
    public function setColumnsName($columnsName): void
    {
        $this->columnsName = $columnsName;
    }

    /**
     * @param mixed $orderBy
     */
    public function setOrderBy($orderBy): void
    {
        $this->orderBy = $orderBy;
    }

    /**
     * @param mixed $limit
     */
    public function setLimit($limit): void
    {
        $this->limit = $limit;
    }

    /**
     * @param mixed $join
     */
    public function setJoin($join): void
    {
        $this->join = $join;
    }


    public function getSQL()
    {
        $sql = 'SELECT ' . $this->buildColumns() . 'FROM' . $this->buildTableName() . 'JOIN' . $this->buildJoin() . 'ORDER BY' . $this->buildOrderBy();


        //$sql ='SELECT gallery.id as gallery_id, about.id as about_id, gallery.text as gallery_text, about.title as about_title FROM gallery
//        INNER JOIN about ON gallery.id = about.id WHERE about.id = '. (int)$line_id .'  order by about.id DESC ;';

    }

    protected function buildColumns()
    {
        if (is_array($this->columnsName)){
            $columnString = '';
            foreach ($this->columnsName as $key=>$value ){
                if(!empty($columnString)){
                    $columnString .= ',';
                }
                if (is_int($key)){
                    $columnString .=$value;
                } else{
                    $columnString .= $value . ' as ' . $key ;
                }
            }
            return $columnString;

        } elseif (is_string($this->columnsName)){
            return $this->columnsName;
        }
        throw new Exception('parsing COLUMNS not found.');
    }


    protected function buildTableName()
    {
        if (is_array($this->tableName)){
            $tableString = '';
            foreach ($this->tableName as $key=>$value ){
                if(!empty($tableString)){
                    $tableString .= ',';
                }
                if (is_int($key)){
                    $tableString .=$value;
                } else{
                    $tableString .= $value . ' as ' . $key ;
                }
            }
            return $tableString;

        } elseif (is_string($this->tableName)){
            return $this->tableName;
        }
        throw new Exception('parsing TABLE name not found.');
    }


    public function buildJoin()
    {
        if (is_array($this->joinName)){
            $joinString = '';
            foreach ($this->joinName as $key=>$value ){
                if(!empty($joinString)){
                    $joinString .= ',';
                }
                if (is_int($key)){
                    $joinString .=$value;
                } else{
                    $joinString .= $value . ' as ' . $key ;
                }
            }
            return $joinString;

        } elseif (is_string($this->tableName)){
            return $this->joinName;
        }
        throw new Exception('parsing JOIN name not found.');
    }


    public function buildOrderBy()
    {
        $field = '';
        $countArgs = count(func_get_args());

        if (is_string($countArgs)) {
            $field .= func_get_args()[0] . ' ' . func_get_args()[1];
            $this->orderBy = $field;
        } else {
            return NULL;
        }
        throw new Exception('parsing ORDER BY name not found.');
    }
}