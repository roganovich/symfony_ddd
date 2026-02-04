<?php

declare(strict_types=1);

namespace App\Shop\Presentation\Http\Controllers;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Shop\Domain\Service\ShopServiceInterface;
use App\Shop\Presentation\Http\Response\ShopResponse;
use App\Shop\Domain\Entity\Shop;

final class ShopViewController extends AbstractController
{
    public function __construct(
        private readonly ShopServiceInterface $shopService,
    ) {
    }

    #[Route('/api/shop/{id}', name: 'api_shop_view', methods: ["GET"])]
    public function __invoke(string $id): JsonResponse
    {
        /**
         * @var Shop $shop
         */
        $shop = $this->shopService->findById($id);
        $response = ShopResponse::format($shop);

        return $this->json($response);
    }
}