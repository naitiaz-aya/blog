<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\User;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' =>$users]);
    }

    public function profile(){
        return View::make('users.profile');
    }   
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $users = User::all();
        return view('users.index', ['users' => $users]);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id,)
    {   
        
        $user = User::find(Auth::user());
        // Load user/createOrUpdate.blade.php view
        $subscriptions = Subscription::find($id);
        return view('payment.create',['subscriptions' => $subscriptions, 'user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $user = User::find($id);
        $user->sub_id = $request->sub_id;
        $user->save();
        return redirect('/home');
    
    }

    public function subscribe()
    {
        $subscriptions = Subscription::all();
        return view('payment.subscription')-> with('subscriptions' ,$subscriptions);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        // prend un identifiant et renvoie un seul modèle. 
        // Si aucun modèle correspondant n'existe, il renvoie une erreur1
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back();
    
    }
    
}

