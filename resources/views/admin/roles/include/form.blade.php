<div class="form-group">
    <label for="name">{{ __('Name') }}</label>
    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
        value="{{ isset($role) ? $role->name : old('name') }}" autofocus>
    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <label for="permissions">Hak Akses</label>
    <select name="permissions[]" id="permissions" class="form-control select2" multiple>
        @foreach ($permissions as $permission)
            <option value="{{ $permission->id }}"
                {{ isset($role) && $role->hasPermissionTo($permission->name) ? 'selected' : '' }}>
                {{ $permission->name }}
            </option>
        @endforeach
    </select>
    @error('permissions')
        <span class="text-danger" style="font-size: 14px">{{ $message }}</span>
    @enderror
</div>
