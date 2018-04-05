<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user->with('address')->with('company')->paginate(20);

        if($users->count() < 1) {
            return response()->json()->setStatusCode(404);
        }

        return response()->json([
            'total' => $users->count(),
            'page' => $users->currentPage(),
            'users' => $users->toArray()['data'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->user->find($id);

        if(is_null($user)) {
            return response()->json()->setStatusCode('404');
        }

        $result = $user->toArray();
        $result['address'] = $user->address()->get()->toArray()[0];
        $result['company'] = $user->company()->get()->toArray()[0];

        return response()->json([
            'total' => count($user),
            'user' => $result,
        ]);
    }
}
