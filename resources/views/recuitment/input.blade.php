<div class="form-group">
    <label>Nama Lowongan</label>
    <input type="text" class="form-control" name="job_name" required=""
        value="{{ isset($data) ? $data->job_name : '' }}" oninvalid="this.setCustomValidity(`${messageValidation}`)">
</div>

<div class="form-group">
    <label>Deskripsi Pekerjaan</label>
    <textarea class="ckeditor form-control" name="description" id="ck_texteditor" required
        oninvalid="this.setCustomValidity(`${messageValidation}`)">{{ isset($data) ? $data->description : '' }}</textarea>
</div>

<div class="form-group">
    <label>Tipe Pekerjaan</label>
    <select class="form-control form-control-select" name="job_type_id">
        @foreach ($job_type as $value)
            <option value="{{ $value->id }}" class="form-control"
                {{ isset($data->job_type_id) ? ($value->id == $data->job_type_id ? 'selected' : '') : '' }}>
                {{ $value->description }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>Kualifikasi Pekerjaan</label>
    <select class="form-control form-control-select" name="job_qualification_id">
        @foreach ($job_qualification as $value)
            <option value="{{ $value->id }}" class="form-control"
                {{ isset($data->job_qualification_id) ? ($value->id == $data->job_qualification_id ? 'selected' : '') : '' }}>
                {{ $value->description }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>Jenis Perusahaan</label>
    <select class="form-control form-control-select" name="company_type_id">
        @foreach ($company_type as $value)
            <option value="{{ $value->id }}" class="form-control"
                {{ isset($data->company_type_id) ? ($value->id == $data->company_type_id ? 'selected' : '') : '' }}>
                {{ $value->description }}</option>
        @endforeach
    </select>
</div>

<label>Sallary</label>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <input type="number" class="form-control form-control-input" placeholder="10000" name="sallary_min"
                value="{{ isset($data) ? $data->sallary_min : '' }}">
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <input type="number" class="form-control form-control-input" placeholder="20000" name="sallary_max"
                value="{{ isset($data) ? $data->sallary_max : '' }}">
        </div>
    </div>
</div>

<label>Tanggal Aktif</label>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <input type="date" class="form-control form-control-input" name="start_date"
                value="{{ isset($data) ? $data->start_date : '' }}">
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <input type="date" class="form-control form-control-input" name="end_date"
                value="{{ isset($data) ? $data->end_date : '' }}">
        </div>
    </div>
</div>

<div class="form-group">
    <label>Lama Proses Lowongan</label>
    <input type="number" name="day_process" class="form-control form-control-input" placeholder="30" required=""
        max="180" oninvalid="this.setCustomValidity(`${messageValidation}`)"
        value="{{ isset($data) ? $data->day_process : '' }}">
</div>
