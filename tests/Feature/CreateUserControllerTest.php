<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateUserControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_store(): void
    {
        Storage::fake('public'); // Simula el almacenamiento de archivos en la carpeta 'public'
    
        // Crea un archivo de imagen falso
        $file = UploadedFile::fake()->image('profile_image.jpg');
    
        $userData = [
            'name' => 'John Doe', 
            'last_name' => 'clonky chat',
            'role' => 'rarete',
            'profile_image' => $file, // Asigna el archivo falso al campo 'profile_image'
            'address' => 'challenger rarete',
            'email' => 'john@example.com',
            'password' => 'password123',
        ];
    
        $response = $this->postJson('/api/users/store', $userData);
    
        $response->assertStatus(201);
    }


}
