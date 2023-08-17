<div class="form-group">
    <label for="inputName">Nama Lengkap<span class="text-danger">
            &#42;</span></label>
    <input type="text" id="inputName" name="name" class="form-control @error('name') is-invalid @enderror"
        value="{{ isset($user) ? $user->name : old('name') }}">
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="inputEmail">Email <span class="text-danger">
            &#42;</span></label>
    <input type="email" id="inputEmail" name="email" class="form-control @error('email') is-invalid @enderror"
        value="{{ isset($user) ? $user->email : old('email') }}">
    @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="inputUsername">Username <span class="text-danger">
            &#42;</span></label>
    <input type="text" id="inputUsername" name="username"
        class="form-control @error('username') is-invalid @enderror"
        value="{{ isset($user) ? $user->username : old('username') }}">
    @error('username')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="password">Password <span class="text-danger">
            &#42;</span></label>
    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password"
        autocomplete="off" />
    @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
