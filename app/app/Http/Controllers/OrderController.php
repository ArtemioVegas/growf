<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Exceptions\ValidationException;
use App\Http\Requests\OrderRequest;
use App\Response\CreateOrderResponse;
use App\Response\ErrorResponse;
use App\Services\OrderService;
use App\Services\TariffDayValidator;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    private OrderService $orderService;

    private TariffDayValidator $tariffDayValidator;

    private const TARIFS_PER_PAGE = 50;

    public function __construct(OrderService $orderService, TariffDayValidator $tariffDayValidator)
    {
        $this->orderService = $orderService;
        $this->tariffDayValidator = $tariffDayValidator;
    }

    public function index()
    {
        $tarifs = $this->orderService->getTarifs(self::TARIFS_PER_PAGE);
        return response()->json($tarifs, 200);
    }

    public function create(OrderRequest $orderRequest): JsonResponse
    {
        $code = 200;
        try {
            $orderId = $this->orderService->saveOrder($orderRequest->except('token'));
            $response = new CreateOrderResponse($orderId);
        } catch (ValidationException $t) {
            $code = 400;
            $response = new ErrorResponse($t->getMessage());
        } catch (\Throwable $t) {
            $code = 500;
            $response = new ErrorResponse($t->getMessage());
        }

        return response()->json($response, $code);
    }
}
