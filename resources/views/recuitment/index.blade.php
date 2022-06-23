@extends('layouts.master')
@section('content')
    <div class="float-right">
        <div class="row">
            <div class="col-md-12 mb-3 float-right">
                <a href={{ url('recuitment/create') }} class='btn btn-success btn-circle'><i class="fas fa-plus"></i></a>
            </div>
        </div>
    </div>
    <div class="text-left">
        <h1 class="h4 text-gray-900 mb-4">Recuitment</h1>
    </div>
    <div class="table-responsive">
        <table id="table-career" class="table table-bordered dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Lowongan</th>
                    <th>Belum Diproses</th>
                    <th>Wawancara</th>
                    <th>Ditolak</th>
                    <th>Pilihan</th>
                </tr>
            </thead>
        </table>
    </div>
@endsection
{{-- @section('js-content')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table-career').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url('GPRO009/getData') }}',
                columns: [{
                        width: '10%',
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                    },
                    {
                        data: 'description'
                    },
                    {
                        width: '10%',
                        render: function(data, type, row) {
                            var s =
                                `<a href='{{ url('GPRO009/edit/${row.id}') }}' class='btn btn-success btn-circle'><i class="fas fa-clipboard"></i></a>
                                 <a href='{{ url('GPRO009/delete/${row.id}') }}' class='btn btn-danger btn-circle'><i class='fas fa-trash'></i></a>
                            `;
                            return s;
                        },
                    }
                ],
            });
        });
    </script>
@endsection --}}
