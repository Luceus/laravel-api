<?php

namespace App\Modules\Users\Services;

use App\Helpers\TransformerResponse;
use App\Modules\Users\Repositories\Interfaces\UserRepositoryInterface;
use App\Modules\Users\Services\Interfaces\UserServiceInterface;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceInterface
{
    private $userRepository;
    private $transformerResponse;

    public function __construct(UserRepositoryInterface $userRepository, TransformerResponse $transformerResponse)
    {
        $this->userRepository = $userRepository;
        $this->transformerResponse = $transformerResponse;
    }

    public function register($request)
    {
        try {
            $user = $request->all();
            $user['password'] = Hash::make($request->password);
            $newUser = $this->userRepository->createUser($user);
            $token = $newUser->createToken('AuthToken')->accessToken;
            return $this->transformerResponse->response(
                false,
                [$token],
                TransformerResponse::HTTP_OK,
                TransformerResponse::CREATE_SUCCESS_MESSAGE
            );
        } catch (QueryException $e) {
            return $this->transformerResponse->response(
                true,
                [],
                TransformerResponse::HTTP_BAD_REQUEST,
                TransformerResponse::BAD_REQUEST_MESSAGE . ' | ' . $e->getMessage()
            );
        }
    }

    public function login($request)
    {
        $validated = $request->validated();

        if (Auth::attempt($validated)) {
            $token = Auth::user()->createToken('AuthToken')->accessToken;
            return $this->transformerResponse->response(
                false,
                [$token],
                TransformerResponse::HTTP_CREATED,
                TransformerResponse::CREATE_SUCCESS_MESSAGE
            );
        } else {
            return $this->transformerResponse->response(
                true,
                [],
                TransformerResponse::HTTP_UNAUTHORIZED,
                TransformerResponse::UNAUTHORIZED_MESSAGE
            );
        }
    }
}