<?php

declare(strict_types=1);

namespace App\Shop\Presentation\Http\Controllers;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

use App\Shop\Application\Handler\CreateShopHandler;
use App\Shop\Presentation\Http\Response\ShopResponse;
use App\Shop\Domain\Entity\Shop;
use App\Shop\Presentation\Http\Request\CreateShopRequest;
use App\Shop\Infrastructure\Mapper\CreateShopMapper;

final class ShopCreateController extends AbstractController
{
    #[Route('/api/shop', name: 'api_shop_create', methods: ["POST"])]
    public function __invoke(
        Request $httpRequest,
        SerializerInterface $serializer,
        ValidatorInterface $validator,
        CreateShopHandler $createShopHandler,
        CreateShopMapper $createShopMapper,
    ): JsonResponse {
        $request = $serializer->deserialize(
            $httpRequest->getContent(),
            CreateShopRequest::class,
            'json'
        );
        // Валидация средствами симфони в слое представления
        $errors = $validator->validate($request);
        if (count($errors) > 0) {
            return new JsonResponse(
                ['errors' => (string) $errors],
                Response::HTTP_BAD_REQUEST
            );
        }
        $command = $createShopMapper->toCommand($request);
        /**
         * @var Shop $shop
         */
        $shop = $createShopHandler->execute($command);
        $response = ShopResponse::format($shop);

        return $this->json($response);
    }
}