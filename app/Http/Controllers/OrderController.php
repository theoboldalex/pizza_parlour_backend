<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Modules\ServiceResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $response  = new ServiceResponse();
        $response->data = Order::All();

        return response(json_encode($response));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        // add to array based on input from client side
        $order = Order::create([
            'orderTotal' => $request->orderTotal,
            'customerName' => $request->customerName,
            'assignedTo' => $request->assignedTo
        ]);

        $response = new ServiceResponse();

        if (!$order)
        {
            $response->success = false;
            $response->message = 'Something went wrong with your order.';
        }

        $response->data = $order;
        $response->message = 'Your order has been placed.';

        return response(
            json_encode($response),
            201,
            ['Content-Type' => 'application/json']
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Models\Order  $order
     * @return Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
