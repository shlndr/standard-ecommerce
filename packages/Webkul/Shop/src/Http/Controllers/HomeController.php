<?php

namespace Webkul\Shop\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Response as FacadeResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Webkul\Shop\Http\Controllers\Controller;
use Webkul\Core\Repositories\SliderRepository;
use Webkul\Product\Repositories\SearchRepository;

class HomeController extends Controller
{
    /**
     * SliderRepository object
     *
     * @var \Webkul\Core\Repositories\SliderRepository
    */
    protected $sliderRepository;

    /**
     * SearchRepository object
     *
     * @var \Webkul\Core\Repositories\SearchRepository
    */
    protected $searchRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Core\Repositories\SliderRepository  $sliderRepository
     * @param  \Webkul\Product\Repositories\SearchRepository  $searchRepository
     * @return void
    */
    public function __construct(
        SliderRepository $sliderRepository,
        SearchRepository $searchRepository
    )
    {
        $this->sliderRepository = $sliderRepository;

        $this->searchRepository = $searchRepository;

        parent::__construct();
    }

    /**
     * loads the home page for the storefront
     * 
     * @return \Illuminate\View\View 
     */
    public function index()
    {
        $currentChannel = core()->getCurrentChannel();

        $currentLocale = core()->getCurrentLocale();

        $sliderData['slide'] = $this->sliderRepository
            ->where('channel_id', $currentChannel->id)
            ->where('locale', $currentLocale->code)
            ->get()
            ->toArray();

        $sliderData['store'] = DB::table('store_locator')
            ->where('is_active',true)
            ->limit(2)
            ->orderBy('created_date','DESC')
            ->get()                        
            ->toArray();    

        //$data['data'] = DB::table('store_locator')
                    //->get();

        // echo"<pre>";print_r($sliderData);   die; 

        return view($this->_config['view'], compact('sliderData'));
    }

    /**
     * loads the home page for the storefront
     * 
     * @return \Exception
     */
    public function notFound()
    {
        abort(404);
    }

    public function reachOut(Request $request) 
    {
        // echo"<pre>";print_r($request->all());die;

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'pincode' => 'required',
            'floorsize' => 'required',
            'date_of_installation' => 'required',
            'support' => 'required'
        ]);

        
        $name = $request->name;
        $email = $request->email;        
        $mobile = $request->mobile;
        $pincode = $request->pincode;
        $floorsize = $request->floorsize;
        $date_of_installation = $request->date_of_installation;
        $support = $request->support;
        $description = $request->description;

        // echo"<pre>";print_r($name);die;

        $dataInsert =array('name' => $name,'email' => $email ,'mobile'=>$mobile,"pincode"=>$pincode,"floorsize" =>$floorsize ,"date_of_installation"=>$date_of_installation,"support"=>$support,'description' => $description);
        DB::table('reach_out')->insert($dataInsert);       
        
        // return back()->with('success', 'Thank you for contact us!');
        return response()->json(['success'=>'Thank you for contact us!']);

    }

    /* Dealer Locator */

    public function getDealer(Request $request)
    {
        if($request->ajax())
        {
            $queryString = $request->param;

            $type = $request->type;
            $data = [];
            $data['other'] = 0;
            if($type == 1)
            {
                $data = DB::table('store_locator')
                            ->where('address', 'LIKE', "%{$queryString}%") 
                            ->limit(2)
                            ->orderBy('created_date','DESC')                  
                            ->paginate(20);
                            // var_dump($data);
                if(count($data) <= 0){
                    $data['other'] = 1;
                    $dataP = DB::table('store_locator')
                                ->where('pincode', '>', "{$queryString}") 
                                ->limit(1)
                                ->orderBy('pincode','ASC');      
                                
                    $data = DB::table('store_locator')
                                ->where('pincode', '<', "{$queryString}") 
                                ->limit(1)
                                ->orderBy('pincode','DESC')
                                ->union($dataP)
                                ->paginate(2);

                    // var_dump($data);
                }

                return response()->json($data);            
            }
            else
            {
                $data = DB::table('store_locator')
                            ->where('address', 'LIKE', "%{$queryString}%")
                            ->orderBy('created_date','DESC')              
                            ->paginate(20);

                if(count($data) <= 0){

                    $data['other'] = 1;

                    $dataP = DB::table('store_locator')
                                ->where('pincode', '>', "{$queryString}") 
                                ->limit(5)
                                ->orderBy('pincode','ASC');      
                                
                    $data = DB::table('store_locator')
                                ->where('pincode', '<', "{$queryString}") 
                                ->limit(5)
                                ->orderBy('pincode','DESC')
                                ->union($dataP)
                                ->paginate(20);
                }

                return view('shop::home.pagination_data', compact('data'))->render();            
            }
            // return response()->json($data);
            
        }

            
    }

    public function storeLocator()
    {
        $data = DB::table('store_locator')
                        ->where('is_active', true)
                        ->paginate(20);

       return view($this->_config['view'],compact('data')); 
    }
    /**
     * Upload image for product search with machine learning
     *
     * @return \Illuminate\Http\Response
     */
    public function upload()
    {
        $url = $this->searchRepository->uploadSearchImage(request()->all());

        return $url; 
    }

    public function aboutUs()
    {
        $data = DB::table('store_locator')
                        ->where('is_active', true)                       
                        ->get()
                        ->toArray();

       return view($this->_config['view'],compact('data'));
    }

    public function brochures()
    {
        $data = DB::table('product_attribute_values')
                        ->select('product_flat.name','product_attribute_values.text_value','product_flat.description','product_flat.short_description')
                        ->join('product_flat', 'product_flat.product_id', '=', 'product_attribute_values.product_id')                    
                        ->where('attribute_id','=','41')                       
                        ->get()
                        ->toArray();

        // echo"<pre>";print_r($data);die;
        return view($this->_config['view'],compact('data'));
    }

    public function contactUs(Request $request)
    {   
        return view($this->_config['view']);
    }

    public function saveContactData(Request $request)
    {

            $name = $request->name;
            $email = $request->email;        
            $phone = $request->phone;
            $pin = $request->pin;
            $type = $request->type;
            $description = $request->description;

            $dataInsert =array('name' => $name,'email' => $email ,'phone'=>$phone,"pincode"=>$pin,"description" =>$description,"type" => $type);

            if(DB::table('contact_us')->insert($dataInsert))
            {
                return response()->json(['success'=>'Thank you for contact us!']);
            }
            else
            {
                return response()->json(['fail'=>'Request fail.Please try again']);
            }
        
    }

    public function asktheexpert(Request $request)
    {
            $name = $request->name;
            $email = $request->email;        
            $phone = $request->phone;
            $pin = $request->pin;
            $category = $request->category;
            $support = $request->support;
            $type = $request->type;
            $description = $request->description;
            $created_date = date('Y-m-d H:i:s');

            $dataInsert =array('name' => $name,'email' => $email ,'phone'=>$phone,"pincode"=>$pin,"description" =>$description,"product" => $type,'created_date' => $created_date,'support' => $support,'category' => $category);

            if(DB::table('ask_the_expert')->insert($dataInsert))
            {
                return response()->json(['success'=>'Thank you for contact us!']);
            }
            else
            {
                return response()->json(['fail'=>'Request fail.Please try again']);
            }
    }

    public function displayImage($filename)
    { 

        $path = storage_path('app/public/product/189/' . $filename);
        // print_r($path);die;
        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);
        $response = FacadeResponse::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;

    }

    public function checkmobileexist(Request $request)
    {
        $mobile = $request->param;

        $data = DB::table('customers')
                            ->where('phone', '=', $mobile)               
                            ->first();

        
        if($data)
        {
            return response()->json(['success'=>'1']);           
        }   
        else
        {
            return response()->json(['success'=>'2','otp' => '1234']);           
            
        }                         
    }
}