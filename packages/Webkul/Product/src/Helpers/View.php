<?php

namespace Webkul\Product\Helpers;
use Illuminate\Support\Facades\DB;
class View extends AbstractProduct
{
    /**
     * Returns the visible custom attributes
     *
     * @param  \Webkul\Product\Contracts\Product|\Webkul\Product\Contracts\ProductFlat  $product
     * @return void|array
     */
    public function getAdditionalData($product)
    {
        $data = [];

        $attributes = $product->attribute_family->custom_attributes()->where('attributes.is_visible_on_front', 1)->get();

        $attributeOptionReposotory = app('Webkul\Attribute\Repositories\AttributeOptionRepository');

        foreach ($attributes as $key => $attribute) {
                
            if ($product instanceof \Webkul\Product\Models\ProductFlat) {
                $value = $product->product->{$attribute->code};
            } else {
                $value = $product->{$attribute->code};
            }

            $valueId = '';
            // echo"<pre>";print_r($key.'-'.$value.'type= '.$attribute->type.'---'.$attribute);

            if ($attribute->type == 'boolean') {
                $value = $value ? 'Yes' : 'No';
                
            } elseif($value) {
                if ($attribute->type == 'select') {

                    $attributeOption = $attributeOptionReposotory->find($value);
                    
                    if ($attributeOption) {
                        $value = $attributeOption->label ?? null;

                        if (! $value) {
                            continue;
                        }
                    }
                } elseif ($attribute->type == 'multiselect' || $attribute->type == 'checkbox') {
                    $lables = [];

                    $attributeOptions = $attributeOptionReposotory->findWhereIn('id', explode(",", $value));
                    $valueId = $value;
                    //print_r($value);
                    foreach ($attributeOptions as $attributeOption) {
                        if ($label = $attributeOption->label) {
                            $lables[] = $label;
                        }
                    }

                    $value = implode(", ", $lables);
                }
            }

           if($value != '')
           {
                $data[] = [
                    'id'         => $attribute->id,
                    'code'       => $attribute->code,
                    'label'      => $attribute->name,
                    'value'      => $value,
                    'value_id'   => $valueId,
                    'admin_name' => $attribute->admin_name,
                    'type'       => $attribute->type,
                ];
            }
        }
        // echo"<pre>";print_r($data);die;
        return $data;
    }

    public function getAttributes($id)
    {
        
        $finaldata = [];
        $data = DB::table('attributes')
                        ->select('attributes.code','attributes.type', 'attribute_options.admin_name','attribute_options.id')
                        ->join('attribute_options', 'attributes.id', '=', 'attribute_options.attribute_id')
                        ->where('attributes.id', '=', $id)                     
                        ->get()
                        ->toArray();
        
        foreach ($data as $key => $value) 
        {                            
            if ($value->type == 'multiselect')
            {
                $finaldata[] = [
                    'id'         => $value->id,
                    'code'       => $value->code,
                    'admin_name' => $value->admin_name,
                    'type'       => $value->type,
                ]; 
            }
            
        }             

        
        return $finaldata;
    }

    public function getResidentialProductLists()
    {
        $finaldata = [];
        $residentialData = DB::table('product_categories')
                    ->select('product_flat.*')
                    ->join('categories', 'categories.id', '=', 'product_categories.category_id')
                    ->join('product_flat', 'product_flat.product_id', '=', 'product_categories.product_id')                    
                    ->where('product_categories.category_id', '=', 2)                     
                    ->get()
                    ->toArray();

            foreach ($residentialData as $key => $value) {
                       $finaldata[] = [
                            'name'         => $value->name,
                            'url_key'       => $value->url_key,
                        ];
                    }        

         return $finaldata;                    
    }

    public function getCommercialProductLists()
    {
        $finaldata = [];
        $commercialData = DB::table('product_categories')
                    ->select('product_flat.*')
                    ->join('categories', 'categories.id', '=', 'product_categories.category_id')
                    ->join('product_flat', 'product_flat.product_id', '=', 'product_categories.product_id')                    
                    ->where('product_categories.category_id', '=', 3)                     
                    ->get()
                    ->toArray();

                    foreach ($commercialData as $key => $value) {
                       $finaldata[] = [
                            'name'         => $value->name,
                            'url_key'       => $value->url_key,
                        ];
                    } 

        return $finaldata;                    
    }

    public function getAluminiumProductLists()
    {
        $finaldata = [];
        $aluminiumData = DB::table('product_categories')
                    ->select('product_flat.*')
                    ->join('categories', 'categories.id', '=', 'product_categories.category_id')
                    ->join('product_flat', 'product_flat.product_id', '=', 'product_categories.product_id')                    
                    ->where('product_categories.category_id', '=', 7)                     
                    ->get()
                    ->toArray();

                    foreach ($aluminiumData as $key => $value) {
                       $finaldata[] = [
                            'name'         => $value->name,
                            'url_key'       => $value->url_key,
                        ];
                    } 

        return $finaldata;                    
    }

    public function getSteelProductLists()
    {
        $finaldata = [];
        $steelData = DB::table('product_categories')
                    ->select('product_flat.*')
                    ->join('categories', 'categories.id', '=', 'product_categories.category_id')
                    ->join('product_flat', 'product_flat.product_id', '=', 'product_categories.product_id')                    
                    ->where('product_categories.category_id', '=', 8)                     
                    ->get()
                    ->toArray();

                    foreach ($steelData as $key => $value) {
                       $finaldata[] = [
                            'name'         => $value->name,
                            'url_key'       => $value->url_key,
                        ];
                    } 

        return $finaldata;                    
    }

    
}