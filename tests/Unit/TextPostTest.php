<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TextPostTest extends TestCase
{
    use DatabaseMigrations;

    protected $textPost;

    public function setup() 
    {
        parent::setUp();
        
        $this->authenticate();
        $this->textPost = create('FamJam\Models\TextPost', ['user_id' => auth()->id()]);
    }
    
     /** @test */
    public function a_text_post_belongs_to_a_user()
    {
        $this->assertInstanceOf('FamJam\Models\User', $this->textPost->user);
    }

     /** @test */
    public function a_text_has_an_associated_generic_post()
    {
        $this->assertInstanceOf('FamJam\Models\Post', $this->textPost->post);
    }
}
