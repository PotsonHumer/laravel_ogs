<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

abstract class commonModel extends Model
{
    /**
    * 共通模組功能
    */

    public function preInsert(array $datas)
    {
        $fields = $this->getFields();

        foreach($fields as $field){
            if($field != $this->getKeyName()){
                $this->$field = ($datas[$field] == 'null') ? NULL : $datas[$field];
            }
        }
    }


    public function getFields()
    {
        return DB::getSchemaBuilder()->getColumnListing($this->getTable());
    }
}