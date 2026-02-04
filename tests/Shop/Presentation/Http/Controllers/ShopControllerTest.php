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
    const SHOP_CREATE = '/api/shop';

    public function testListAction(): void
    {
        $client = static::createClient();
        $query = http_build_query([
            'search' => 'магазин',
            'page' => 1,
            'limit' => 10
        ]);

        $client->request('GET', self::SHOP_LIST . '?' . $query);
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

    public function testCreateAction(): void
    {
        $client = static::createClient();
        $client->request('POST', self::SHOP_CREATE, content: json_encode(['name' => 'Shop 1', 'address' => 'Address 1']));
        $response = $client->getResponse();

        $this->assertSame(200, $response->getStatusCode());
    }
}