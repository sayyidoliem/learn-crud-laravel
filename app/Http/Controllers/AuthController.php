<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use App\Models\Student;
use Illuminate\Http\Request;
use Termwind\Components\Raw;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerStudent(Request $request){
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = new Auth;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = Hash::make($request->password) ;

        $res = $user->save();

        if ($res) {
           return redirect()->back()->with('success','Data user berhasil di daftarkan');
        } else {
            return redirect()->back()->with('fail','Data User gagal di daftarkan');
    }
  }

  public Function logins(Request $request){
    $request -> validate([
        'email' => 'required|email',
        'password' => 'required|min:6'
    ]);


    $l = Auth::where('email', '=', $request -> email) -> first();

    if ($l) {
        if (Hash::check($request -> password, $l -> password)) {
                     $request->session()->put('loginId', $l -> id);
                     return redirect('/');
                 }else{
                    return back() -> with('fail', 'password Anda salah');
                  }
    }else{
        return back() -> with('gagal', 'email anda salah');
    }


}


public function index(){
    $user = array();
    if (Session::has('loginId')) {
        $user = Auth::where('id', '=', Session::get('loginId')) -> first();
    }
    $data = Student::get();
        return view ('student', compact('data', 'user'));
}


public function logout(){
    Session::has('loginId');
    Session::pull('loginId');
    return redirect('login');
}
}

