<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::role('user')->latest()->get();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try {
            $attr = $request->validated();

            $attr['password'] = Hash::make($request->password);

            if ($request->file('photo') && $request->file('photo')->isValid()) {

                $filename = $request->file('photo')->hashName();

                $request->file('photo')->storeAs('uploads/photo', $filename, 'public');

                $attr['photo'] = $filename;
            }

            $user = User::create($attr);

            $user->assignRole(2);

            $user->profile()->create($attr);

            return redirect()
                ->route('users.index')
                ->with('success', __('Pengguna berhasil dibuat'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('users.index')
                ->with('error', __($th->getMessage()));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            DB::beginTransaction();

            $attr = $request->validated();

            if ($request->file('photo') && $request->file('photo')->isValid()) {

                $filename = $request->file('photo')->hashName();
                $path = storage_path('app/public/uploads/photo/');

                if ($user->profile->photo != null && file_exists($path . $user->profile->photo)) {
                    unlink($path . $user->profile->photo);
                }

                $request->file('photo')->storeAs('uploads/photo', $filename, 'public');

                $attr['photo'] = $filename;
            } else {
                $attr['photo'] = $user->profile->photo;
            }

            if (is_null($request->password)) {
                unset($attr['password']);
            } else {
                $attr['password'] = bcrypt($request->password);
            }

            $user->update($attr);

            $userProfile = UserProfile::where('user_id', $user->id)->first();

            $userProfile->update([
                'height' => $attr['height'],
                'weight' => $attr['weight'],
                'hobby' => $attr['hobby'],
                'job' => $attr['job'],
                'photo' => $attr['photo']
            ]);


            DB::commit();

            return redirect()
                ->route('users.index')
                ->with('success', __('Pengguna berhasil diedit'));
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()
                ->route('users.index')
                ->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $path = storage_path('app/public/uploads/photo/');

            if ($user->profile->photo != null && file_exists($path . $user->profile->photo)) {
                unlink($path . $user->profile->photo);
            }

            $user->profile()->delete();
            $user->roles()->detach();
            $user->delete();

            return redirect()
                ->route('users.index')
                ->with('success', 'Pengguna berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()
                ->route('users.index')
                ->with('error', __($th->getMessage()));
        }
    }
}
