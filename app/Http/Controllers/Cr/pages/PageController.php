<?php

namespace App\Http\Controllers\Cr\pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cr\Page;
use App\Models\Cr\Section;
use App\Models\Cr\Menu;

class PageController extends Controller
{	
	protected $params = [];

    public function page($id)
    {
		//select the page with the section that are enabled by status=1
    	$this->params['page'] = Page::with(["menu","sections" => function($query){
			$query->where('id_status', 1);
			$query->orderBy('number', 'asc');
		}])
		->where(["id" => $id])
		->first();
		//select all the menus that are enabled
		$this->params['page']['pages'] = Page::with('menu')
		->where('id_status',1)
		->orderBy('position', 'asc')
		->get();
		//select the sections that are disabled by status 2
		$this->params['page']["sectionsDisabled"] = Section::where(["id_status" =>2,"id_page" => $id])->get();	
		//select the pages that are disabled by status 2
		$this->params['page']["pagesDisabled"] = Page::where(["id_status" =>2])->get();	
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

		//foreach of all the items menu and save the order
		foreach ($this->params['request']->menuPage as $i=> $menuPage)
		{
			$menu = Menu::where("id",$menuPage)->first();
			$page = Page::where("id_menu",$menu->id)->first();
			$page->position = $i;
			$page->save();
		}

		$this->params['status'] = true;
    	$this->params['info']["message"] = "Guardado!";
    	return json_encode($this->params['info']);
    }


	public function disableSection(Request $request)
    {	

    	$this->params['request'] = $request;
		$this->params['section'] = Section::where("id",$this->params['request']->section)->first();
		$this->params['section']->id_status = 2;
		$this->params['status']  = $this->params['section']->save();
		
		if($this->params['status'])
		{
			$this->params['info']["message"] = "Seccion deshabilitada correctamente";
		}
		else
		{
			$this->params['info']["message"] = "Error al deshabilitar la seccion";
		}
    	
    	return json_encode($this->params['info']);
    }


	public function enableSections(Request $request)
	{
		$this->params['request'] = $request;
		

		foreach ($this->params['request']->sectionDisabled as $section)
		{
			$this->params['section'] = Section::where("id",$section)->first();
			if($this->params['section'])
			{
				$this->params['section']->id_status = 1;
				$this->params['info']['status'] = $this->params['section']->save();
			}
		}


		if($this->params['info']['status'])
		{
			$this->params['info']["message"] = "Seccion Habilitada correctamente";
		}
		else
		{
			$this->params['info']["message"] = "Error al Habilitar la seccion";
		}
    	
    	return json_encode($this->params['info']);
	}


	public function addPage(Request $request)
	{
		$this->params['request'] = $request;
		//create menu
		$this->params['menu'] = new Menu();
		$this->params['menu']->name = $this->params['request']->txtPageName;
		$this->params['menu']->id_status = 1;
		$this->params['menu']->position = 0;
		$this->params['info']['status'] = $this->params['menu']->save();
		//create the pages associated to the menu
		$this->params['page'] = new Page();
		$this->params['page']->name = $this->params['request']->txtPageName;
		$this->params['page']->id_status = 1;
		$this->params['page']->position = 0;
		$this->params['page']->id_menu = $this->params['menu']->id;
		//save the page associated to the menu
		$this->params['info']['status'] = $this->params['page']->save();

		if($this->params['info']['status'])
		{
			$this->params['info']["message"] = "Pagina creada correctamente";
		}
		else
		{
			$this->params['info']["message"] = "Error al crear la pagina";
		}

		return json_encode($this->params['info']);
	}	


	
	public function disablePage(Request $request)
    {	

    	$this->params['request'] = $request;
		$this->params['page'] = Page::where("id",$this->params['request']->page)->first();
		$this->params['page']->id_status = 2;
		$this->params['info']['status']  = $this->params['page']->save();
		
		if($this->params['info']['status'])
		{
			$this->params['info']["message"] = "Pagina deshabilitada correctamente";
		}
		else
		{
			$this->params['info']["message"] = "Error al deshabilitar la Pagina";
		}
    	
    	return json_encode($this->params['info']);
    }


	public function enablePages(Request $request)
	{
		$this->params['request'] = $request;
		

		foreach ($this->params['request']->chkPagesDisabled as $page)
		{
			$this->params['page'] = page::where("id",$page)->first();
			if($this->params['page'])
			{
				$this->params['page']->id_status = 1;
				$this->params['info']['status'] = $this->params['page']->save();
			}
		}


		if($this->params['info']['status'])
		{
			$this->params['info']["message"] = "Pagina Habilitada correctamente";
		}
		else
		{
			$this->params['info']["message"] = "Error al Habilitar la Pagina";
		}
    	
    	return json_encode($this->params['info']);
	}
	

}
