{!! view_render_event('bagisto.shop.products.price.before', ['product' => $product]) !!}
<?php
	// print_r($product->max_price);
?>
<span style="display:none">{!! $product->getTypeInstance()->getPriceHtml() !!}</span>
@if(Request::url() === URL::to('/'))
<p class="prices">₹ {{ number_format($product->min_price,0) }} <span>₹ {{ number_format($product->max_price,0) }}</span></p>

@else
@php
$num = $product->getTypeInstance()->getPriceHtml();

$num = str_replace('₹','',$num);
$num = str_replace(',','',$num);

$getnum = preg_replace('#[^0-9\.]#', '', $num);
$fnum = 0.3 * $getnum;
$offAmount = 0.05 * $getnum;
$getnum = $getnum - $offAmount
@endphp

<div class="price">
  <!-- <form> -->
    <label>
      <input type="radio" id="pval" value="30" name="priceradio" checked/>
      <span class="percent-price">₹ <?php echo $fnum;?></span>
      <p class="pay-type">Pay <b>30%</b></p>
    </label>
    <label>
      <input type="radio" id="aval" value="100" name="priceradio"/>
      <span class="regular-price">₹ <?php echo $getnum;?></span>
      <p class="pay-type">Pay <b>100%</b> &amp; Avail <b>5% off</b></p>
    </label>
  <!-- </form> -->
  
  <input type="hidden" name="actual_amount" id="actual_amount" value="<?php echo $getnum;?>">
  <input type="hidden" name="percent_amount" id="percent_amount" value="<?php echo $fnum;?>">
</div>
@endif

{!! view_render_event('bagisto.shop.products.price.after', ['product' => $product]) !!}