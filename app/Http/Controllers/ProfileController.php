<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * @OA\Get(
     *     path="/profile",
     *     tags={"Profile"},
     *     summary="Get profile",
     *     description="Get profile",
     *     operationId="profile",
     * @OA\Response(
     *         response=200,
     *         description="Successful operation",
     * @OA\JsonContent(
     * @OA\Property(property="name",  type="string"),
     * @OA\Property(property="email", type="string"),
     *         )
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
    public function show()
    {
        return view('auth.profile');
    }

    /**
     * @OA\Put(
     *     path="/profile",
     *     tags={"Profile"},
     *     summary="Update profile",
     *     description="Update profile",
     *     operationId="update",
     * @OA\RequestBody(
     *         required=true,
     *         description="Update profile",
     * @OA\JsonContent(
     * @OA\Property(property="name",     type="string"),
     * @OA\Property(property="email",    type="string"),
     * @OA\Property(property="password", type="string"),
     *         )
     *     ),
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
    public function update(ProfileUpdateRequest $request)
    {
        if ($request->password) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
        }

        auth()->user()->update(
            [
                'name' => $request->name,
                'email' => $request->email,
            ]
        );

        return redirect()->back()->with('success', 'Profile updated.');
    }
}
