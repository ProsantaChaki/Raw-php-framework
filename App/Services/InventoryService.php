<?php

namespace App\Services;

require 'App/Repository/Eloquent/InventoryRepository.php';
require 'App/Models/Inventory.php';

use App\Models\Inventory;
use  App\Repository\Eloquent\InventoryRepository;


class InventoryService
{
    protected $inventoryRepository;

    public function __construct()
    {
        $this->inventoryRepository = new InventoryRepository(new Inventory);
    }

    public function addItem($item)
    {
        try {
            $data = $this->inventoryRepository->insertOrUpdate([
                'item_id' => $item['item_id'],
                'type' => $item['type'],
                'amount' => $item['amount']
            ]);
            return json_encode(['status' => 'Success', 'data' => $data]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
            //logger($exception->getMessage());
        }

    }

    public function removeItem($item)
    {
        try {
            $data = $this->inventoryRepository->updateInventory([
                'item_id' => $item['item_id'],
                'amount' => $item['amount']
            ]);
            return json_encode(['status' => 'Success', 'data' => $data]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function getItem($item)
    {
        try {
            $data = $this->inventoryRepository->getInventory('food');
            return json_encode(['status' => 'Success', 'data' => $data]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
            //logger($exception->getMessage());
        }
    }

}
