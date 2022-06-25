@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card o-hidden border-0 shadow-lg">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-left">
                                    <h1 class="h4 text-gray-900 mb-4">Tambah Data Recuitment</h1>
                                </div>
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        <b>Opps!</b> {{ session('error') }}
                                    </div>
                                @endif
                                <form class="input" action="{{ url('/recuitment/store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Nama Lowongan</label>
                                        <select class="form-control form-control-select" name="category_id">
                                            {{-- @foreach ($categories as $value)
                                                <option value="{{ $value->id }}" class="form-control"
                                                    {{ isset($data->category_id) ? ($value->id == $data->category_id ? 'selected' : '') : '' }}>
                                                    {{ $value->description }}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Deskripsi Pekerjaan</label>
                                        <textarea class="ckeditor form-control" name="description" id="ck_texteditor"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Tipe Pekerjaan</label>
                                        <select class="form-control form-control-select" name="category_id">
                                            {{-- @foreach ($categories as $value)
                                                <option value="{{ $value->id }}" class="form-control"
                                                    {{ isset($data->category_id) ? ($value->id == $data->category_id ? 'selected' : '') : '' }}>
                                                    {{ $value->description }}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Kualifikasi Pekerjaan</label>
                                        <select class="form-control form-control-select" name="category_id">
                                            {{-- @foreach ($categories as $value)
                                                <option value="{{ $value->id }}" class="form-control"
                                                    {{ isset($data->category_id) ? ($value->id == $data->category_id ? 'selected' : '') : '' }}>
                                                    {{ $value->description }}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Jenis Perusahaan</label>
                                        <select class="form-control form-control-select" name="category_id">
                                            {{-- @foreach ($categories as $value)
                                                <option value="{{ $value->id }}" class="form-control"
                                                    {{ isset($data->category_id) ? ($value->id == $data->category_id ? 'selected' : '') : '' }}>
                                                    {{ $value->description }}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>

                                    <label>Sallary</label>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="number" class="form-control form-control-input"
                                                    id="exampleInputPassword" placeholder="10000" name="sallary_start"
                                                    value="{{ isset($data) ? $data->sallary_start : '' }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="number" class="form-control form-control-input"
                                                    id="exampleInputPassword" placeholder="20000" name="sallary_end"
                                                    value="{{ isset($data) ? $data->sallary_end : '' }}">
                                            </div>
                                        </div>
                                    </div>

                                    <label>Tanggal Aktif</label>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="date" class="form-control form-control-input"
                                                    id="exampleInputPassword" name="sallary_start"
                                                    value="{{ isset($data) ? $data->sallary_start : '' }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="date" class="form-control form-control-input"
                                                    id="exampleInputPassword" name="sallary_end"
                                                    value="{{ isset($data) ? $data->sallary_end : '' }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Lama Proses Lowongan</label>
                                        <input type="text" name="day_process" class="form-control form-control-input"
                                            required="" oninvalid="this.setCustomValidity(`${messageValidation}`)">
                                    </div>

                                    <div class="float-right mt-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="submit"
                                                    class="btn btn-primary btn-user btn-block mt-2">Simpan</button>
                                            </div>
                                        </div>
                                        <br><br>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js-content')
    <script type="text/javascript">
        $(document).ready(function() {
            CKEDITOR.replace('ck_texteditor', {
                // toolbar: 'MyToolbar',
                // uiColor: '#9AB8F3'
                fullPage: true,
                linkShowAdvancedTab: false,
                scayt_autoStartup: true,
                enterMode: Number(2),
                toolbar: [
                    ['Styles', 'Bold', 'Italic', 'Underline', '-',
                        'NumberedList',
                        'BulletedList', 'SpellChecker', '-', 'Undo',
                        'Redo', '-', 'SelectAll', 'NumberedList',
                        'BulletedList', 'FontSize'
                    ],
                    ['UIColor']
                ]
            });
        });
    </script>
@endsection
