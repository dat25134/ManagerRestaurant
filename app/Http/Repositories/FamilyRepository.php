<?php
namespace App\Http\Repositories;

use App\Banner;
use App\Mon;

class FamilyRepository implements FamilyRepositoryInterface
{
    public function getBanner()
    {
        $banners = Banner::all();

        return $banners;
    }

    public function getMon()
    {
        $mons = Mon::all();

        return $mons;
    }
}
