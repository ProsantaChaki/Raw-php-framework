<?php

namespace App\Controllers;

require_once 'App/Services/InventoryService.php';

use App\Models\Inventory;
use App\Services\InventoryService;
use http\Client\Request;

class InventoryController extends InventoryService
{
    public function index()
    {
        //echo '$request';
        $inventories = Inventory::getAll();
        return json_encode($inventories);
    }

    public function getStock(){
        echo '$item_id';
        return $this->getItem('$item_id');
    }
    public function addItem($request){
        echo $request->all();
        //return $this->addItem($request->all());
    }
    public function removeItem(  $request){
        //return $this->removeItem($request->all());
    }
}
