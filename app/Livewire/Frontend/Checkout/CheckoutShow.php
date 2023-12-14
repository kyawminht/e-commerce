<?php

namespace App\Livewire\Frontend\Checkout;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Livewire\Component;

class CheckoutShow extends Component
{
    public $carts,$totalPrice,$fullname,$address,$pincode,$phone,$email,$payment_mode=Null,$payment_id=Null;

    protected $listeners=['validationForAll'];

    public function validationForAll()
    {
        $this->validate();
    }
    public function rules()
    {
        return [
            'fullname'=>'required|string',
            'address'=>'required|string',
            'pincode'=>'required|integer',
            'phone'=>'required|integer',
            'email'=>'required|email',

        ];
    }
    public function placeOrder()
    {
        $this->validate();
        $order=Order::create([
            'user_id'=>auth()->user()->id,
            'tracking_no'=>Str::random(10),
            'fullname'=>$this->fullname,
            'phone'=>$this->phone,
            'email'=>$this->email,
            'pincode'=>$this->pincode,
            'address'=>$this->address,
            'status_message'=>'in progress',
            'payment_mode'=>$this->payment_mode,
            'payment_id'=>$this->payment_id,
        ]);

        foreach ($this->carts as $cart){
            $orderItems=OrderItem::create([
                'order_id'=>$order->id,
                'product_id'=>$cart->product_id,
                'price'=>$cart->product->selling_price,
            ]);
        }
        return $order;
    }
    public function codOrder()
    {

        $this->payment_mode='Cash on Deliver';
        $codOrder=$this->placeOrder();
        if ($codOrder){
            Cart::where('user_id',auth()->user()->id)->delete();
            $this->dispatch('message',[
                'text'=>'Order place successfully',
            ]);

            return redirect()->to('thank-you');
        }else{
            $this->dispatch('message',[
                'text'=>'Something went wrong',
            ]);
        }
    }

    public function totalProductPrice()
    {
        $this->carts=Cart::where('user_id',auth()->user()->id)->get();

        foreach ($this->carts as $cart){
            $this->totalPrice += $cart->product->selling_price;

        }

        return $this->totalPrice;
    }
    public function render()
    {
        $this->fullname=auth()->user()->name;
        $this->email=auth()->user()->email;
        $this->totalPrice=$this->totalProductPrice();
        return view('livewire.frontend.checkout.checkout-show',[
            'totalPrice'=>$this->totalPrice,
        ]);
    }
}
