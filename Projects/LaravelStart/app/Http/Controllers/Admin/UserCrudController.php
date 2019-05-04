<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::query()->where('id', '<>', auth()->id())->get();

        return view('admin.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd('store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::query()->find($id);
        if ($user) {
            return view('admin.showUser', compact('user'));
        } else {
            return redirect(route('users.index'))->with('userNotFound', 'User Is Not Found.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::query()->find($id);
        if ($user) {
            return view('admin.editUser', compact('user'));
        } else {
            return redirect(route('users.index'))->with('userNotFound', 'User Is Not Found.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserRequest $request, $id)
    {
        User::query()->find($id)->update($request->all());
        return redirect(route('users.index'))->with('userUpdated', 'User Update Successfully Done.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::query()->find($id);
        if ($user && Auth::id() != $id) {
            $user->delete();
            return redirect(route('users.index'))->with('userDeleted', 'User Delete Successfully Done.');
        } elseif ($user && Auth::id() == $id) {
            return redirect(route('users.index'))->with('userNotFound', 'You Can\'t Delete Yourself.');
        } else {
            return redirect(route('users.index'))->with('userNotFound', 'User Is Not Found.');
        }
    }

    public function block($id)
    {
        $user = User::query()->find($id);
        $status = $user->blocked;
        $user->update([
            'blocked' => $status ? false : true
        ]);
        return redirect(route('users.index'))->with('userNotFound', $status ? 'User Unlocked.' : 'User Blocked');
    }
}


