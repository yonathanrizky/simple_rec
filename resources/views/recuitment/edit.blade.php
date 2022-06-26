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
                                    <h1 class="h4 text-gray-900 mb-4">Ubah Data Recuitment</h1>
                                </div>
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        <b>Opps!</b> {{ session('error') }}
                                    </div>
                                @endif
                                <form class="input" action="{{ url('/recuitment/update', $data->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    @include('recuitment.input')
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
