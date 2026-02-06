<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    // test 1 : l'utilisateur peut s' enregistrer
    /** @test */
    public function user_can_register(){
        $response = $this->postJson('/api/auth/register', [
            'name'=> 'Shalom',
            'email'=> 'shalom@test.com',
            'password'=> 'password123',
            'password_confirmation' => 'password123',
        ]);
        $response->assertStatus(201)->assertJsonStructure([
            'message',
            'user'=>['id', 'name', 'email'],
            'token',
            'type',
        ]);
    }

    // test 2: l' utilisateur peut se connecter

     /** @test */
    public function user_can_login(){
        User::factory()->create([
            'email'=> 'shalom@test.com',
            'password'=> bcrypt('password123'),
        ]);
        $response = $this->postJson('/api/auth/login', [
            'email'=>'shalom@test.com',
            'password'=> 'password123',
        ]);

        $response->assertStatus(200)->assertJsonStructure([
            'token', 'type',
        ]);
    }

    // test 3 : l' utilisateur non-authentifie n'a pas acces a la route "me"

     /** @test */

    public function unauthenticated_user_cannot_access_me_route(){
        $response = $this->getJson('/api/auth/me');
        $response->assertStatus(401);
    }
    // test4 : l'utilisateur authentifie a acces a la route "me"

     /** @test */

    public function authenticated_user_can_access_me_route(){
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);
        $response=$this->withHeader(
            'Authorization',
            'Bearer ' . $token
        )->getJson('/api/auth/me');

        $response->assertStatus(200)->assertJson([
            'id'=>$user->id,
            'email'=>$user->email,
        ]);
    }

    // test5: l'utilisateur peu se deconnecter

     /** @test */
    public function user_can_logout(){
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);

        $reponse = $this->withHeader(
            'Authorization',
            'Bearer '. $token
        )->postJson('/api/auth/logout');
        $reponse->assertStatus(200);
    }

}
