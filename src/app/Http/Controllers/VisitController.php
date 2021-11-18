<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Link $link)
    {
        return $link->visits()->create([
            'user_agent' => $request->userAgent()
        ]);
    }
}
