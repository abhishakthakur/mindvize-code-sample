<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

class CareerLibraryResponsiveTest extends TestCase
{
    use RefreshDatabase;

    public function test_career_library_paginates_the_complete_career_list(): void
    {
        $response = $this->get('/career-library');

        $response
            ->assertOk()
            ->assertViewHas('careers', function (LengthAwarePaginator $careers): bool {
                return $careers->currentPage() === 1
                    && $careers->count() === 20
                    && $careers->total() > $careers->count();
            })
            ->assertSee('Showing 1–20 of')
            ->assertSee('Page 1 of');
    }

    public function test_career_library_clamps_an_out_of_range_page_to_the_last_page(): void
    {
        $response = $this->get('/career-library?page=999');

        $response
            ->assertOk()
            ->assertViewHas('careers', function (LengthAwarePaginator $careers): bool {
                return $careers->currentPage() === $careers->lastPage()
                    && $careers->count() > 0
                    && $careers->count() <= $careers->perPage();
            });
    }
}
