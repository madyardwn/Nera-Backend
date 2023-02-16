<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    // swagger documentation

    /**
     * @OA\Get(
     *     path="/users",
     *     tags={"Users"},
     *     summary="Get users",
     *     description="Get users",
     *     operationId="users",
     * @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *     ),
     * @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *     ),
     *     security={
     *         {"bearerAuth": {}}
     *     }
     * )
     */
    public function index()
    {
        $users = User::paginate();

        return view('users.index', compact('users'));
    }
}
