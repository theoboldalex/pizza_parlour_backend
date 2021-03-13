<?php


namespace Tests\Unit;


use App\Modules\ServiceResponse;
use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertTrue;
use Tests\TestCase;

class ServiceResponseTest extends TestCase
{
    public function testBaseServiceResponse()
    {
        $response = new ServiceResponse();

        assertTrue($response->data == null);
        assertTrue($response->success == true);
        assertTrue(($response->message == ''));
    }
}
