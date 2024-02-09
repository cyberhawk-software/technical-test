<?php

namespace App\Http\Controllers;

use App\Services\TurbineService;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;
use InvalidArgumentException;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class TurbineController extends Controller
{
    protected TurbineService $service;
    public function __construct(TurbineService $service)
    {
        $this->service = $service;
//        $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $filters = $request->query('filters', []);
            $orderBy = $request->query('orderBy', null);
            $sortBy = $request->query('sortBy', null);
            $limit = $request->query('limit', 15);
            return response()->json($this->service->allFiltered($filters, $orderBy, $sortBy, $limit));
        } catch (InvalidArgumentException $error) {
            return response()->json(['errors' => $this->getErrorMessage($error->getMessage())], 422);
        } catch (UnauthorizedException $error) {
            return response()->json(['errors' => $this->getErrorMessage($error->getMessage())], 401);
        } catch (UnprocessableEntityHttpException $error) {
            return response()->json(['errors' => $this->getErrorMessage($error->getMessage())], 403);
        } catch (Exception $error) {
            return response()->json(['errors' => $this->getErrorMessage($error->getMessage())], 500);
        }
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        try {
            return response()->json($this->service->read($id));
        } catch (ModelNotFoundException $error) {
            return response()->json(['errors' => $this->getErrorMessage($error->getMessage())], 422);
        } catch (UnauthorizedException $error) {
            return response()->json(['errors' => $this->getErrorMessage($error->getMessage())], 401);
        } catch (Exception $error) {
            return response()->json(['errors' => $this->getErrorMessage($error->getMessage())], 500);
        }
    }

    /**
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     */
    public function update(int $id, Request $request): JsonResponse
    {
        try {
            return response()->json($this->service->update($id, $request));
        } catch (InvalidArgumentException $error) {
            return response()->json(['errors' => $this->getErrorMessage($error->getMessage())], 422);
        } catch (UnauthorizedException $error) {
            return response()->json(['errors' => $this->getErrorMessage($error->getMessage())], 401);
        } catch (UnprocessableEntityHttpException $error) {
            return response()->json(['errors' => $this->getErrorMessage($error->getMessage())], 403);
        } catch (Exception $error) {
            return response()->json(['errors' => $this->getErrorMessage($error->getMessage())], 500);
        }
    }

    protected function getErrorMessage(string|null $message): mixed
    {
        return json_decode($message) ?? $message;
    }
}
