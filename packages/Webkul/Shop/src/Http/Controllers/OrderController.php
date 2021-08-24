<?php

namespace Webkul\Shop\Http\Controllers;

use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\InvoiceRepository;
use Illuminate\Support\Facades\DB;
use PDF;

class OrderController extends Controller
{
    /**
     * OrderrRepository object
     *
     * @var \Webkul\Sales\Repositories\OrderRepository
     */
    protected $orderRepository;

    /**
     * InvoiceRepository object
     *
     * @var \Webkul\Sales\Repositories\InvoiceRepository
     */
    protected $invoiceRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Order\Repositories\OrderRepository  $orderRepository
     * @param  \Webkul\Order\Repositories\InvoiceRepository  $invoiceRepository
     * @return void
     */
    public function __construct(
        OrderRepository $orderRepository,
        InvoiceRepository $invoiceRepository
    )
    {
        $this->middleware('customer');

        $this->orderRepository = $orderRepository;

        $this->invoiceRepository = $invoiceRepository;

        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
    */
    public function index()
    {
        // $order = $this->orderRepository->findOneWhere([
        //    'customer_id' => auth()->guard('customer')->user()->id,
        // ]);

        $order = DB::table('orders')
                        // ->select('product_flat.*','product_images.path','order_items.*')
                         ->join('cart_items', 'cart_items.cart_id', '=', 'orders.cart_id')
                         //->join('orders', 'orders.id', '=', 'order_items.order_id')
                        // ->join('product_flat', 'product_flat.product_id', '=', 'order_items.product_id')  
                        // ->join('product_images', 'product_flat.product_id', '=', 'product_images.product_id')
                        // ->join('product_attribute_values', 'product_flat.product_id', '=', 'product_attribute_values.product_id')
                        ->where('orders.customer_id','=', auth()->guard('customer')->user()->id)
                        ->where('cart_items.quantity','!=','0')
                        ->get()
                        ->toArray();
                $order = json_decode(json_encode($order),true);
        // echo"<pre>";print_r($order);die;                        

        // if (! $order) {
        //     abort(404);
        // }

        return view($this->_config['view'], compact('order'));
    }

    /**
     * Show the view for the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function view($id)
    {
        $order = $this->orderRepository->findOneWhere([
            'customer_id' => auth()->guard('customer')->user()->id,
            'id'          => $id,
        ]);

        

        if (! $order) {
            abort(404);
        }

        return view($this->_config['view'], compact('order'));
    }

    /**
     * Print and download the for the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function print($id)
    {
        $invoice = $this->invoiceRepository->findOrFail($id);

        $pdf = PDF::loadView('shop::customers.account.orders.pdf', compact('invoice'))->setPaper('a4');

        return $pdf->download('invoice-' . $invoice->created_at->format('d-m-Y') . '.pdf');
    }

    /**
     * Cancel action for the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancel($id)
    {
        $result = $this->orderRepository->cancel($id);

        if ($result) {
            session()->flash('success', trans('admin::app.response.cancel-success', ['name' => 'Order']));
        } else {
            session()->flash('error', trans('admin::app.response.cancel-error', ['name' => 'Order']));
        }

        return redirect()->back();
    }
}