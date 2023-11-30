<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){
        $data = Student::get();
        return view ('student', compact('data'));
    }

    public function save(Request $request){
        $nama = $request -> nama;
        $umur = $request -> umur;
        $alamat = $request -> alamat;
        $telp = $request -> telp;

        $s = new Student;
        $s -> name = $nama;
        $s -> age = $umur;
        $s -> alamat = $alamat;
        $s -> phone_number = $telp;

        $s -> save();
        return redirect() -> back() -> with('success','Save success');
    }

    public function updateStudent($id){
        $data = Student::find($id);
        return view('update', compact('data'));
    }
    public function update(Request $request, $id){
        $nama = $request -> name;
        $umur = $request -> age;
        $alamat = $request -> address;
        $telp = $request -> phone;

        $s = Student::find($id);
        $s -> name = $nama;
        $s -> age = $umur;
        $s -> alamat = $alamat;
        $s -> phone_number = $telp;

        $s -> update();
        return redirect('/');
    }
    public function delete($id){
        $s = Student::find($id) -> delete();
        return redirect() -> back() -> with('deleted','Delete success');
    }
}
