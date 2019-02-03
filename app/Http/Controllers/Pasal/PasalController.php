<?php

namespace App\Http\Controllers\Pasal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Pasal, Inventory, PasalCategory, File};
use App\Http\Controllers\Crud\CrudController;
use App\Http\Controllers\HomeController;

class PasalController extends Controller
{
    public function showPasal($id)
    {
  		$pasal = Pasal::where('id', $id)->with(['address', 'categories' => function($query) {
            $query->limit(4);
        }])->first();
    	return view('admin.model.pasal.index', compact('pasal'));
    }

    public function getData(Pasal $pasal) {
        return ['data' => $pasal->inventories()->with('product', 'currency')->get() ];
    }

    public function removeInv(Pasal $pasal, Inventory $inv) {
        $inv->pasal_id = null;
        $inv->save();
        return $inv;
    }

    public function getCatData(Pasal $shop)
    {
        return array('data' => $shop->categories);
    }

    public function addCategory($shop, $mod, CrudController $controller)
    {
        return $controller->loadSubForm($mod);
    }

    public function removeCat(Pasal $shop, $cat)
    {
        $shop->categories()->detach($cat);
        return $this->showPasal($shop->id);
    }

    public function brief(HomeController $controller)
    {
        return $controller->getTopShops(3)->map(function($shop) {
            $shop->sales = $shop->inventories()->with(['orders' => function($query) {
                $query->withPivot('quantity');
            }])->get()->reduce(function($total, $inv) {
                foreach($inv->orders as $order):
                    if($order->shipped) $total += $order->pivot->quantity;
                endforeach;
                return $total;
            }, 0);
            $shop->files;
            $shop->total_items = $shop->inventories->sum('quantity');
            $shop->add = $shop->address()->first();
            $shop->join_date = date('M. Y', strtotime($shop->created_at));
            return $shop;
        });
    }

    public function uploadImage(Request $request, Pasal $shop)
    {
        $fileHandler = new File;
        $fileHandler->type = $request->type;
        $fileHandler->table_name = 'pasals';
        $fileHandler->table_id = $shop->id;
        $old_file = $shop->files()->where('type', $request->type)->first();
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = sha1($file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
            $response = $fileHandler->setFile($file)->upload(storage_path('shop'), $filename);
            if($response['uploaded'] === true) {
                $fileHandler->path = $response['path'];
                $fileHandler->save();
                if($old_file) {
                    unlink($old_file->path);
                    $old_file->delete();
                }
            }
        }
        return $this->showPasal($shop->id);
    }
}
