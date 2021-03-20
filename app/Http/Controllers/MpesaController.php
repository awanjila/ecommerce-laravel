<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Models\MpesaStkPush;
use App\Cart;
use App\Models\Order;

class MpesaController extends Controller
{
    public function newAccessToken(){
    	$consumer_key="nE26oHlS4hF5aZiwDdmVRDXjpgpyw6ji";
    	$consumer_secret="HlFF2Gr2CBHIjgTw";
    	$credentials=base64_encode($consumer_key.":".$consumer_secret);
    	$url="https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
    	
    	$curl = curl_init();
    	curl_setopt($curl, CURLOPT_URL, $url);
    	curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Basic ".$credentials. "Content-Type:application/json"));
    	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    	$curl_response = curl_exec($curl);
        $access_token=json_decode($curl_response);
        curl_close($curl);
        return $access_token->access_token;

    }
    public function lipaNaMpesaPassword(){
    	$timestamp=Carbon::rawParse('now')->format('YmdHms');
    	$passKey="bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
    	$businessShortcode="174379";
    	$mpesaPassword= base64_encode($businessShortcode.$passKey.$timestamp);
    	return $mpesaPassword;
    }

    public function stkPush(Request $request){


        $this->validate($request, ['name'=> 'required',
                                    'town'=>'required',
                                    'address'=>'required',
                                    'phone_number' =>'required',
                                    'email' =>'required',
                                    'notes' => 'required',
                                    'totalAmount'=>'required']);

    
        $order=new Order();
        $order->name =$request->input('name');
        $order->address =$request->input('address');
        $order->town =$request->input('town');
        $order->phone_number =$request->input('phone_number');
        $order->email =$request->input('email');
        $order->notes =$request->input('notes');
        $order->totalAmount =$request->input('totalAmount');
        $order->save();

    	
    	$amount = $request->totalAmount;
        $phone= $request->phone_number;
    	
    	$url ='https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
    	$curl_post_data =[
    		'BusinessShortCode' => 174379,
    		'Password' => $this->lipaNaMpesaPassword(),
    		'Timestamp'=>Carbon::rawParse('now')->format('YmdHms'),
    		'TransactionType'=> 'CustomerPayBillOnline',
    		'Amount' => $amount,
    		//'Amount' => '1',
    		'PartyA' =>$phone,
    		'PartyB' =>174379,
    		'PhoneNumber'=>$phone,
    		'CallBackURL'=>'https://3637924fab4e.ngrok.io/api/stk/push/callback/url',
    		'AccountReference'=>"Wabe Digital Agency",
    		'TransactionDesc'=> "Lipa Na Mpesa"

    	];
    	$data_string =json_encode($curl_post_data);
    	$curl = curl_init();
    	curl_setopt($curl, CURLOPT_URL, $url);
    	curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$this->newAccessToken()));
    	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    	curl_setopt($curl, CURLOPT_POST, true);
    	curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
    	$curl_response = curl_exec($curl);
    	json_encode($curl_response);

        Session::forget('cart');
        return redirect('/cart')->with('status','Success Purchase completed successfully !');

    	
    }

    public function mpesaRes(Request $request){

        $response= $request->getContent();
        $data =\json_decode($response, true);
        $processedData = $data['Body']['stkCallback'];
        $merchantRID = $processedData["MerchantRequestID"];
        $checkoutRID = $processedData["CheckoutRequestID"];
        $responseCode = $processedData["ResultCode"];
        $resultDesc = $processedData["ResultDesc"];

        $callbackMD = $processedData['CallbackMetadata']['Item'];
        $amount = $callbackMD[0]['Value'];
        $trn_ID =  $callbackMD[1]['Value'];
        $trn_date = $callbackMD[2]['Value'];
        $trn_phone = $callbackMD[3]['Value'];

        $trn = new MpesaStkPush;
        $trn->result_desc = $resultDesc;
        $trn->result_post ="hjijkjghhj";
        $trn->merchant_request_id = $merchantRID;
        $trn->checkout_request_id = $checkoutRID;
        $trn->amount = $amount;
        $trn->mpesa_receipt_number = $trn_ID;
        $trn->transaction_date = $trn_date;
        $trn->phone_number = $trn_phone;

        $trn->save();
        
    }


    public function mpesa_transactions(){

        $mpesa_stk_pushes=MpesaStkPush::get();

        return view('admin.mpesa_transactions')->with('mpesa_stk_pushes', $mpesa_stk_pushes);
    }


    
}
