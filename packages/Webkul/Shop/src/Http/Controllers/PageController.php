<?php

namespace Webkul\Shop\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Webkul\Shop\Http\Controllers\Controller;
use Webkul\Core\Repositories\SliderRepository;
use Webkul\Product\Repositories\SearchRepository;

class PageController extends Controller
{

	public function aboutUs()
	{
		return view($this->_config['view']); 
	}
	public function faq()
	{
		return view($this->_config['view']); 
	}

}

?>