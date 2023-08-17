<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $users = User::role('user')->latest();

            return Datatables::of($users)
                ->addIndexColumn()
                ->addColumn('action', 'admin.user.include.action')
                ->toJson();
        }

        return view('admin.user.index');
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

            $user = User::create($attr);

            $user->assignRole(2);

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

            if (is_null($request->password)) {
                unset($attr['password']);
            } else {
                $attr['password'] = bcrypt($request->password);
            }

            $user->update($attr);


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
