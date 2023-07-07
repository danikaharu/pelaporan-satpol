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
