<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class FashionConnectSchemaTest extends TestCase
{
    use RefreshDatabase;

    public function test_required_tables_exist(): void
    {
        $tables = [
            'roles',
            'users',
            'profiles',
            'posts',
            'likes',
            'comments',
            'follows',
            'jobs',
            'job_applications',
            'verifications',
            'otps',
            'payments',
            'reports',
            'messages',
            'notifications',
        ];

        foreach ($tables as $table) {
            $this->assertTrue(Schema::hasTable($table), "Missing table: {$table}");
        }
    }
}
