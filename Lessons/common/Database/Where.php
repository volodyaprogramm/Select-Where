<?php

namespace Common\Database;

class Where extends Connector
{
    protected $where;

    /**
     * @param mixed $where
     */
    public function andWhere($where): void
    {
        $this->where[] = ['and' => $where];
    }


    public function orWhere($where): void
    {
        $this->where[] = ['or' => $where];
    }


    public function getWhere()
    {
        $field = '';
        if(empty($this->where)){
            return NULL;
        } else{
            foreach ($this->where as $value){
                foreach ($value as $operand=>$data){
                    foreach ($data as $before=>$after){
                        if(!empty($string)){
                            $string .= " $operand ";
                        }
                        $field .=  "$before = $after" ;
                    }
                }
            }
            return $field;
        }
    }


}