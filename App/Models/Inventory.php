<?php

namespace App\Models;

use App\Helpers\DB;
include "App/Models/BaseModel.php";

class Inventory extends BaseModel
{
    /**
     * Table Name
     *
     * @var string
     */
    private static $table_name = "inventories";

    /**
     * Get single user
     *
     * @param int $id
     * @return mixed
     */
    public static function find($id)
    {

        $sql = "select * from " . self::$table_name . " where item_id = '{$id}'" ;
        $inventory = DB::query($sql)->first();
        return $inventory;
    }

    /**
     * Get all users
     *
     * @return mixed
     */
    public static function getAll()
    {
        echo "get all";
        $sql = "select * from " . self::$table_name;

        $inventories = DB::query($sql)->get();

        return $inventories;
    }
    


    /**
     * Create a inventory
     *
     * @param object $data
     * @return mixed
     */
    public static function create($data)
    {
        $sql = "insert into " . self::$table_name . " set item_id=:item_id, type=:type, amount=:amount,  created_at=NOW(), updated_at=NOW()";

        return DB::query($sql)->run();
    }

    /**
     * Get last inserted user ID
     *
     * @return int
     */
    public static function update($id, $data)
    {
        $update_data='';
        foreach ($data as $key => $value){
            if($update_data!='') $update_data = $update_data.', ';
            $update_data = $update_data . "'{$key}'= {$value}";
        }
        $sql = "update " . self::$table_name . "  SET {$update_data} WHERE item_id='{$id}'";
        return DB::query($sql,$data)->run();
    }

    public static function getSingle( $data)
    {
        $condition_data='';
        foreach ($data as $key => $value){
            if($condition_data!='') $condition_data = $condition_data.' and ';
            $condition_data = $condition_data . "{$key}= '{$value}'";
        }
        $sql = "select * from " . self::$table_name . " where {$condition_data}" ;

        $inventory = DB::query($sql)->first();
        return $inventory;
    }
}