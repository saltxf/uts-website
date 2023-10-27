<table class="table table-borderless">
    <tr>
        <td><strong>Nama</strong></td>
        <td>
            <input type="text" name="nama" value="{{ $registration->nama }}"
                class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}"
                placeholder="Nama">
        </td>
    </tr>
    <tr>
        <td><strong>Alamat</strong></td>
        <td>
            <input type="text" name="alamat" value="{{ $registration->alamat }}"
                class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}"
                placeholder="Alamat">
        </td>
    </tr>
    <tr>
        <td><strong>Tanggal Lahir</strong></td>
        <td>
            <input type="date" name="tanggal_lahir" value="{{ $registration->tanggal_lahir }}"
                class="form-control{{ $errors->has('tanggal_lahir') ? ' is-invalid' : '' }}">
        </td>
    </tr>
    <tr>
        <td><strong>Jenis Kelamin</strong></td>
        <td>
            <input type="radio" name="jenis_kelamin" value="L" {{ $registration->jenis_kelamin == "L" ? 'checked' : '' }}> Laki-Laki
            <input type="radio" name="jenis_kelamin" value="P" {{ $registration->jenis_kelamin == "P" ? 'checked' : '' }}> Perempuan
        </td>
    </tr>
    <tr>
        <td><strong>Asal Sekolah</strong></td>
        <td>
            <input type="text" name="asal_sekolah" value="{{ $registration->asal_sekolah }}"
                class="form-control{{ $errors->has('asal_sekolah') ? ' is-invalid' : '' }}"
                placeholder="Asal Sekolah">
        </td>
    </tr>
    <tr>
        <td><strong>Agama</strong></td>
        <td>
            <select name="agama_id" class="form-control{{ $errors->has('agama_id') ? ' is-invalid' : '' }}">
                <option value="">--Pilih--</option>
                @foreach ($agamaList as $key => $value)
                    <option value="{{ $key }}" {{ $registration->agama_id == $key ? 'selected' : '' }}>
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </td>
    </tr>
    <tr>
        <td><strong>Nilai Indonesia</strong></td>
        <td>
            <input type="number" name="nilai_ind" value="{{ $registration->nilai_ind }}"
                class="form-control{{ $errors->has('nilai_ind') ? ' is-invalid' : '' }}"
                step="any" placeholder="0-10">
        </td>
    </tr>
    <tr>
        <td><strong>Nilai IPA</strong></td>
        <td>
            <input type="number" name="nilai_ipa" value="{{ $registration->nilai_ipa }}"
                class="form-control{{ $errors->has('nilai_ipa') ? ' is-invalid' : '' }}"
                step="any" placeholder="0-10">
        </td>
    </tr>
    <tr>
        <td><strong>Nilai MTK</strong></td>
        <td>
            <input type="number" name="nilai_mtk" value="{{ $registration->nilai_mtk }}"
                class="form-control{{ $errors->has('nilai_mtk') ? ' is-invalid' : '' }}"
                step="any" placeholder="0-10">
        </td>
    </tr>
    <!-- Add additional fields here if needed -->
</table>
