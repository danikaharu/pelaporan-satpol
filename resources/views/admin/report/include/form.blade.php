<div class="form-group">
    <label for="inputName">Nama Pelapor<span class="text-danger">
            &#42;</span></label>
    <input type="text" name="nama_pelapor" class="form-control @error('nama_pelapor') is-invalid @enderror"
        value="{{ isset($report) ? $report->nama_pelapor : old('nama_pelapor') }}">
    @error('nama_pelapor')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="inputName">Nomor HP/Whatsapp aktif<span class="text-danger">
            &#42;</span></label>
    <input type="number" name="nomor_hp" class="form-control @error('nomor_hp') is-invalid @enderror"
        value="{{ isset($report) ? $report->nomor_hp : old('nomor_hp') }}">
    @error('nomor_hp')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="inputName">Kabupaten<span class="text-danger">
            &#42;</span></label>
    <input type="text" name="kabupaten" class="form-control @error('kabupaten') is-invalid @enderror"
        value="Bone Bolango" readonly>
    @error('kabupaten')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="inputName">Kecamatan<span class="text-danger">
            &#42;</span></label>
    <select name="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror select2">
        <option value="">Pilih</option>
        <option value="1"
            {{ isset($report) && $report->kecamatan == '1' ? 'selected' : (old('kecamatan') == '1' ? 'selected' : '') }}>
            Kabila</option>
        <option value="2"
            {{ isset($report) && $report->kecamatan == '2' ? 'selected' : (old('kecamatan') == '2' ? 'selected' : '') }}>
            Bone</option>
        <option value="3"
            {{ isset($report) && $report->kecamatan == '3' ? 'selected' : (old('kecamatan') == '3' ? 'selected' : '') }}>
            Bone Raya</option>
        <option value="4"
            {{ isset($report) && $report->kecamatan == '4' ? 'selected' : (old('kecamatan') == '4' ? 'selected' : '') }}>
            Bonepantai</option>
        <option value="5"
            {{ isset($report) && $report->kecamatan == '5' ? 'selected' : (old('kecamatan') == '5' ? 'selected' : '') }}>
            Botupingge</option>
        <option value="6"
            {{ isset($report) && $report->kecamatan == '6' ? 'selected' : (old('kecamatan') == '6' ? 'selected' : '') }}>
            Bulango Selatan</option>
        <option value="7"
            {{ isset($report) && $report->kecamatan == '7' ? 'selected' : (old('kecamatan') == '7' ? 'selected' : '') }}>
            Bulango Timur</option>
        <option value="8"
            {{ isset($report) && $report->kecamatan == '8' ? 'selected' : (old('kecamatan') == '8' ? 'selected' : '') }}>
            Bulango Ulu</option>
        <option value="9"
            {{ isset($report) && $report->kecamatan == '9' ? 'selected' : (old('kecamatan') == '9' ? 'selected' : '') }}>
            Bulango Utara</option>
        <option value="10"
            {{ isset($report) && $report->kecamatan == '10' ? 'selected' : (old('kecamatan') == '10' ? 'selected' : '') }}>
            Bulawa</option>
        <option value="11"
            {{ isset($report) && $report->kecamatan == '11' ? 'selected' : (old('kecamatan') == '11' ? 'selected' : '') }}>
            Kabila Bone</option>
        <option value="12"
            {{ isset($report) && $report->kecamatan == '12' ? 'selected' : (old('kecamatan') == '12' ? 'selected' : '') }}>
            Pinogu</option>
        <option value="13"
            {{ isset($report) && $report->kecamatan == '13' ? 'selected' : (old('kecamatan') == '13' ? 'selected' : '') }}>
            Suwawa</option>
        <option value="14"
            {{ isset($report) && $report->kecamatan == '14' ? 'selected' : (old('kecamatan') == '14' ? 'selected' : '') }}>
            Suwawa Selatan</option>
        <option value="15"
            {{ isset($report) && $report->kecamatan == '15' ? 'selected' : (old('kecamatan') == '15' ? 'selected' : '') }}>
            Suwawa Tengah</option>
        <option value="16"
            {{ isset($report) && $report->kecamatan == '16' ? 'selected' : (old('kecamatan') == '16' ? 'selected' : '') }}>
            Suwawa Timur</option>
        <option value="17"
            {{ isset($report) && $report->kecamatan == '17' ? 'selected' : (old('kecamatan') == '17' ? 'selected' : '') }}>
            Tapa</option>
        <option value="18"
            {{ isset($report) && $report->kecamatan == '18' ? 'selected' : (old('kecamatan') == '18' ? 'selected' : '') }}>
            Tilongkabila</option>
    </select>
    @error('nomor_hp')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="inputName">Tanggal Pelaksanaan Kegiatan<span class="text-danger">
            &#42;</span></label>
    <input type="date" name="tanggal_kegiatan" class="form-control @error('tanggal_kegiatan') is-invalid @enderror"
        value="{{ isset($report) ? $report->tanggal_kegiatan : old('tanggal_kegiatan') }}">
    @error('tanggal_kegiatan')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="inputName">Jenis Kegiatan<span class="text-danger">
            &#42;</span></label>
    <p>*Contoh: Penegakan Perda Nomor 17 Tahun 2021 tentang Trantibum</p>
    <input type="text" name="jenis_kegiatan" class="form-control @error('jenis_kegiatan') is-invalid @enderror"
        value="{{ isset($report) ? $report->jenis_kegiatan : old('jenis_kegiatan') }}">
    @error('jenis_kegiatan')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="inputName">Jenis Pelanggaran</label>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Tidak Memiliki Izin" name="jenis_pelanggaran[]">
        <label class="form-check-label" for="defaultCheck1">
            Tidak Memiliki Izin
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Menghambat dan atau menutup fungsi ruang milik jalan"
            name="jenis_pelanggaran[]">
        <label class="form-check-label" for="defaultCheck1">
            Menghambat dan atau menutup fungsi ruang milik jalan
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Mendirikan Bangunan tidak sesuai peruntukannya"
            name="jenis_pelanggaran[]">
        <label class="form-check-label" for="defaultCheck1">
            Mendirikan Bangunan tidak sesuai peruntukannya
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Tidak membayar Pajak/retribusi"
            name="jenis_pelanggaran[]">
        <label class="form-check-label" for="defaultCheck1">
            Tidak membayar Pajak/retribusi
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Memanfaatkan barang milik Daerah secara tidak sah"
            name="jenis_pelanggaran[]">
        <label class="form-check-label" for="defaultCheck1">
            Memanfaatkan barang milik Daerah secara tidak sah
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Melanggar ketentuan Penyimpanan Minuman beralkohol"
            name="jenis_pelanggaran[]">
        <label class="form-check-label" for="defaultCheck1">
            Melanggar ketentuan Penyimpanan Minuman beralkohol
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" id="lainnyaCheckbox" type="checkbox" name="jenis_pelanggaran[]">
        <label class="form-check-label" for="defaultCheck1">
            Lainnya
        </label>
        <input type="text" id="lainnya">
    </div>
    @error('jenis_pelanggaran')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="inputName">Jenis Sanksi<span class="text-danger">
            &#42;</span></label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="jenis_sanksi" value="Pidana">
        <label class="form-check-label">
            Pidana
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="jenis_sanksi" value="Administratif">
        <label class="form-check-label">
            Administratif
        </label>
    </div>
    @error('jenis_sanksi')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="inputName">Jumlah Pelanggar</label>
    <input id="jumlah_pelanggar" type="number" name="jumlah_pelanggar"
        class="form-control @error('jumlah_pelanggar') is-invalid @enderror"
        value="{{ isset($report) ? $report->jumlah_pelanggar : old('jumlah_pelanggar') }}">
    @error('jumlah_pelanggar')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div id="nama_pelanggar_container"></div>
<div class="form-group">
    <label for="inputName">Sanksi Administratif</label>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Teguran Lisan" name="sanksi_administratif[]">
        <label class="form-check-label" for="defaultCheck1">
            Teguran Lisan
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Teguran Tertulis" name="sanksi_administratif[]">
        <label class="form-check-label" for="defaultCheck1">
            Teguran Tertulis
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Penghentian Kegiatan Sementara"
            name="sanksi_administratif[]">
        <label class="form-check-label" for="defaultCheck1">
            Penghentian Kegiatan Sementara
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Pencabutan sementara izin"
            name="sanksi_administratif[]">
        <label class="form-check-label" for="defaultCheck1">
            Pencabutan sementara izin
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Pencabutan tetap izin" name="sanksi_administratif[]">
        <label class="form-check-label" for="defaultCheck1">
            Pencabutan tetap izin
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Denda Administratif" name="sanksi_administratif[]">
        <label class="form-check-label" for="defaultCheck1">
            Denda Administratif
        </label>
    </div>
    @error('sanksi_administratif')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="inputName">Besaran Jumlah Denda Administratif</label>
    <p>Ditulis tanpa titik *contoh: 500000</p>
    <input type="number" name="denda_administratif"
        class="form-control @error('denda_administratif') is-invalid @enderror"
        value="{{ isset($report) ? $report->denda_administratif : old('denda_administratif') }}">
    @error('denda_administratif')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="inputName">Sanksi Pidana</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="sanksi_pidana" value="1">
        <label class="form-check-label">
            Denda
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="sanksi_pidana" value="2">
        <label class="form-check-label">
            Kurungan
        </label>
    </div>
</div>
<div class="form-group">
    <label for="inputName">Besaran Jumlah Denda Pidana</label>
    <p>Ditulis tanpa titik *contoh: 500000</p>
    <input type="number" name="denda_pidana" class="form-control @error('denda_pidana') is-invalid @enderror"
        value="{{ isset($report) ? $report->denda_pidana : old('denda_pidana') }}">
    @error('denda_pidana')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="inputName">Lama Kurungan</label>
    <p>*Contoh: 3 Bulan</p>
    <input type="text" name="lama_kurungan" class="form-control @error('lama_kurungan') is-invalid @enderror"
        value="{{ isset($report) ? $report->lama_kurungan : old('lama_kurungan') }}">
    @error('lama_kurungan')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="inputName">Foto Dokumentasi</label>
    <input type="file" name="file[]" class="form-control @error('file') is-invalid @enderror" multiple>
    @error('file')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
