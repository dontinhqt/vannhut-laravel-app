<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CookieService;

class CookieController extends Controller
{
    protected $cookieService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CookieService $cookieService)
    {
        $this->cookieService = $cookieService;
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function apiSaveCookie(Request $request)
    {
        $request = $request->all();
        $service = $this->cookieService->saveCookie($request);

        $jsonOut = [
            "code" => 200,
            "message" => "succsess",
            "data" => []
        ];
        if (!empty($service)) {
            return response()->json($jsonOut);
        }
        $jsonOut = [
            "code" => 400,
            "message" => "Error something",
            "data" => []
        ];

        return $this->response->array($jsonOut, 400);
    }
}
