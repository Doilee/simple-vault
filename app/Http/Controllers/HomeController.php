<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entry;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $entries = Entry::with('author')->get();

        $entries = $entries->map(function ($item) {
            return collect($item)->transform(function ($value, $key) {
                if ($key == 'password') {
                    return decrypt($value);
                }
                return $value;
            })->toArray();
        });

        return view('home', compact('entries'));
    }
}
