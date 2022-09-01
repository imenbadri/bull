<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web', ['except' => ['loginPage', 'signup','register','login']]);
    }
    /**
     * Login page.
     */
    public function loginPage()
    {
        return view('Auth.userLogIn');
    }
    /**
     * Register Page.
     */
    public function signup ()
    {
        $title = "Sign Up";

        $data = compact('title');
        return view('Auth.userRegister', $data);
    }
    /**
     * Register a new User.
     * 
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'conf_password' => 'required|same:password'
        ]);
        $parameters = $request->toArray();
        // try {
            
            $user = User::create([
                'name' => $parameters['name'],
                'email' => $parameters['email'],
                'password' => Hash::make($parameters['password']),
            ]);
            $user->save();
            return view('Auth.userLogIn', ['success' => 'Successfully Registered']);

        // } catch (\Exception $e) {
        //     return response()->json([
        //         'error' => 'An error occured while creating the new user',
        //         'message' => $e->getMessage()
        //     ], 500);
        // } 
    }
    /**
     * Login.
     * 
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);
        // dd($request);
        // try {
            $user = User::where('email', $request->email)->first();

            if (Hash::check($request->password, $user->password)) {
                $id = $user->id;
                $user = User::findOrFail($id);
                $request->session()->put('user', $user->toArray());
                $session= $request->session();
                return redirect (route('/',compact('session')));
            
                // return redirect()->intended();
            } else {
                $request->validate([
                    'password' => 'password'
                ]);
            }
        // } catch (\Exception $e) {
        //     return view('Auth.userLogIn',[
        //         'error' => 'Unauthorized',
        //         'error_description' => 'Email ou password is incorrect'
        //     ], 401);
        // } 
    }
    /**
     * Logout.
     * 
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $request->session()->forget('AdminUser');
        // $request->session()->flush();

        return redirect(url(route('AdminLoginPage')));
    }
}
