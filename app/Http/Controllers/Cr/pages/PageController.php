<?php

namespace App\Http\Controllers\Cr\pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cr\Page;
use App\Models\Cr\Section;

class PageController extends Controller
{	
	protected $params = [];

    public function page($id)
    {
    	$this->params['page'] = Page::with("sections")
		->where("id",$id)->first();
    	return view("Cr/pages/page",["page" => $this->params['page'] ]);
    }

    public function savePage(Request $request)
    {	

    	$this->params['request'] = $request;
		$this->params['page'] = Page::where("id",$this->params['request']->idpage)->first();

		

		foreach ($this->params['request']->content as $i=> $content)
		{
			$section = Section::updateOrCreate(
				['id_page' => $this->params['page']->id, 'id' => $this->params['request']->section[$i]],
				[
					'name' => 'section_'.$i.'_page_'.$this->params['page']->id,
					'content' => $content,
					'number' => $i,
					'id_status' => 1,
					'id_page' => $this->params['page']->id,
				]
			);
		}

		$this->params['status'] = true;
    	$this->params['info']["message"] = "Guardado!";
    	return json_encode($this->params['info']);
    }
}
