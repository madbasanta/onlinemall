<?php

namespace App\Http\Controllers\Inventory;
use App\Models\{Inventory, Order, File};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InventoryController extends Controller
{
    public function showInventory(Inventory $inventory)
    {
        $inventory->product;
        $inventory->orders;
        $inventory->discount;
        $inventory->files;
    	return view('admin.model.inventory.index',compact('inventory'));
    }

    public function getData(Order $order) {
        $inventories = Inventory::select(
            '*', 'order_inventory.quantity as order_quantity', 
            'order_inventory.price as order_price', 'inventories.id as id',
            \DB::raw('order_inventory.price * order_inventory.quantity as total_order_price')
        )
        ->join('order_inventory', function($join) use($order){
            $join->on('order_inventory.inventory_id', 'inventories.id');
            $join->on('order_inventory.order_id', \DB::raw($order->id));
        })->with('product', 'currency')->get();
        return [ 'data' => $inventories ];
    }

    public function fileUpload(Request $request, Inventory $inv)
    {
        if($request->hasFile('images')):
            foreach ($request->file('images') as $image) {
                $fileHandler = new File();
                $fileHandler->table_name = $inv->getTable();
                $fileHandler->table_id = $inv->id;
                $filename = sha1($image->getClientOriginalName()) .'.'. $image->getClientOriginalExtension();
                // dump($filename);
                $response = $fileHandler->setFile($image)->upload(storage_path('inventory'), $filename);
                if($response['uploaded'] === true) {
                    $fileHandler->path = $response['path'];
                    $fileHandler->save();
                }
            }
        endif;
        return $this->showInventory($inv);
    }

    public function file(File $file)
    {
        if(file_exists($file->path)) {
            return response()->file($file->path);
        }
        return response()->file(public_path('notfound.png'));
    }

    public function fileSrc(Inventory $inv)
    {
        foreach ($inv->files as $file) {
            if (file_exists($file->path)) {
                return 'inventoryImage/' . $file->id;
            }
        }
        return '';
    }

    public function fileRemove(Inventory $inv, File $file)
    {
        unlink($file->path);
        $file->delete();
        return $this->showInventory($inv);
    }
}
