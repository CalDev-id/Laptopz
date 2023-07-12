@extends('layouts.dashboard')

@section('inner-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tahap Analisa</h3>
                    </div>
                    <div class="card-body">
                        <table id="analisa" class="table table-bordered table-hover" class="table-responsive">
                            <thead>
                                <tr class="bg-gradient bg-dark text-light">
                                    <th>Alternatif / Kriteria</th>
                                    @foreach($kriteria as $key => $value)
                                        <th class="text-center">{{ $value->kode }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($alternatif as $alt => $valt)
                                    <tr>
                                        <td>{{ $valt->nama_alternatif }}</td>
                                        @if(count($valt->penilaian) > 0)
                                            @foreach($valt->penilaian as $key => $value)
                                                <td class="text-center">
                                                    {{ $value->subkriteria->bobot }}
                                                </td>
                                            @endforeach
                                        @endif
                                    </tr>
                                @empty
                                    <tr>
                                        <td>Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tahap Normalisasi</h3>
                    </div>
                    <div class="card-body">
                        <table id="normalisasi" class="table table-bordered table-hover" class="table-responsive">
                            <thead>
                                <tr class="bg-gradient bg-dark text-light">
                                    <th>Alternatif / Kriteria</th>
                                    @foreach($kriteria as $key => $value)
                                        <th class="text-center">{{ $value->kode }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($normalisasi as $key => $value)
                                    <tr>
                                        <td>{{ $key }}</td>
                                        @foreach($value as $key_1 => $value_1)
                                            <td class="text-center">
                                                {{ number_format($value_1,3) }}
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tahap Perankingan</h3>
                    </div>
                    <div class="card-body">
                        <table id="perankingan" class="table table-bordered table-hover" class="table-responsive">
                            <thead>
                                <tr class="bg-gradient bg-dark text-light">
                                    <th rowspan="2" style="vertical-align: middle;">Alternatif / Kriteria</th>
                                    @foreach($kriteria as $key => $value)
                                        <th class="text-center">{{ $value->kode }}</th>
                                    @endforeach
                                    <th rowspan="2" style="vertical-align: middle;" class="text-center">Total</th>
                                    <th rowspan="2" style="vertical-align: middle;" class="text-center">Rank</th>
                                </tr>
                                <tr class="bg-gradient bg-dark text-light">
                                    {{-- <th rowspan="2">Bobot</th> --}}
                                    @foreach($kriteria as $key => $value)
                                        <th class="text-center">{{ $value->bobot }}%</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1;@endphp
                                @foreach($ranking as $key => $value)
                                    <tr>
                                        <td>{{ $key }}</td>
                                        @foreach($value as $key_1 => $value_1)
                                            <td class="text-center">{{ number_format($value_1,3) }}</td>
                                        @endforeach
                                        <td class="text-center">{{ $no++ }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $("#analisa").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#analisa_wrapper .col-md-6:eq(0)');

            $("#normalisasi").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#normalisasi_wrapper .col-md-6:eq(0)');

            $("#perankingan").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#perankingan_wrapper .col-md-6:eq(0)');
        });

        // $(document).ready(function () {
        //     @if(Session::has('msg'))
        //         Swal.fire({
        //             title: "{{ Session::get('msg') }}",
        //             icon: "success",
        //             showCancelButton: false,
        //             confirmButtonColor: "#3085d6",
        //             confirmButtonText: "OK"
        //         });
        //     @endif
        //     @if(Session::has('err'))
        //         Swal.fire({
        //             title: "{{ Session::get('err') }}",
        //             icon: "error",
        //             showCancelButton: false,
        //             confirmButtonColor: "#3085d6",
        //             confirmButtonText: "OK"
        //         });
        //     @endif
        // });
    </script>
@endsection

