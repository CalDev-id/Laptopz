@extends('layouts.dashboard')

@section('inner-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Kriteria</h3>
                    </div>
                    <form action="{{ route('kriteria.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="kode">Kode Kriteria</label>
                                <input type="text" class="form-control" id="kode" name="kode" required>
                                @error('kode')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama_kriteria">Nama Kriteria</label>
                                <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" required>
                                @error('nama_kriteria')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="attribut">Attribut Kriteria</label>
                                <select name="attribut" class="form-control" id="attribut" required>
                                    <option>Benefit</option>
                                    <option>Cost</option>
                                </select>
                                @error('attribut')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="bobot">Bobot Kriteria (%)</label>
                                <input type="number" min="1" class="form-control" id="bobot" name="bobot" required>
                                @error('bobot')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
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
                                                        <a href="{{ route('kriteria.display',$row->id) }}" class="btn btn-info rounded mr-2"><i class="fa fa-eye"></i></a>
                                                        <a href="{{ route('kriteria.edit',$row->id) }}" class="btn btn-warning rounded mr-2"><i class="fa fa-edit"></i></a>
                                                        <form action="{{ route('kriteria.destroy', $row->id) }}" method="POST" class="delete-form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger rounded hapus">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
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
            $("#kriteria").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#kriteria_wrapper .col-md-6:eq(0)');
        });

        $(document).ready(function () {
            function attachDeleteEventListener() {
                $('.hapus').off('click').on('click', function (event) {
                    event.preventDefault();

                    var deleteForm = $(this).closest('.delete-form');

                    Swal.fire({
                        title: "Apa kamu yakin?",
                        text: "Sekali kamu hapus, data tidak dapat dikembalikan!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Ya, hapus!",
                        cancelButtonText: "Batal"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: deleteForm.attr('action'),
                                type: 'POST',
                                data: {
                                    '_method': 'DELETE',
                                    '_token': "{{ csrf_token() }}"
                                },
                                success: function () {
                                    Swal.fire({
                                        title: "Berhasil menghapus data",
                                        icon: "success",
                                        showCancelButton: false,
                                        confirmButtonColor: "#3085d6",
                                        confirmButtonText: "OK"
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location = "{{ route('kriteria.index') }}"
                                        }
                                    });
                                }
                            });
                        } else {
                            Swal.fire("Data aman!", "", "info");
                        }
                    });

                    return false;
                });
            }

            attachDeleteEventListener();

            $('body').on('DOMSubtreeModified', '.dataTables_paginate', function () {
                setTimeout(attachDeleteEventListener, 100);
            });

            @if(Session::has('msg'))
                Swal.fire({
                    title: "{{ Session::get('msg') }}",
                    icon: "success",
                    showCancelButton: false,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK"
                });
            @endif
        });
    </script>
@endsection

