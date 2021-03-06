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

    /**
     * @SWG\Post(
     *     consumes={"multipart/form-data"},
     *     path="/register",
     *     produces={"application/json"},
     *     summary="Register User",
     *     tags={"Users"},
     * @SWG\Parameter(name="username",in="formData",description="Username",type="string"),
     * @SWG\Parameter(name="email",in="formData",description="Email",type="string"),
     * @SWG\Parameter(name="name",in="formData",description="Name",type="string"),
     * @SWG\Parameter(name="password",in="formData",description="Password",type="integer"),
     * @SWG\Response(
     *     response=200,
     *     description="User Registration",
     * )
     * )
     */
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
            'message'=>'Congratulation on register. Please Confirm your account by mail'
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     *
     */
    public function update(Request $request,$id){
        $user = User::findOrFail($id);
        $data = $request->all();
        try{
            $user->update($data);
            $message = "User Updated";

        }catch (\Exception $exception){
            $message = $exception->getMessage();
        }

        return new JsonResponse([
            'status'=>'ok',
            'message'=>$message
        ]);
    }

    /**
     * Confirm a user's email address.
     *
     * @param  string $token
     * @return mixed
     */
    public function confirm($token)
    {
        User::whereToken($token)->firstOrFail()->confirmEmail();
        return redirect('/login');

    }
}