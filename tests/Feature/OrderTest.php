<?php


namespace Tests\Feature;

use App\Modules\ServiceResponse;
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
        $response = $this->postJson('/api/placeorder', ['orderTotal' => 1500, 'customerName' => 'Jim', 'assignedTo' => 1]);

        $response->assertCreated();
    }

    public function testGetOrders()
    {
        $response = $this->get('/admin/orders');

        $response->assertOk()->assertJsonFragment(['success' => true]);
    }

}
