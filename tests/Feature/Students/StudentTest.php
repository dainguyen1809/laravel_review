<?php

namespace Tests\Feature\Students;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentTest extends TestCase
{
    use RefreshDatabase; // Sử dụng để reset database sau mỗi test case

    public function testIndex()
    {
        $response = $this->get(route('students.index'));

        $response->assertStatus(200)
            ->assertViewIs('student.index')
            ->assertViewHas('students');
    }
}