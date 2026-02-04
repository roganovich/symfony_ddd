<?php

declare(strict_types=1);

namespace App\Shop\Presentation\Http\Controllers;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Shop\Domain\Service\ShopServiceInterface;
use App\Shop\Presentation\Response\ShopResponse;
use App\Shop\Domain\Entity\Shop;

final class ShopListController extends AbstractController
{
    public function __construct(
        private readonly ShopServiceInterface $shopService,
    ) {
    }

    #[Route('/api/shop', name: 'list', methods: ["GET"])]
    public function __invoke(): JsonResponse
    {
        /**
         * @var Shop[] $items
         */
        $items = $this->shopService->findAll();
        $response = ShopResponse::formatList($items);

        return $this->json($response);
    }
}
