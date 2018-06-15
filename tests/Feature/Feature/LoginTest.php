<?php

namespace Tests\Feature\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRequiresEmailAndLogin()
    {
        $this->json('POST','api/login')->assertStatus(422)->assertJson([
        	"email"=>['the email field is required'],
        	"password"=>['The password field is required'],

        ]);

        public function testUserLoginSuccessfully()
        {
        	$user = factory(User::class)->create([
        		'email'=>'testlogin@user.com',
        		'password'=>bcrypt('password'),

        	]);
        	$payload = ['email'=>'testlogin@user.com','password' => 'password'];

        	$this->json('POST','api/login',$payload)->assertStatus(200)->assertJsonStructure([
        		'data'=>[
        			'id',
        			'name',
        			'email',
        			'created_at',
        			'updated_at',
        			'api_token',


        		],
        	]);
        }
    }
}
