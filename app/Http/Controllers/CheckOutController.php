<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Services\PayMobServices;
use Illuminate\Http\Request;
use PayMob\Facades\PayMob;

class CheckOutController extends Controller
{

    public function selectPaymentType(Request $request){

        $orderDetail = [
            'lawyer_id' => $request->lawyer_id,
            'amount' => $request->amount,
            // ... (other fields you need)
        ];
        session()->put('orderDetail',$orderDetail);
       

        return view('front-layouts.pages.customer.checkout.paymentType',get_defined_vars());
    }

    public function index(){
        $order=Order::create([
            'amount'=>1000,
        ]);

        $PaymentKey=PayMobController::pay(total_price:$order->amount,order_id:$order->id);

        return view('front-layouts.pages.paymob.paymob')->with(key:'token',value:$PaymentKey);
    }

    public function checkout_processed(Request $request){
        $request_hmac = $request->hmac;
        $calc_hmac = PayMob::calcHMAC($request);
    
        if ($request_hmac == $calc_hmac) {
            $order_id = $request->obj['order']['merchant_order_id'];
            $amount_cents = $request->obj['amount_cents'];
            $transaction_id = $request->obj['id'];
    
            $order = Order::find($order_id);
    
            if ($request->obj['success'] == true && ($order->total_price * 100) == $amount_cents) {
                $order->update([
                    'transaction_status' => 'finished',
                    'transaction_id' => $transaction_id
                ]);
            } else {
                $order->update([
                    'transaction_status' => "failed",
                    'transaction_id' => $transaction_id
                ]);
            }
        }
    }

    public function pay()
    {
        $user = User::first();
        //  + total price
        $payMob = new PayMobServices(103);
        $id=$payMob->get_id();
     
       
        $url=$payMob->make_order($user);
   
        $url = "https://pakistan.paymob.com/api/acceptance/iframes/131588?payment_token={payment_key_obtained_previously}".$url;
        return $url ;

    }

    
}
