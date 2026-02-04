<?php

declare(strict_types=1);

namespace App\Tests\Shop\Presentation\Http\Controllers;

use App\Tests\Controller\BaseWebTestCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Shop\Presentation\Http\Controllers\ShopListController;
use App\Shop\Presentation\Http\Controllers\ShopViewController;

class ShopControllerTest extends BaseWebTestCase
{
    const SHOP_LIST = '/api/shop';
    const SHOP_VIEW = '/api/shop/cd55e6e4-01b8-11f1-8cb0-05bc40816ac3';

    public function testListAction(): void
    {
        $client = static::createClient();
        $client->request('GET', self::SHOP_LIST);
        $response = $client->getResponse();

        $this->assertSame(200, $response->getStatusCode());
    }

    public function testViewAction(): void
    {
        $client = static::createClient();
        $client->request('GET', self::SHOP_VIEW);
        $response = $client->getResponse();

        $this->assertSame(200, $response->getStatusCode());
    }
}