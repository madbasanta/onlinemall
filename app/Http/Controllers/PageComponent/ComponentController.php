<?php

namespace App\Http\Controllers\PageComponent;

use App\Models\Pasal;
use App\Lib\PageHandler;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ComponentController extends Controller
{
    public function getBanner()
    {
    	return PageHandler::getComponent('banner', true);
    }

    public function addForm()
    {
    	return view('components.admin.addBanner');
    }

    /*
	uploading banner images
	@param Request $request
	@return View
    */
    public function addImage(Request $request)
    {
    	$paths = array();
    	foreach($request->file('file') as $file):
    		$path = $file->storeAs(
    			'public/banner', $file->getClientOriginalName()
    		);
    		array_push($paths, $path);
    	endforeach;
    	PageHandler::setComponent('banner', $paths);
    	return $this->getBanner();
    }

    public function removeImage(Request $request)
    {
    	$path = $request->path;
    	$component = PageHandler::getObject('banner');
    	$storage = json_decode($component->data, true);
    	unset($storage[array_search($path, $storage)]);
    	Storage::delete($path);
    	$component->data = json_encode($storage);
    	$component->save();
    	return $this->getBanner();
    }

    /*
    component pasal index
    @return View
    */
    public function getPasals()
    {
        $component = PageHandler::getObject('pasals');
        $pasals = Pasal::find(json_decode($component->data, true));
        return view('components.admin.pasals', compact('pasals'));
    }

    /*
    pasal add form
    @return View
    */
    public function addPasal()
    {
        return view('components.admin.addPasal');
    }

    public function pasalList(Request $request) {
        return Pasal::select('name as text', 'id')->when($request->term, function($query) use($request){
            $query->where('name', 'like', $request->term . '%');
        })->get();
    }

    public function storePasal(Request $request)
    {
        $ids = $request->has('pasals') ? $request->pasals : [];
        $pasals = Pasal::find($ids)->pluck('id')->toArray();
        $component = PageHandler::getObject('pasals');
        $storage = json_decode($component->data, true);
        $pushables = array_diff($pasals, $storage);
        $component->data = json_encode(array_merge($storage, $pushables));
        $component->save();
        return $this->getPasals();
    }

    public function removePasal(Request $request)
    {
        $component = PageHandler::getObject('pasals');
        $storage = json_decode($component->data, true);
        $component->data = json_encode(array_diff($storage, [$request->id]));
        $component->save();
        return $this->getPasals();
    }
}
