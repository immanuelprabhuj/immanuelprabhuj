<?php

use App\Jobs\MyJob;
use App\Models\Count;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::post('/intent-initiate', function(Request $request){
    // info(['body' => $request]);
    header('Content-Type: application/json; charset=utf-8');
    $array  =   array(
        "status"=>true,
        "decrypted"=>"9803564327|SUCCESS|Transaction initiated successfully.|null|null|null|null|null|null|null|null|NA|NA",
        "qr"=>"upi://pay?pa=supernova123@hdfcbank&am=".$request->amount."&pn=payzapp&mc=6012&tr=HDFC000000000970&mode=03&cu=INR"
    );
    return json_encode($array);
});
Route::post('/check-trans-status', function(Request $request){
    // info(['body' => $request]);
    header('Content-Type: application/json; charset=utf-8');
    $array  =   array(
        "data"=>
        array(
            "status"=>true,
            "plain_response"=>"5917991|344997093|100.00|2023:04:15 12:35:43|SUCCESS|Transaction success|00|NA|sumit039@hdfcbank|310500879418|NA|null|null|null|null|null|Mybene!857679479890124!AABE0876543!NA|PAY!NA!NA!HDFCE6434F65B8634CD495413CB633789A9!NA!|supernova123@hdfcbank!NA!NA|NA|NA",
            "formatted_response"=>array(
                "TransId"=> "5917991",
                "merchantTranId"=> "344997093",
                "amount"=> "10.00",
                "DateTime"=> "2023:04:15 12:35:43",
                "result"=> "SUCCESS",
                "message"=> "Transaction success",
                "payerVPA"=> "sumit039@hdfcbank",
                "payeeVPA"=> "supernova123@hdfcbank",
                "responseCode"=> "00",
                "utr"=> "310500879418"
            )
        )
    );
    return json_encode($array);
});
Route::get('/checkQueue', function(){
    // dispatch(new App\Jobs\SendEmailJob());

    // $details['email'] = 'immanuelprabhu@gmail.com';
    // dispatch(new App\Jobs\SendEmailJob($details));
    dd('done');
})->name('checkQueue');

Route::get('shopally/{id?}', function (Request $request) {
    $id     =   $request->id;
    $body  =   array(
        'name'  =>  'JPrabhu',
        'email'  =>  'prabhu12@gmail.com',
        'phone'  =>  '97463397650',
        'amount'  =>  '10',
        'orderId'  =>  random_int(1000000000, 9999999999),
        'callback_url'  =>  'http://192.168.2.208/project/zlichfin_admin/public/stylemirror/upi/callback',
        'redirect_url'  =>  'http://192.168.2.208/project/zlichfin_admin/public/stylemirror/upi/redirect',
        'merchID'  =>  'TestMerchant29',
    );
    $signature  =   base64_encode(hash_hmac('sha256', str_replace(':null', ':""', json_encode($body, true)), config('app.payment_hash_key'), true));
    $body['signature']  =   $signature;
    $body   =   json_encode($body, true);
    return view('shopally', compact('body', 'id'));
});


Route::get('/{id?}', function (Request $request) {
    $id     =   $request->id;
    $body  =   array(
        'name'  =>  'JPrabhu',
        'email'  =>  'prabhu12@gmail.com',
        'phone'  =>  '97463397650',
        'amount'  =>  '10',
        'orderId'  =>  random_int(1000000000, 9999999999),
        'callback_url'  =>  'http://127.0.0.1:8000/shop-ally/upi/callback',
        'redirect_url'  =>  'http://127.0.0.1:8000/shop-ally/upi/redirect',
        'merchID'  =>  'TestMerchant29',
    );
    $signature  =   base64_encode(hash_hmac('sha256', str_replace(':null', ':""', json_encode($body, true)), config('app.payment_hash_key'), true));
    $body['signature']  =   $signature;
    $body   =   json_encode($body, true);
    return view('welcome', compact('body', 'id'));
});
