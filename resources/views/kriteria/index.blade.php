@extends('layouts.dashboard')

@section('inner-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">Preset Kriteria</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('kriteria.applyPreset') }}" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-secondary">Edit Preset</button>
                                </div>
                                <select name="preset" class="form-control rounded-right" id="preset" required>
                                    <option value="allrounder" {{ $lastPreset === 'allrounder' ? 'selected' : '' }}>All Rounder</option>
                                    <option value="graphicdesign" {{ $lastPreset === 'graphicdesign' ? 'selected' : '' }}>Editing / Graphic Design</option>
                                    <option value="gamedevelopment" {{ $lastPreset === 'gamedevelopment' ? 'selected' : '' }}>Gaming / Game Development</option>
                                    <option value="work/business" {{ $lastPreset === 'work/business' ? 'selected' : '' }}>Working / Business</option>
                                </select>
                                <button class="btn btn-success ml-3"><i class="fa fa-check mr-1"></i> Terapkan</button>
                            </div>
                        </form>
                        <hr style="border-top: 3px dashed #ccc;">
                        <div class="table-responsive">
                            <table id="listpreset" class="table table-striped table-hover">
                                <thead>
                                    <tr class="bg-gradient bg-dark text-light">
                                        <th>Nama Preset / Bobot Kriteria</th>
                                        <th class="text-center">Kapasitas RAM</th>
                                        <th class="text-center">Jenis Processor</th>
                                        <th class="text-center">Core & Thread Processor</th>
                                        <th class="text-center">Kapasitas Penyimpanan</th>
                                        <th class="text-center">Jenis Penyimpanan</th>
                                        <th class="text-center">Resolusi Layar</th>
                                        <th class="text-center">Berat</th>
                                        <th class="text-center">Kapasitas Baterai</th>
                                        <th class="text-center">Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>All Rounder</td>
                                        <td class="p-1 align-middle text-center">13%</td>
                                        <td class="p-1 align-middle text-center">8%</td>
                                        <td class="p-1 align-middle text-center">15%</td>
                                        <td class="p-1 align-middle text-center">13%</td>
                                        <td class="p-1 align-middle text-center">13%</td>
                                        <td class="p-1 align-middle text-center">10%</td>
                                        <td class="p-1 align-middle text-center">8%</td>
                                        <td class="p-1 align-middle text-center">10%</td>
                                        <td class="p-1 align-middle text-center">10%</td>
                                    </tr>
                                    <tr>
                                        <td>Working / Business</td>
                                        <td class="p-1 align-middle text-center">10%</td>
                                        <td class="p-1 align-middle text-center">8%</td>
                                        <td class="p-1 align-middle text-center">10%</td>
                                        <td class="p-1 align-middle text-center">15%</td>
                                        <td class="p-1 align-middle text-center">13%</td>
                                        <td class="p-1 align-middle text-center">8%</td>
                                        <td class="p-1 align-middle text-center">13%</td>
                                        <td class="p-1 align-middle text-center">13%</td>
                                        <td class="p-1 align-middle text-center">10%</td>
                                    </tr>
                                    <tr>
                                        <td>Gaming / Game Development</td>
                                        <td class="p-1 align-middle text-center">13%</td>
                                        <td class="p-1 align-middle text-center">10%</td>
                                        <td class="p-1 align-middle text-center">20%</td>
                                        <td class="p-1 align-middle text-center">13%</td>
                                        <td class="p-1 align-middle text-center">13%</td>
                                        <td class="p-1 align-middle text-center">10%</td>
                                        <td class="p-1 align-middle text-center">5%</td>
                                        <td class="p-1 align-middle text-center">8%</td>
                                        <td class="p-1 align-middle text-center">8%</td>
                                    </tr>
                                    <tr>
                                        <td>Editing / Graphic Design</td>
                                        <td class="p-1 align-middle text-center">13%</td>
                                        <td class="p-1 align-middle text-center">8%</td>
                                        <td class="p-1 align-middle text-center">13%</td>
                                        <td class="p-1 align-middle text-center">10%</td>
                                        <td class="p-1 align-middle text-center">13%</td>
                                        <td class="p-1 align-middle text-center">15%</td>
                                        <td class="p-1 align-middle text-center">8%</td>
                                        <td class="p-1 align-middle text-center">10%</td>
                                        <td class="p-1 align-middle text-center">10%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Kriteria</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="kriteria" class="table table-striped table-hover">
                                <thead>
                                    <tr class="bg-gradient bg-dark text-light">
                                        <th class="text-center">No</th>
                                        <th class="text-center">Kode</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Attribut</th>
                                        <th class="text-center">Bobot</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($kriteria as $row)
                                        <tr>
                                            <td class="p-1 align-middle text-center">{{ $no++ }}</td>
                                            <td class="p-1 align-middle text-center">{{ $row->kode }}</td>
                                            <td class="p-1 align-middle text-center">{{ $row->nama_kriteria }}</td>
                                            <td class="p-1 align-middle text-center">{{ $row->attribut }}</td>
                                            <td class="p-1 align-middle text-center">{{ $row->bobot }}%</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <div class="btn-group">
                                                        <a href="{{ route('kriteria.display',$row->id) }}" class="btn btn-info rounded mr-2"><i class="fa fa-eye mr-1"></i> Read</a>
                                                        <a href="{{ route('kriteria.edit',$row->id) }}" class="btn btn-warning rounded mr-2"><i class="fa fa-edit mr-1"></i> Edit</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $("#listpreset").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#listpreset_wrapper .col-md-6:eq(0)');
        });

        $(function () {
            $("#kriteria").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#kriteria_wrapper .col-md-6:eq(0)');
        });

        $(document).ready(function () {
            @if(Session::has('msg'))
                Swal.fire({
                    title: "{{ Session::get('msg') }}",
                    icon: "success",
                    showCancelButton: false,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK"
                });
            @endif
            @if(Session::has('err'))
                Swal.fire({
                    title: "{{ Session::get('err') }}",
                    icon: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK"
                });
            @endif
        });
    </script>
@endsection

