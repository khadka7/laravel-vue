<?php
/**
 * Created by PhpStorm.
 * User: khadka
 * Date: 6/28/18
 * Time: 11:21 AM
 */

namespace App\Api\User\Controllers;


use App\Api\User\Requests\CreateUserRequest;
use App\Events\UserRegisterEvent;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function register(CreateUserRequest $request){
        $data =$request->all();

        $data['password']= Hash::make('password');
        $data['roles'] = json_encode(['user']);
        try{
            $user = User::create($data);
            event(new UserRegisterEvent($user));


        }catch (\Throwable $exception){
            $data = $exception->getMessage();
        }
        return new JsonResponse([
            'status'=>'ok',
            'data'=>$data,
            'message'=>'Congratulation '.$data['username'].' on register. Please Confirm your account by mail'
        ]);
    }
}