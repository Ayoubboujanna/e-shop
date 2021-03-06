<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        //dd('index');
        return view('admin.users.index')->with('users', User::all());
        //return view('admin.users.index')->with('users', User::paginate(5));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Check that current user isn't editing themselves
        if (Auth::user()->id == $id) {
            return redirect()->route('admin.users.index')->with('warning', 'You are not allowed to edit yourself.');
        }

        return view('admin.users.edit')->with(['user' => User::find($id), 'roles' => Role::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Check that current user isn't editing themselves
        if (Auth::user()->id == $id) {
            return redirect()->route('admin.users.index')->with('warning', 'You are not allowed to edit yourself.');
        }

        $user = User::find($id);
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.index')->with('success', $user->name . ' has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Check that current user isn't editing themselves
        if (Auth::user()->id == $id) {
            return redirect()->route('admin.users.index')
                ->with('warning', 'You are not allowed to delete yourself.');
        }

        $user = User::find($id);
        if ($user) {
            $user->roles()->detach();
            $user->delete();
            return redirect()->route('admin.users.index')
                ->with('success', 'User has been deleted.');
        }

        return redirect()->route('admin.users.index')->with('warning', 'This user cannot be deleted.');
    }
}
