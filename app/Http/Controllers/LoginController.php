<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //return all users
    public function index()
    {
         return User::all();
        }
         public function register(Request $request)
         {
             $validetor = Validator::make($request->all(),[
                'email' => 'required|email|unique:users,email',
                'name' => 'required|string|max:255',
                'password' => 'required|string|max:255']);
               if ($validetor->fails())
               {
                 abort(403);
                  return $validetor->errors()->all();
                 //$this->formatValidationErrors($validetor);
                 }
                  $user = User::create([ 'name' => $request->name,
                  'email' => $request->email,
                  'password' => Hash::make($request->password) ]);
                   $token = $user->createToken('auth')->plainTextToken;
                    return [ 'message' => 'Sucsess Register ', 'user' => $user, 'token' => $token ];
                 }
                  // Login user
                   public function login(Request $request) {
                     $validetor = Validator::make($request->all(), [
                         'name' => 'required|string|max:255',
                          'password' => 'required|string|max:255' ]);
                          if ($validetor->fails())
                          {
                             abort(403); return $validetor->errors()->all();
                              // $this->formatValidationErrors($validetor);
                             }
                              if (Auth::attempt($request->all())) {
                                //he is a real user
                                 $user = $request->user();
                                 $token = $user->createToken('auth')->plainTextToken;
                                  $response = [ 'user' => $user, 'token' => $token ];
                                   return $response;
                                }
                            }

                            public function redirectTo()
                               {
                                  if(Auth::user()->role_as == '1')//1 = Admin Login
                                {
                                  return'dashboard';
                                }
                                elseif(Auth::user()->role_as == '0')// Normal or Default User Login
                                {
                                    return '/';
                                }
                        }
                         protected function authenticated()
                        {
                        if(Auth::user()->role_as == '1') //1 = Admin Login
                        {
                        return response(200)->with('status','Welcome to your dashboard');
                        }
                        elseif(Auth::user()->role_as == '0') // Normal or Default User Login
                        {
                       return response(200)->with('status','Logged in successfully');
                        }
                        }
                        
                        }
