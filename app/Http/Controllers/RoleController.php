<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $users = Role::query();

            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d/m/Y H:i');
                })->addColumn('updated_at', function ($row) {
                    return $row->updated_at->format('d/m/Y H:i');
                })
                ->addColumn('action', 'admin.roles.include.action')
                ->toJson();
        }

        return view('admin.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();

        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->name]);

        $role->givePermissionTo($request->permissions);

        return redirect()
            ->route('roles.index')
            ->with('success', __('Data berhasil ditambah.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $role->load('permissions:id,name');
        $permissions = Permission::select('id', 'name')->get();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $role->update(['name' => $request->name]);

        $role->syncPermissions($request->permissions);

        return redirect()
            ->route('roles.index')
            ->with('success', __('Data berhasil diupdate.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        // if any user where role.id = $id
        if ($role->users_count < 1) {
            $role->delete();

            return redirect()
                ->route('roles.index')
                ->with('success', __('Data berhasil dihapus.'));
        } else {
            return redirect()
                ->route('roles.index')
                ->with('error', __('Can`t delete role.'));
        }

        return redirect()->route('roles.index');
    }
}
