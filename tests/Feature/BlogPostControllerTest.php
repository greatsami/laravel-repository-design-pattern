<?php

namespace Tests\Feature;

use App\Enum\BlogPostSourceEnum;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Traits\EnumeratesValues;
use Tests\TestCase;

class BlogPostControllerTest extends TestCase
{
    use RefreshDatabase;
    use EnumeratesValues;
    /**
     * @test
     */
    public function it_store_a_blog_post()
    {
        $this->post('/api/blog-posts', [
            'title' => 'title',
            'body' => 'body',
            'source' => BlogPostSourceEnum::App->value,
            'published_at' => now(),
        ])
            ->assertSuccessful();

        $this->assertDatabaseCount('blog_posts', 1);
    }
}
