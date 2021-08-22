<?php


namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DevelopersController extends Controller {

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getDevelopers(Request $request) {

        $q = $request->q ?: null;
        $search = $request->search ?: null;

        $developers = Developer::when($search && $q, function($query) use ($q, $search) {

            if($search == 'age' || $search == 'birthdate')
                return $query->where($search, $q);

            return $query->where($search, 'like', '%'.$q.'%');
        })->orderBy('created_at', 'desc');

        $developers = $request->page ? $developers->paginate(20) : $developers->get();

        return response($developers, 200);
    }

    /**
     * @param Developer $developer
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function findDeveloper(Developer $developer, Request $request) {

        return response($developer, 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function createDeveloper(Request $request) {

        try {

            $developer = new Developer();

            $developer->store($request->all());

            return response($developer, 200);
        }
        catch(\Exception $e) {

            return response($e->getMessage(), 500);
        }
    }

    /**
     * @param Developer $developer
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function updateDeveloper(Developer $developer, Request $request) {

        try {

            $developer->store($request->all());

            return response($developer, 200);
        }
        catch(\Exception $e) {

            return response($e->getMessage(), 500);
        }
    }

    /**
     * @param Developer $developer
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function deleteDeveloper(Developer $developer, Request $request) {

        try {

            $developer->delete();

            return response($developer, 200);
        }
        catch(\Exception $e) {

            return response($e->getMessage(), 500);
        }
    }
}
