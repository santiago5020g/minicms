<?php

namespace App\Http\Controllers\Cr\pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cr\Page;

class PageController extends Controller
{	
	protected $page = "";
	protected $request = "";

    public function page($id)
    {
    	$this->page = Page::where("id",$id)->first();
    	return view("Cr/pages/page",["page" => $this->page]);
    }

    public function savePage(Request $request)
    {	
    	$this->request = $request;
    	$this->page = Page::where("id",$this->request->idpage)->first();
    	$this->page->content = $this->request->content;
    	$info["status"] = $this->page->save();
    	if(!$info)
    	{	
    		$info["message"] = "Error al guardar";
    		return json_encode($info);
    	}

    	$info["message"] = "Guardado!";
    	return json_encode($info);
    }
}
