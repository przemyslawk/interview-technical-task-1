<?php

declare(strict_types=1);

namespace App\User\UI\Http\Controller;

use App\Infrastructure\Http\JsonForbiddenResponse;
use App\Infrastructure\Http\JsonNoContentResponse;
use App\Infrastructure\Http\JsonNotFoundResponse;
use App\User\Application\Command\DeleteUserCommand;
use App\User\Application\Command\UpdateUserCommand;
use App\User\Application\Exception\UserHasDetailsException;
use App\User\Application\Exception\UserHasNotDetailsException;
use App\User\Application\Exception\UserNotExistException;
use App\User\Application\Query\UserQueryInterface;
use App\User\Application\Service\GetUserService;
use App\User\UI\Http\Request\UpdateUserDetailsRequest;
use App\User\UI\Http\Request\UserRequest;
use App\User\UI\Http\Resource\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Bus\Dispatcher;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class UserController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private GetUserService $getUserService;
    private UserQueryInterface $userQuery;
    private Dispatcher $dispatcher;

    public function __construct(GetUserService $getUserService, UserQueryInterface $userQuery, Dispatcher $dispatcher)
    {
        $this->getUserService = $getUserService;
        $this->userQuery = $userQuery;
        $this->dispatcher = $dispatcher;
    }

    public function list(UserRequest $request): JsonResponse
    {
        return response()->json(
            UserResource::collection(
                $this->userQuery->getUsersByActiveAndCountry($request->getActive(), $request->getCountry())
            )
        );
    }

    public function update(int $id, UpdateUserDetailsRequest $updateUserDetailsRequest): JsonResponse
    {
        try {
            $user = $this->getUserService->getUserWithDetails($id);
            $command = new UpdateUserCommand(
                $user,
                $updateUserDetailsRequest->getFirstName(),
                $updateUserDetailsRequest->getLastName(),
                $updateUserDetailsRequest->getPhoneNumber()
            );
            $this->dispatcher->dispatchNow($command);

            return response()->json(
                new UserResource($this->userQuery->getUser($id))
            );
        } catch (UserNotExistException $e) {
            return new JsonNotFoundResponse('User not exists.');
        } catch (UserHasNotDetailsException $e) {
            return new JsonForbiddenResponse('Action forbidden');
        }
    }

    public function delete(int $id): JsonResponse
    {
        try {
            $user = $this->getUserService->getUserWithoutDetails($id);

            $this->dispatcher->dispatchNow(new DeleteUserCommand($user));
            return new JsonNoContentResponse();
        } catch (UserNotExistException $e) {
            return new JsonNotFoundResponse('User not exists.');
        } catch (UserHasDetailsException $e) {
            return new JsonForbiddenResponse('Action forbidden.');
        }
    }
}
