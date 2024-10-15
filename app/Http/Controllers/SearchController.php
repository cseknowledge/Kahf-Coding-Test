<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\SearchRequest;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = $request->get('query');
        $results = null;

        if($request->get('query')) {
            $results = User::search('"' . $query . '"')
            ->query(function ($query) {
                $query->with(['registration.vaccineCenter']);
            })->get();
        }
        return view('welcome', [
            'results' => $results
        ]);
    }
}