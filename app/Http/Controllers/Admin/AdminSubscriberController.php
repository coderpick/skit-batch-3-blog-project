<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class AdminSubscriberController extends Controller
{
    public function index()
    {
        $data['subscribers'] = Subscriber::all();
        $data['pageTitle']      ='Subscribers';
        $data['breadcrumb']     ='list';
        $data['parentRoute']    ='admin.subscriber.list';
        return view('backend.admin.subscriber',$data);
    }
    public function deleteSubscriber($id){
        $subscriber = Subscriber::where( 'id',$id )->first();
        $subscriber->delete();
        notify()->success('Subscriber email delete successfully');
        return redirect()->back();
    }
}
