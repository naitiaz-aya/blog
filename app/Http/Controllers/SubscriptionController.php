<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;



class SubscriptionController extends Controller
{
    //
    public function index()
    {
        $subscriptions = Subscription::all();
        return view('admin.subscriptions')-> with('subscriptions' ,$subscriptions);
    }
    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $subscription = new Subscription();

        $subscription->type = request('type');
        $subscription->price = request('price');
       
        $subscription->save();
        
        return redirect('/dashboard')->with('success','Subscription Added Successfully');
    }
}
