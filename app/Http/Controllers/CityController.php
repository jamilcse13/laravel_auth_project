<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function __construct(private City $city)
    {
    }

    public function index()
    {
        $cities = $this->city->get();

        return response()->json($cities);
    }
}
