<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CommentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCommentCreatedCorrectly()
    {

        $data = [
            'user_name' => 'test',
            'email' => 'test@gmail.com',
            'text' => 'test',
        ];

        $response = $this->json('POST', '/api/comment', $data);

        $response
            ->assertStatus(201)
            ->assertJson([
                'id' => true,
                'user_name' => true,
                'email' => true,
                'text' => true,
                'created_at' => true,
                'updated_at' => true,
            ]);

    }

    public function testCommentValidation()
    {
        $data = [
            'user_name' => '',
            'email' => '',
            'text' => '',
        ];
        $keys = [
            'email',
            'text',
            'user_name'
        ];
        $response = $this->json('POST', '/api/comment', $data);

        $response
            ->assertStatus(422)
            ->assertJsonValidationErrors($keys);


    }

    public function testCommentValidationEmail()
    {
        $data = [
            'user_name' => 'test',
            'email' => 'test@test',
            'text' => 'test',
        ];
        $keys = [
            'email'
        ];
        $response = $this->json('POST', '/api/comment', $data);

        $response
            ->assertStatus(422)
            ->assertJsonValidationErrors($keys);

    }

    public function testCommentGetAll()
    {
        //$data = factory(\App\Comment::class, 3)->create();
        factory(\App\Comment::class, 2)->create()->each(function ($u) {
            $u->children()->save(factory(\App\Comment::class)->make());
        });

        $response = $this->json('GET', '/api/comment');

        $response->assertStatus(200)->assertJson([
            [
                'user_name' => true,
                'text' => true,
                'parent_id' => null,
                'children' => [
                    ['parent_id' => 1, 'user_name' => true, 'text' => true]
                ]
            ],
            [
                'user_name' => true,
                'text' => true,
                'parent_id' => null,
                'children' => [
                    ['parent_id' => 2, 'user_name' => true, 'text' => true]
                ]
            ],
        ])
            ->assertJsonStructure([
                '*' => ['id', 'user_name', 'email', 'text', 'parent_id', 'children'],
            ]);

    }

    public function testCommentUpdate()
    {
        $data = factory(\App\Comment::class)->create();

        $update = [
            'user_name' => 'new name',
            'email' => 'newemail@gmail.com',
            'text' => 'new text',
        ];

        $response = $this->json('PUT', '/api/comment/' . $data->id, $update);

        $response->assertStatus(200)->assertJson([
            'user_name' => 'new name',
            'email' => 'newemail@gmail.com',
            'text' => 'new text'
        ]);
    }

    public function testCommentDelete()
    {
        $data = factory(\App\Comment::class)->create();

        $responce = $this->json('DELETE', '/api/comment/' . $data->id);

        $responce->assertStatus(200);
    }
}
