<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAccuseAPIRequest;
use App\Http\Requests\API\UpdateAccuseAPIRequest;
use App\Models\Accuse;
use App\Repositories\AccuseRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\AccuseResource;

/**
 * Class AccuseController
 */

class AccuseAPIController extends AppBaseController
{
    /** @var  AccuseRepository */
    private $accuseRepository;

    public function __construct(AccuseRepository $accuseRepo)
    {
        $this->accuseRepository = $accuseRepo;
    }

    /**
     * @OA\Get(
     *      path="/accuses",
     *      summary="getAccuseList",
     *      tags={"Accuse"},
     *      description="Get all Accuses",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/Accuse")
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request): JsonResponse
    {
        $accuses = $this->accuseRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            AccuseResource::collection($accuses),
            __('messages.retrieved', ['model' => __('models/accuses.plural')])
        );
    }

    /**
     * @OA\Post(
     *      path="/accuses",
     *      summary="createAccuse",
     *      tags={"Accuse"},
     *      description="Create Accuse",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Accuse")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  ref="#/components/schemas/Accuse"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateAccuseAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $accuse = $this->accuseRepository->create($input);

        return $this->sendResponse(
            new AccuseResource($accuse),
            __('messages.saved', ['model' => __('models/accuses.singular')])
        );
    }

    /**
     * @OA\Get(
     *      path="/accuses/{id}",
     *      summary="getAccuseItem",
     *      tags={"Accuse"},
     *      description="Get Accuse",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Accuse",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  ref="#/components/schemas/Accuse"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id): JsonResponse
    {
        /** @var Accuse $accuse */
        $accuse = $this->accuseRepository->find($id);

        if (empty($accuse)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/accuses.singular')])
            );
        }

        return $this->sendResponse(
            new AccuseResource($accuse),
            __('messages.retrieved', ['model' => __('models/accuses.singular')])
        );
    }

    /**
     * @OA\Put(
     *      path="/accuses/{id}",
     *      summary="updateAccuse",
     *      tags={"Accuse"},
     *      description="Update Accuse",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Accuse",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Accuse")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  ref="#/components/schemas/Accuse"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateAccuseAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Accuse $accuse */
        $accuse = $this->accuseRepository->find($id);

        if (empty($accuse)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/accuses.singular')])
            );
        }

        $accuse = $this->accuseRepository->update($input, $id);

        return $this->sendResponse(
            new AccuseResource($accuse),
            __('messages.updated', ['model' => __('models/accuses.singular')])
        );
    }

    /**
     * @OA\Delete(
     *      path="/accuses/{id}",
     *      summary="deleteAccuse",
     *      tags={"Accuse"},
     *      description="Delete Accuse",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Accuse",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id): JsonResponse
    {
        /** @var Accuse $accuse */
        $accuse = $this->accuseRepository->find($id);

        if (empty($accuse)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/accuses.singular')])
            );
        }

        $accuse->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/accuses.singular')])
        );
    }
}
