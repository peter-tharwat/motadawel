<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
class UsersController extends Controller
{
    function __construct()
    {
    	$this->middleware('IsAdmin');
    }
    public function index(Request $request)
    {
    	$users=User::where(function($q)use($request){
    		$q->where('name','LIKE','%'.$request->key.'%')
            ->orWhere('email','LIKE','%'.$request->key.'%')
            ->orWhere('phone','LIKE','%'.$request->key.'%');
            
            if($request->id!=null)
                $q->where('id',$request->id);
    	})->orderBy('id','DESC')->paginate();
    	return view('admin.users.index',compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

    	$user->update([
    		'name'=>$request->name,
    		'email'=>$request->email,
    		'blocked'=>$request->blocked==1?$request->blocked:0,
            'power'=>$request->power
    	]);
    	emotify('success', 'تم تعديل المستخدم بنجاح');
        return redirect()->route('users.index')->with('data',['alert'=>"تم تعديل المستخدم بنجاح","alert-type"=>"success"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

}
