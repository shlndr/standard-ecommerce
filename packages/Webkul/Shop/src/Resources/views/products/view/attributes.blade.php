@inject ('productViewHelper', 'Webkul\Product\Helpers\View')

{!! view_render_event('bagisto.shop.products.view.attributes.before', ['product' => $product]) !!}

@if ($customAttributeValues = $productViewHelper->getAdditionalData($product))
@if(Request::url() != URL::to('sliding-aluminium-windows') && Request::url() != URL::to('swing-and-slide-window') && Request::url() != URL::to('casement-windows'))
<?php 
 //echo"<pre>";print_r($product->url_result);die;
// if($product->url_result != 'swing-and-slide-window' && $product->url_result != 'sliding-aluminium-windows' && $product->url_result != 'casement-windows')

// {  
$i =0;
?>  

<div class="flex-container">
    <?php foreach ($customAttributeValues as $result => $attribute)
    {
        if($attribute['type'] == 'multiselect' && $attribute['value'] !== '' && $attribute['code'] !== 'DoorType' )
        {
            // echo"Test-------";echo"<pre>";print_r($customAttributeValues);die;
            $arr = explode(',', $attribute['value']);
            $valId = explode(',', $attribute['value_id']); ?>

            <?php if($i == 0){?>      
            <div class="mrag-r-12">
                <?php }else{ ?>
                <div class="mrag-l-12">
                    <?php } ?> 

                    <div class="select-box my-3">   
                        <?php if($attribute['code'] == 'accessories'){?>                            
                        <select name="super_attribute[<?php echo $attribute['id'];?>]" id="attribute_<?php echo $attribute['id'];?>" data-vv-as="<?php echo $attribute['code'];?>" class="select-input clsaccess" multiple>

                            <?php foreach ($arr as $data => $value) { ?>                            
                            <option value="<?php echo $valId[$data];?>" selected ><?php echo $value;?></option>
                            <?php } ?>
                        </select>
                        <?php }elseif($attribute['code'] == 'Opening'){ ?>

                        <select name="super_attribute[<?php echo $attribute['id'];?>]" id="attribute_<?php echo $attribute['id'];?>" data-vv-as="<?php echo $attribute['code'];?>" class="select-input <?php echo $attribute['code'];?>" required>
                            <option>Orientations</option>
                            <?php foreach ($arr as $data => $value) { ?>                            
                            <option value="<?php echo $valId[$data];?>"><?php echo $value;?></option>
                            <?php } ?>
                        </select>

                        <?php }else{ ?>

                        <select name="super_attribute[<?php echo $attribute['id'];?>]" id="attribute_<?php echo $attribute['id'];?>" data-vv-as="<?php echo $attribute['code'];?>" class="select-input <?php echo $attribute['code'];?>">
                            <?php foreach ($arr as $data => $value) { ?>                            
                            <option value="<?php echo $valId[$data];?>"><?php echo $value;?></option>
                            <?php } ?>
                        </select>
                        <?php } ?>
                    </div>

                </div>
                <?php

            }
        }?>
    </div>


    <?php foreach ($customAttributeValues as $result => $attribute)
    {

        if($attribute['type'] == 'multiselect' && $attribute['value'] !== '' && $attribute['code'] == 'DoorType' )
        {

            $arr = explode(',', $attribute['value']);
            $valId = explode(',', $attribute['value_id']); ?>


            <div class="flex-container">
                <div class="mrag-r-12">
                    <div class="select-box my-3"> 
                        <select name="super_attribute[<?php echo $attribute['id'];?>]" id="attribute_<?php echo $attribute['id'];?>" data-vv-as="<?php echo $attribute['code'];?>" class="select-input doortype" required>
                            <option>Type</option>
                            <?php foreach ($arr as $data => $value) { ?>                            
                            <option value="<?php echo $valId[$data];?>"><?php echo $value;?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <?php } } ?>
            @else
            <?php $i=0;

            function count_array($value)
            {                                        
                return ($value['type'] == 'multiselect');
            }
            ?>

            
                <?php foreach ($customAttributeValues as $result => $attribute)
                {
                    if($attribute['type'] == 'multiselect')
                    {
                        //echo"Test-------";echo"<pre>";print_r($customAttributeValues);die;
                        $arr = explode(',', $attribute['value']);
                        $valId = explode(',', $attribute['value_id']); 
                        $listData = count(array_filter($customAttributeValues,"count_array"));
                        ?>

                        <?php if($i == 0 || $i == 2 || $i == 4){ ?>      
                        <div class="flex-container">
                        <div class="mrag-r-12">
                            <?php }else{ ?>
                            <div class="mrag-l-12">
                                <?php } ?> 

                                <div class="select-box my-3">   
                                    <?php if($attribute['code'] == 'accessories'){?>                            
                                    <select name="super_attribute[<?php echo $attribute['id'];?>]" id="attribute_<?php echo $attribute['id'];?>" data-vv-as="<?php echo $attribute['code'];?>" class="select-input clsaccess" multiple>

                                        <?php foreach ($arr as $data => $value) { ?>                            
                                        <option value="<?php echo $valId[$data];?>" selected ><?php echo $value;?></option>
                                        <?php } ?>
                                    </select>
                                    <?php }elseif($attribute['code'] == 'Opening'){ ?>

                                    <select name="super_attribute[<?php echo $attribute['id'];?>]" id="attribute_<?php echo $attribute['id'];?>" data-vv-as="<?php echo $attribute['code'];?>" class="select-input <?php echo $attribute['code'];?>" required>
                                        <option>Orientations</option>
                                        <?php foreach ($arr as $data => $value) { ?>                            
                                        <option value="<?php echo $valId[$data];?>"><?php echo $value;?></option>
                                        <?php } ?>
                                    </select>

                                    <?php }else{ ?>

                                    <select name="super_attribute[<?php echo $attribute['id'];?>]" id="attribute_<?php echo $attribute['id'];?>" data-vv-as="<?php echo $attribute['code'];?>" class="select-input <?php echo $attribute['code'];?>">
                                        <?php foreach ($arr as $data => $value) { ?>                            
                                        <option value="<?php echo $valId[$data];?>"><?php echo $value;?></option>
                                        <?php } ?>
                                    </select>
                                    <?php } ?>
                                </div>


                            <?php if($i == 1 || $i == 3 || $i == 5 || $listData == $i + 1){ ?>
                                </div>
                                <?php } ?>
                                </div> 
                                
                            <?php

                            $i = $i + 1;
                        }
                    }?>
                


                @endif
                @endif

                {!! view_render_event('bagisto.shop.products.view.attributes.after', ['product' => $product]) !!}