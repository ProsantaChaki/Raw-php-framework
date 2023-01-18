<?php

namespace App\Repository\Eloquent;

use App\Helpers\Params;
use App\Models\Inventory;
use App\Models\User;


class InventoryRepository
{
    public function insertOrUpdate($item){
        $itemData = array();
        $itemData[] = Inventory::find(Params::get('id'));

        /*$itemData = $this->getSingle([['item_id',$item['item_id']]]);
        if (!$itemData){
            return $this->create($item);
        }else{
            $amount =$item['amount']+$itemData['amount'];
            $this->update($itemData['id'],['amount'=>$amount] );
            return $this->getSingle([['item_id',$item['item_id']],['type',$item['type']]]);
        }*/
    }

    public function updateInventory($item){
        /*$itemData = $this->getSingle([['item_id',$item['item_id']]]);
        if ($itemData && $itemData['amount']>=$item['amount']){
            $amount =$itemData['amount']-$item['amount'];
             $this->update($itemData['id'],['amount'=>$amount] );
            return $this->getSingle([['item_id',$item['item_id']]]);
        }*/
        return false;
    }
}
