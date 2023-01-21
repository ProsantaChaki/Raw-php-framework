<?php

namespace App\Controllers;

require_once 'App/Services/InventoryService.php';

use App\Models\Inventory;
use App\Services\InventoryService;
use http\Client\Request;

class InventoryController
{
    protected $inventoryServices;
    public function __construct()
    {
        $this->inventoryServices =  new InventoryService();
    }

    public function index()
    {
        $inventories = Inventory::getAll();
        return json_encode($inventories);
    }

    private function validation($type){
        if(isset($_POST['item_id']) && (trim($_POST['item_id']) != '') ) {
            $request['item_id']=$_POST['item_id'];
        }
        else {
            $errors[] = "Please give a Item_id";
        }
        if(isset($_POST['type']) && (trim($_POST['type']) != '') ) {
            $request['type']=$_POST['type'];
        }
        else if($type == 'insert'){
            $errors[] = "Please give a type";
        }
        if(isset($_POST['amount']) && (intval(trim($_POST['amount'])) > 0) ) {
            $request['amount']=$_POST['amount'];
        }
        else {
            $errors[] = "Minimum Amount is 1";
        }

        if (isset($errors)){
            $data['status']=false;
            $data['message']=$errors;
        }else{
            $data['status']=true;
            $data['data']=$request;
        }
        return $data;

    }

    public function getStock($data){
        return $this->inventoryServices->getItem($data);
    }

    public function addItem(){
        $validation = $this->validation('insert');
        if(!$validation['status']) {
            return json_encode($validation);
        }
        return $this->inventoryServices->addItem($validation['data']);
    }
    public function removeItem(){
        $validation = $this->validation('delete');
        if(!$validation['status']) {
            return json_encode($validation);
        }
        return $this->inventoryServices->removeItem($validation['data']);
    }
}
