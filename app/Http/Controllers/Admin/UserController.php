<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\UserDocument;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index (){
      $this->data['users'] =  User::all();
      return view('admin.user.all', $this->data );
    }

    public function show($id){
      $this->data['user'] = User::findorFail($id);
      $this->data['document'] = UserDocument::findorFail($id);
      return view('admin.user.view', $this->data);
    }

    public function notVerified(){
      $this->data['users'] = User::where('saller_flag','=', 0)->Where('user_type','seller')->get();
      return view('admin.user.unverified', $this->data);
    }

    public function showNotVerified($id){
      $this->data['user'] = User::findorFail($id);
      $document = $this->data['document'] = UserDocument::where('user_id',$id)->first();
      if (isset($document)) {
        return view('admin.user.showUnverified', $this->data);
      }else{
        toastr()->warning('User Not Upload Document');
        return redirect()->route('unverified');
      }
    }

    public function nidApprove($id){
      $userId = $id;
      $user = User::findOrFail($userId);
      $user->saller_flag = 1;
      if ($user->save()) {
        toastr()->success('User Approved');
      }
      return redirect()->route('unverified');
    }
}
