<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use App\User;
use Illuminate\Http\Request;

class usercontroller extends Controller
{
    public function index(){
//        Cache::forget('key');
        $data= User::where('page',1)->get();
//        dd($data);
//        return redirect('welcome')->with(['data'=>$data]);
        $value = Cache::get('key');
        $cache = array();
        $array = array();
        if ($value != null){
            foreach ($value as $item){
                $item2= User::where('id',$item)->first();
                array_push($cache,$item2);
                array_push($array,$item2);
//                array_push($array,[$item2->id, $item2->long]);
            }
        }
//        log::alert($cache);
        $array1 = json_encode($array);
//        dd($jsonString);
        return view('welcome', ['data'=>$data, 'cache'=>$cache, 'array'=>$array1]);
    }

    public function ajax(Request $request){
        $value = Cache::get('key');

        if ($value == null){
            $a=array();
        } else {
            $a=$value;
        }
        array_push($a,$request->data1);
        Cache::put('key', $a, now()->addMinutes(100));

    }

    public function welcome(){
        return view('welcome2');
    }

    public function dashboard(){
//                Cache::forget('key');
        $data= User::where('page',1)->get();
        $value = Cache::get('key');
        $cache = array();
        $array = array();
        if ($value != null){
            foreach ($value as $item){
                $item2= User::where('id',$item)->first();
                array_push($cache,$item2);
                array_push($array,$item2);
            }
        }
        $array1 = json_encode($array);
        return view('dashboard', ['data'=>$data, 'cache'=>$cache, 'array'=>$array1]);
    }

    public function page2(){
        $data= User::where('page',2)->get();
        $value = Cache::get('key');
        $cache = array();
        $array = array();
        if ($value != null){
            foreach ($value as $item){
                $item2= User::where('id',$item)->first();
                array_push($cache,$item2);
                array_push($array,$item2);
            }
        }
        $array1 = json_encode($array);
        return view('dashboard', ['data'=>$data, 'cache'=>$cache, 'array'=>$array1]);
    }

    public function page3(){
        $data= User::where('page',3)->get();
        $value = Cache::get('key');
        $cache = array();
        $array = array();
        if ($value != null){
            foreach ($value as $item){
                $item2= User::where('id',$item)->first();
                array_push($cache,$item2);
                array_push($array,$item2);
            }
        }
        $array1 = json_encode($array);
        return view('dashboard', ['data'=>$data, 'cache'=>$cache, 'array'=>$array1]);
    }

    public function clear(){
        Cache::forget('key');
        return redirect('/dashboard');
    }

    public function delete($a){
        $value = Cache::get('key');
        unset($value[$a]);
        Cache::put('key', $value, now()->addMinutes(100));
        return back();
    }
}
