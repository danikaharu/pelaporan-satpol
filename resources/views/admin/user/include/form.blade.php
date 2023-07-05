<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Pengaturan Akun</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="inputName">Nama Lengkap<span class="text-danger">
                            &#42;</span></label>
                    <input type="text" id="inputName" name="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ isset($user) ? $user->name : old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputEmail">Email <span class="text-danger">
                            &#42;</span></label>
                    <input type="email" id="inputEmail" name="email"
                        class="form-control @error('email') is-invalid @enderror"
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
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-md-6">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Biodata</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="inputHeight">Tinggi Badan </label>
                    <input type="text" id="inputHeight" name="height"
                        class="form-control @error('height') is-invalid @enderror"
                        value="{{ isset($user) ? $user->profile->height : old('height') }}">
                    @error('height')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputWeight">Berat Badan </label>
                    <input type="text" id="inputWeight" name="weight"
                        class="form-control @error('weight') is-invalid @enderror"
                        value="{{ isset($user) ? $user->profile->weight : old('weight') }}">
                    @error('weight')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputHobby">Hobi</label>
                    <input type="text" id="inputHobby" name="hobby"
                        class="form-control @error('hobby') is-invalid @enderror"
                        value="{{ isset($user) ? $user->profile->hobby : old('hobby') }}">
                    @error('hobby')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputJob">Pekerjaan</label>
                    <select name="job" id="inputJob"
                        class="form-control @error('job') is-invalid @enderror custom-select">
                        <option selected disabled>-- Pilih Pekerjaan --</option>
                        <option value="1"
                            {{ isset($user) && $user->profile->job == 1 ? 'selected' : (old('status') == 1 ? 'selected' : '') }}>
                            Siswa</option>
                        <option value="2"
                            {{ isset($user) && $user->profile->job == 2 ? 'selected' : (old('status') == 2 ? 'selected' : '') }}>
                            Guru</option>
                        <option value="3"
                            {{ isset($user) && $user->profile->job == 3 ? 'selected' : (old('status') == 3 ? 'selected' : '') }}>
                            Pegawai Sekolah</option>
                    </select>
                    @error('job')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputPhoto">Photo</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('photo') is-invalid @enderror"
                                id="inputPhoto" name="photo">
                            <label class="custom-file-label" for="inputPhoto">Choose file</label>
                        </div>
                    </div>
                    @error('photo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        @isset($user->profile->photo)
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Files</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>File Name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>Foto</td>
                                <td class="text-right py-0 align-middle">
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ asset('storage/uploads/photo/' . $user->profile->photo) }}"
                                            class="btn btn-info"><i class="fas fa-eye"></i></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        @endisset
    </div>
</div>
