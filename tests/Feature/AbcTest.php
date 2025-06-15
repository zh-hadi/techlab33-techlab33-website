<?php

use App\Models\Setting;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('the application returns a successful response', function () {

    Setting::factory()->create();

    $response = $this->get('/');

    $response->assertStatus(200);
});
