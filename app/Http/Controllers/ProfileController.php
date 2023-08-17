<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('admin.profile.index', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            DB::beginTransaction();

            $attr = $request->validated();

            if (is_null($request->password)) {
                unset($attr['password']);
            } else {
                $attr['password'] = bcrypt($request->password);
            }

            $user->update($attr);


            DB::commit();

            return redirect()
                ->route('profile.index')
                ->with('success', __('Pengguna berhasil diedit'));
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()
                ->route('profile.index')
                ->with('error', $th->getMessage());
        }
    }
}
