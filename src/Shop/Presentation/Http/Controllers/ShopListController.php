<?php

declare(strict_types=1);

namespace App\Shop\Presentation\Http\Controllers;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

use App\Shop\Presentation\Http\Request\FilterShopRequest;
use App\Shop\Domain\Service\ShopServiceInterface;
use App\Shop\Presentation\Http\Response\ShopResponse;
use App\Shop\Domain\Entity\Shop;
use App\Shop\Application\Query\FilterShopListsQuery;
use App\Shop\Application\Query\FilterShopListsQueryHandler;
final class ShopListController extends AbstractController
{

    #[Route('/api/shop', name: 'api_shop_list', methods: ["GET"])]
    public function __invoke(
        Request $httpRequest,
        SerializerInterface $serializer,
        ValidatorInterface $validator,
        FilterShopListsQueryHandler $handler
    ): JsonResponse {

        $request = $serializer->deserialize(
            $serializer->serialize($httpRequest->query->all(), 'json'),
            FilterShopRequest::class,
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
        // Создаем и выполняем Query
        $query = new FilterShopListsQuery($request->search, $request->page, $request->limit);

        $result = $handler->execute($query);

        $data = ShopResponse::formatList($result->items);

        return $this->json([
            'data' => $data,
            'meta' => [
                'total' => $result->total,
                'page' => $result->page,
                'limit' => $result->limit,
            ]
        ]);
    }
}
