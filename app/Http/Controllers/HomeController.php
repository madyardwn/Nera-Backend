<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    /**
     * @OA\Get(
     *     path="/home",
     *     tags={"Home"},
     *     summary="Get home",
     *     description="Get home",
     *     operationId="home",
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
        return view('home');
    }
}
