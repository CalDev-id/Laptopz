@extends('layouts.dashboard')

@section('inner-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Kriteria</h3>
                        <br>
                        <h3 class="card-title mt-1">"{{ $kriteria->nama_kriteria }}"</h3>
                    </div>
                    <form action="{{ route('kriteria.update', $kriteria->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="kode">Kode Kriteria</label>
                                <input type="text" class="form-control" id="kode" name="kode" value="{{ $kriteria->kode }}" required>
                                @error('kode')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama_kriteria">Nama Kriteria</label>
                                <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" value="{{ $kriteria->nama_kriteria }}" required>
                                @error('nama_kriteria')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="attribut">Attribut Kriteria</label>
                                <select name="attribut" class="form-control" id="attribut" required>
                                    <option {{ $kriteria->attribut == 'Benefit' ? 'selected' : '' }}>Benefit</option>
                                    <option {{ $kriteria->attribut == 'Cost' ? 'selected' : '' }}>Cost</option>
                                </select>
                                @error('attribut')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="bobot">Bobot Kriteria (%)</label>
                                <input type="number" min="1" class="form-control" id="bobot" name="bobot" value="{{ $kriteria->bobot }}" required>
                                @error('bobot')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i> Simpan</button>
                            <a href="{{ route('kriteria.index') }}" class="btn btn-success float-right"><i class="fas fa-arrow-left mr-1"></i> Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8 col-12">
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
                                    @foreach($listkriteria as $row)
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
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