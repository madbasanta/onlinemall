<?php
namespace App\Traits\Controller;

use App\Models\{Order, Inventory, Product, Address};
use App\User;
use Illuminate\Http\Request;

trait OrderController {

    private function saveOrder($request, $order = null) {
        $full_name = $request->has('name') ? explode(' ', $request->name) : [];
        $order = $order ?: new Order;
        $order->last_name = array_pop($full_name) ?: $request->last_name;
        $order->first_name = implode(' ', $full_name) ?: $request->first_name;
        $order->email = $request->email;
        $order->contact = $request->phone;
        $order->save();
        return $order;
    }

    private function saveAddress($request, $address = null) {
        $add = $address ?: new Address;
        $add->add1 = $request->add1;
        $add->add2 = $request->add2;
        $add->city = $request->city;
        $add->state = $request->state ?? '-';
        $add->country = $request->country ?? '-';
        $add->zip = $request->zip ?? '-';
        $add->save();
        return $add;
    }

    private function setInventories($order, $data) {
        $order->inventories()->detach();
        $order->inventories()->attach($inv = $this->inventories($data));
        return $inv;
    }

    private function inventories($data) {
        $inv = $data['inventory_id'] ?? [];
        $quantity = $data['qty'] ?? [];
        $quantityIndex = $this->getQauntityIndex($inv);
        $inventories = Inventory::whereIn('id', $inv)->limit(sizeof($inv))->get();
        $hold = array();
        foreach ($inventories as $key => $inventory)
            $hold[$inventory->id] = [
                'quantity' => $quantity[$quantityIndex[$inventory->id]],
                'price' => $inventory->getCurrenctPrice()
            ];
        return $hold;
    }

    private function getQauntityIndex($data) {
        $hold = array();
        foreach ($data as $row => $inv)
            $hold[$inv] = $row;
        return $hold;
    }

    private function validateRequest(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'add1' => 'required',
            'city' => 'required'
        ]);
    }
}