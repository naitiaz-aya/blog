<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usersubscription;
use App\Models\Subscription;
use App\Models\User;
// use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UsersubscriptionController extends Controller
{

    public function index()
    {
        $subscriptions = Subscription::all();
        return view('payment.subscription')-> with('subscriptions' ,$subscriptions);
    }
    public function create($id)
    {   
        $subscriptions = Subscription::find($id);
        return view('payment.create',['subscriptions' => $subscriptions]);
    }

    public function store(Request $request)
    {
        $usersubscription = new Usersubscription();
        $usersubscription->user_id = Auth::id();
        $usersubscription->cardnumber = request('cardnumber');
        $usersubscription->end_date = request('end_date');
        $usersubscription->type_sub = request('type_sub');
        
        $usersubscription->save();
        
        return redirect('/Articles')->with('success','Subscription Added Successfully');
    }
    
    // public function show(User $id)
    // {

    //     $blogcomments = Subscription::where('blog_id', $id->id)->get();
    //     //  $blog = Blog::find($id);

    //     return view('blogs.show')->with('blog',$id)
    //     ->with('blogcomments' ,$blogcomments)
    //     ;
    // }

}
