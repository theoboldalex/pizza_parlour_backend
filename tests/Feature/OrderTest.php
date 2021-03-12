<?php


namespace Tests\Feature;

use Tests\TestCase;

class OrderTest extends TestCase
{
    /**
     * A successful order should return a 201 status
     *
     * @return void
     */

    public function testPlaceOrder()
    {
       $response = $this->postJson('/api/placeorder');

       $response->assertCreated()->assertJsonFragment(['success' => true]);
    }

    public function testGetOrders()
    {
        $response = $this->get('/admin/orders');

        $response->assertOk()->assertJsonFragment(['success' => true]);
    }

}
