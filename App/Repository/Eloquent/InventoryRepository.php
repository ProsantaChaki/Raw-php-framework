<?php

namespace App\Repository\Eloquent;

use App\Models\Inventory;
use App\Models\User;


class InventoryRepository
{
    public function insertOrUpdate($item){

        $itemData = Inventory::find($item['item_id']);
        if (!$itemData){
            return Inventory::create($item);
        }else{
            $amount =$item['amount']+$itemData->amount;
            Inventory::update($itemData->id,['amount'=>$amount] );
            return Inventory::getSingle(['item_id'=>$item['item_id'],'type'=>$item['type']]);
        }
    }

    public function updateInventory($item){
        $itemData = Inventory::getSingle(['item_id'=>$item['item_id']]);
        if ($itemData && $itemData->amount>=$item['amount']){
            $amount =$itemData->amount-$item['amount'];
             Inventory::update($itemData->id,['amount'=>$amount] );
            return Inventory::getSingle(['item_id'=>$item['item_id']]);
        }
        return false;
    }

    public function getInventory( $type)
    {
        return Inventory::getAmountByType($type);
    }
}
