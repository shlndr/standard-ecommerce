<?php

namespace Webkul\Shop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Webkul\Category\Repositories\CategoryRepository;
use Webkul\Product\Repositories\ProductRepository;

class CategoryController extends Controller
{

    /**
     * ProductRepository object
     *
     * @var \Webkul\Product\Repositories\ProductRepository
     */
    protected $productRepository;

    /**
     * CategoryRepository object
     *
     * @var \Webkul\Category\Repositories\CategoryRepository
     */
    protected $categoryRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Category\Repositories\CategoryRepository  $categoryRepository
     * @return void
     */
    public function __construct(CategoryRepository $categoryRepository, ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;

        parent::__construct();
    }



    public function getCategoryList($slug) {
        //      $productRepository = new ProductRepository();
        // $productRepository->findBySlug($slug);
        // print_r($productRepository);
       $product = $this->productRepository->findBySlugOrFail($slug);
       var_dump($product);
       return view('shop::category.category-list', array('slug_id' => $slug,'product'=>$product));

     } 

    public function door()
    {
        $categoryData = DB::table('category_translations')
                        ->select('category_translations.*')
                        ->join('categories', 'categories.id', '=', 'category_translations.category_id')
                        ->where(['categories.parent_id' => 6,'category_translations.locale' => 'en']) 
                        ->get()
                        ->toArray();

        // echo"<pre>";print_r($categoryData);die;                
        return view('shop::category.doors',compact('categoryData'));
    }

    public function getProductByCategory(Request $request)
    {

        $finaldata = [];
        $id = $request->param;
        $categoryData = DB::table('product_categories')
                    ->select('product_flat.*')
                    ->join('categories', 'categories.id', '=', 'product_categories.category_id')
                    ->join('product_flat', 'product_flat.product_id', '=', 'product_categories.product_id')                    
                    ->where('product_categories.category_id', '=', $id)                     
                    ->get()
                    ->toArray();

                    foreach ($categoryData as $key => $value) {
                       $finaldata[] = [
                            'name'         => $value->name,
                            'id'       => $value->id,
                        ];
                    } 

        return response()->json(['success'=> $finaldata]);
    }

    public function getCategoryByProduct(Request $request)
    {
        $finaldata = [];
        $id = $request->param;
        $categoryData = DB::table('product_categories')
                    ->select('category_id')
                    ->where('product_categories.product_id', '=', $id)                     
                    ->get()
                    ->first();

                    // foreach ($categoryData as $key => $value) {
                    //    $finaldata[] = [
                    //         'name'         => $value->name,
                    //         'id'       => $value->id,
                    //     ];
                    // } 

        return response()->json($categoryData);
    }

    public function doorForm(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'pincode' => 'required',
            'category' => 'required',
            'product' => 'required'
        ]);

        
        $name = $request->name;
        $email = $request->email;        
        $mobile = $request->mobile;
        $pincode = $request->pincode;
        $category = $request->category;
        $product = $request->product;

        // echo"<pre>";print_r($name);die;

        $dataInsert =array('name' => $name,'email' => $email ,'mobile'=>$mobile,"pincode"=>$pincode,"category" =>$category ,"product"=>$product);
        if(DB::table('category_contact_us')->insert($dataInsert))
        {
           return response()->json(['success'=>'Thank you for your response!']); 
        }
        else{
            return response()->json(['success'=>'Please try again!']);
        }    
        
        // return back()->with('success', 'Thank you for contact us!');
        
    }

    public function window()
    {
        $categoryData = DB::table('category_translations')
                        ->select('category_translations.*')
                        ->join('categories', 'categories.id', '=', 'category_translations.category_id')
                        ->where(['categories.parent_id' => 4,'category_translations.locale' => 'en']) 
                        ->get()
                        ->toArray();

        return view('shop::category.windows',compact('categoryData'));
    }

    public function getCategories($slug)
    {
        $categoryData = DB::table('category_translations')
                    ->select('product_flat.*')
                    ->join('product_categories', 'product_categories.category_id', '=', 'category_translations.category_id')
                    ->join('categories', 'categories.id', '=', 'product_categories.category_id')
                    ->join('product_flat', 'product_flat.product_id', '=', 'product_categories.product_id')                    
                    ->where(['category_translations.slug' => $slug,'category_translations.locale' => 'en'])                     
                    ->get()
                    ->toArray();

            foreach ($categoryData as $key => $value) {
            
                 $categoryData[$key]->images =   DB::table('product_images') 
                                             ->select('product_images.path') 
                                             ->where('product_id', '=', $value->product_id)    
                                             ->get()
                                             ->toArray();

                                

                }

                // echo"<pre>";print_r($categoryData);die;

        if($slug == 'residential-doors')
        {
            return view('shop::category.residential-doors',compact('categoryData'));
        }
        else if($slug == 'commercial-doors')
        {
            return view('shop::category.commercial-doors',compact('categoryData'));
        }
        else if($slug == 'aluminium-windows')
        {
            return view('shop::category.aluminium-windows',compact('categoryData'));
        }
        else
        {
            return view('shop::category.steel-windows',compact('categoryData'));
        }
        
    }

    public function residentialDoors()
    {
        $residentialData = DB::table('product_categories')
                    ->select('product_flat.*')
                    ->join('categories', 'categories.id', '=', 'product_categories.category_id')
                    ->join('product_flat', 'product_flat.product_id', '=', 'product_categories.product_id')                    
                    ->where('product_categories.category_id', '=', 2)                     
                    ->get()
                    ->toArray();

            foreach ($residentialData as $key => $value) {
            
                 $residentialData[$key]->images =   DB::table('product_images') 
                                             ->select('product_images.path') 
                                             ->where('product_id', '=', $value->product_id)    
                                             ->get()
                                             ->toArray();

                }
        
        return view('shop::category.residential-doors',compact('residentialData'));
    }

    public function commercialDoors()
    {
        $commercialData = DB::table('product_categories')
                    ->select('product_flat.*')
                    ->join('categories', 'categories.id', '=', 'product_categories.category_id')
                    ->join('product_flat', 'product_flat.product_id', '=', 'product_categories.product_id')                    
                    ->where('product_categories.category_id', '=', 3)                     
                    ->get()
                    ->toArray();

            foreach ($commercialData as $key => $value) {
            
                 $commercialData[$key]->images =   DB::table('product_images') 
                                             ->select('product_images.path') 
                                             ->where('product_id', '=', $value->product_id)    
                                             ->get()
                                             ->toArray();

                }
        
        return view('shop::category.commercial-doors',compact('commercialData'));
    }

    public function aluminiumWindow()
    {
        $aluminiumData = DB::table('product_categories')
                    ->select('product_flat.*')
                    ->join('categories', 'categories.id', '=', 'product_categories.category_id')
                    ->join('product_flat', 'product_flat.product_id', '=', 'product_categories.product_id')                    
                    ->where('product_categories.category_id', '=', 7)                     
                    ->get()
                    ->toArray();

            foreach ($aluminiumData as $key => $value) {
            
                 $aluminiumData[$key]->images =   DB::table('product_images') 
                                             ->select('product_images.path') 
                                             ->where('product_id', '=', $value->product_id)    
                                             ->get()
                                             ->toArray();

                }
        
        return view('shop::category.aluminium-windows',compact('aluminiumData'));
    }

    public function steelWindow()
    {
        $steelData = DB::table('product_categories')
                    ->select('product_flat.*')
                    ->join('categories', 'categories.id', '=', 'product_categories.category_id')
                    ->join('product_flat', 'product_flat.product_id', '=', 'product_categories.product_id')                    
                    ->where('product_categories.category_id', '=', 8)                     
                    ->get()
                    ->toArray();

            foreach ($steelData as $key => $value) {
            
                 $steelData[$key]->images =   DB::table('product_images') 
                                             ->select('product_images.path') 
                                             ->where('product_id', '=', $value->product_id)    
                                             ->get()
                                             ->toArray();

                }
        
        return view('shop::category.steel-windows',compact('steelData'));
    }



}
