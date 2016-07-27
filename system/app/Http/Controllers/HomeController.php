<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	//initial vals
	private $params = [
		'company' => [],
		'processor' => [],
		'screen_size' => [],
		'ram' => [],
		'price'=>[0, 5000]
	];

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{

	}

	/**
	 * Show the application dashboard to the user
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = Product::take(5)->get();
		return view('home', compact('products'));
	}
	/**
	 * Show the application filtered info
	 *
	 * @return Response
	 */
	public function filter(Request $r)
	{
		foreach($r->all() as $i=>$param){
			$name = ($i == 'screen' ? 'screen_size' : $i);
			$this->params[$name] = explode('|',$param);
		}
		 
		$prods = Product::where('id','>','0');


		if( $this->_exists('company')){
			$prods->whereIn('company', $this->params['company']);
		}
		
		if( $this->_exists('screen_size')){
			$prods->whereIn('screen_size', $this->params['screen_size']);
		}

		if( $this->_exists('price')){
			$prods->whereBetween('price', $this->params['price']);
		}

		if( $this->_exists('ram')){
			$prods->whereIn('ram', $this->params['ram']);
		}

		if( $this->_exists('processor')){
			$prods->whereIn('processor', $this->params['processor']);
		}

		$products = $prods->orderBy('created_at', 'DESC')->get();
		return json_encode($products);
	}

	private function _exists($field) {
		return count($this->params[$field]) > 0;
	}
}
