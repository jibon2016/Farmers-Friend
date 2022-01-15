<?php

namespace App\Http\Controllers;

use App\Model\Demand;
use App\Model\Order;
use App\Model\User;
use Illuminate\Http\Request;

class UserOrderOfferController extends Controller
{
    public function userOrderOffer($user_id){
        $user = User::where('id', $user_id)->first();

        if ($user->user_type  === "Buyer") {
            $this->data['orders'] = Order::where('user_id',$user_id)->orderBy('id','DESC')->get();
            
            return view('user.order',$this->data);
        }elseif ($user->user_type === 'Seller') {
            $this->data['offers'] = Demand::where('user_id',$user_id)->get();
            
            return view('user.offer',$this->data);
        }
    }

    public function showUserOrder($id){
        $this->data['order'] = Order::where('order_no',$id)->first();
        return view('user.user_order', $this->data);
    }

    public function showUserOffer($id){
        $this->data['offer'] = Demand::where('offer_no',$id)->first();
        return view('user.user_offer', $this->data);
    }
}
