<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\UserRepositoryContract;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function __construct(UserRepositoryContract $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function authenticate(Request $request)
    {
//        $this->validate($request, [
//            'email' => 'required',
//            'password' => 'required'
//        ]);
//        $user = User::where('email', $request->input('email'))->first();
//        if(Hash::check($request->input('password'), $user->password)){
//            $apikey = base64_encode(random_bytes(40));
//            User::where('email', $request->input('email'))->update(['api_key' => "$apikey"]);;
//            return response()->json(['status' => 'success','api_key' => $apikey]);
//        }else{
//            return response()->json(['status' => 'fail'],401);
//        }
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password'=> 'required|min:3|confirmed',
        ]);

        $generateRandomString = Str::random(60);

        $token = hash('sha256', $generateRandomString);

        $user = new User();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        $user->remember_token = $token;

        $user->save();

        return response()->json(['data' => ['user' => $user, 'token' => 'Bearer ' . $token]], 201);
    }


    public function show(int $id)
    {
        return $this->userRepository->find($id);

    }

    public function login(Request $request) {


//        if (Auth::guard('web')->attempt($request->only('email', 'password'))) {
//            return redirect('dashboard');
//        }

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);


        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();

        if($user === null) {
            return response()->json(['error' => true, 'message' =>  "user not found!"], 401);
        }

        if (Hash::check($password, $user->password)) {

            $generateRandomString = Str::random(60);

            $token = hash('sha256', $generateRandomString);

            $user->remember_token = $token;

            $user->save();

            return response()->json(['data' => [
                'success' => true,'token' => $token]], 200);

        }
        return response()->json(['error' => true, 'message' => "Invalid Credential"], 401);

    }


    public function update(Request $request, User $user)
    {
        //
    }

   
    public function destroy(User $user)
    {
        //
    }
}
