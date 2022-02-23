<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Petition;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Mail\MailerAuth;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegister;
//Validation
use App\Http\Requests\RegisterFormRequest;
use App\Http\Requests\LogInFormRequest;
use App\Http\Requests\UpdateFormRequest;

class AuthController extends Controller
{
    public function register(RegisterFormRequest $request) {
        $fields = $request->validated();

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user->where('email', $user->email)->first(),
            'token' => $token
        ];
        Mail::to($fields['email'])->send(new UserRegister($fields));

        return response($response, 200);
    }

    public function login(LogInFormRequest $request) {
        $fields = $request->validated();
        // Check email
        $user = User::where('email', $fields['email'])->first();
        // Check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Credenciales incorrectas'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 200);
    }
    public function update(UpdateFormRequest $request, $id)
{
        $fields = $request->validated();
        if ($request->image) {
            $response = cloudinary()->upload($request->file('image')->getRealPath(), ['folder' => 'Usuarios'])->getSecurePath();
            $fields['image'] = $response;
        }
        $user = User::find($id);
        $user->update($fields);
        
        return $user;   

}
    public function show($id) {
        $user = User::find($id);
        $donations = Donation::where('user_id', $user->id)->get();
        $petition = Petition::where('user_id', $user->id)->get();
        return [ 'petitions' => $petition, 'donations' => $donations, 'user' => $user ];
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();
        return [
            'message' => 'Se ha cerrarado sesion correctamente'
        ];
    }
}
