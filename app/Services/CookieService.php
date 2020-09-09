<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\CookieRepository;

class CookieService
{
    public function __construct(CookieRepository $cookieRepository)
    {
        $this->cookieRepository = $cookieRepository;
    }

    public function getList($data)
    {
        if (empty($data['limit'])) {
            $data['limit'] = 50;
        }
        return $this->cookieRepository->paginate($data);
    }

    public function saveCookie($data)
    {
        return $this->cookieRepository->save($data);
    }
}