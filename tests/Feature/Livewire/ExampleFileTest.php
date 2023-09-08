<?php

namespace Tests\Feature\Livewire;

use App\Livewire\ExampleFile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ExampleFileTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(ExampleFile::class)
            ->assertStatus(200);
    }
}
