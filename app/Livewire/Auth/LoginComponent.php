<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Cookie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class LoginComponent extends Component
{
    public $param = [];
    public $username, $password;
    public $email;

    public function render()
    {
        return view('livewire.auth.login-component')->layout('components.layouts.login.app');
    }

    public function login(){
        $this->validate([
            'username'=>'required',
            'password'=>'required',
        ],[
            'username.required'=>'ກະລຸນາປ້ອນ ອີເມວ ກ່ອນ!',
            'password.required'=>'ກະລຸນາປ້ອນ ລະຫັດຜ່ານ ກ່ອນ!',
        ]);

        // $response = Http::post('http://192.168.128.193:8080/api/login', [
        //     'email' => $this->username,
        //     'password' => $this->password,
        // ]);

        // if($response['message'] != 'success'){
        //     session()->flash('error', 'ຂໍ້ມູນເຂົ້າລະບົບບໍ່ຖືກຕ້ອງ! ກະລຸນາລອງໃໝ່...');
        //     return redirect(route('login'));
        // }else{
        //         $cookie = Cookie::queue('token', $response['access_token'], 60 * 24 * 30);
        //         $cookies = Cookie::queue('user_id', $response['user']['id']);
        //         $users_cookie = Cookie::queue('user_name', $response['user']['name']);
        //         $roles_cookie = Cookie::queue('role_id', $response['user']['role_id']);
        //         $departs_cookie = Cookie::queue('dpart_id', $response['user']['dpart_id']);
        //         session()->flash('success', 'ເຂົ້າສູ່ລະບົບສຳເລັດ');
        //         return redirect(route('dashboard'));
        // }

        if(Auth::attempt([
            'email'=> $this->username,
            'password'=> $this->password
        ]))
        {
                session()->flash('success', 'ເຂົ້າລະບົບສຳເລັດ');
                return redirect(route('dashboard'));
        }else{
            $this->dispatch('alert',type: 'error', message:'ອີເມວ ຫຼື ລະຫັດຜ່ານບໍ່ຖືກຕ້ອງ, ກະລຸນາລອງໃໝ່!');
            $this->password = null;
        }
    }

    public function logout(){
        // $token = Cookie::get('token');;
        // $response = Http::withToken($token)->post('http://192.168.128.193:8080/api/logout');
        // session()->flash('success', 'ອອກລະບົບສຳເລັດ');
        // return redirect(route('login'));
        Auth::logout();
        session()->flash('success', 'ອອກລະບົບສຳເລັດ');
        return redirect(route('login'));
    }

    public function showReset(){
        $this->dispatch('show-reset');
    }

    public function resetPass(){
        $response = Http::post('http://127.0.0.1:8080/api/reset-pass',[
            'email'=>$this->email
        ]);

        if($response){
            return redirect(route('forgot-password',$response['data']['id']));
        }
       
    }

    public function register(){
        return redirect(route('regis'));
    }
}
