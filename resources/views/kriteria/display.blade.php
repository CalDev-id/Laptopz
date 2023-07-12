@extends('layouts.dashboard')

@section('inner-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Sub Kriteria</h3>
                    </div>
                    <form action="{{ route('subkriteria.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <input type="hidden" value="{{ $kriteria->id }}" name="kriteria_id">
                            <div class="form-group">
                                <label for="nama_subkriteria">Nama Sub Kriteria</label>
                                <input type="text" class="form-control" id="nama_subkriteria" name="nama_subkriteria" value="{{ old('nama_subkriteria') }}" required>
                                @error('nama_subkriteria')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="bobot">Bobot Sub Kriteria</label>
                                <input type="number" min="1" class="form-control" id="bobot" name="bobot" value="{{ old('bobot') }}" required>
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
                        <h3 class="card-title">List Sub Kriteria</h3>
                        <br>
                        <h3 class="card-title mt-1">"{{ $kriteria->nama_kriteria }}"</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="subkriteria" class="table table-striped table-hover">
                                <thead>
                                <tr class="bg-gradient bg-dark text-light">
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Bobot</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($subkriteria as $row)
                                        <tr>
                                            <td class="p-1 align-middle text-center">{{ $no++ }}</td>
                                            <td class="p-1 align-middle text-center">{{ $row->nama_subkriteria }}</td>
                                            <td class="p-1 align-middle text-center">{{ $row->bobot }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <div class="btn-group">
                                                        <a href="{{ route('subkriteria.edit', $row->id) }}" class="btn btn-warning rounded mr-2"><i class="fa fa-edit mr-1"></i> Edit</a>
                                                        <form action="{{ route('subkriteria.destroy', $row->id) }}" method="POST" class="delete-form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger rounded hapus">
                                                                <i class="fa fa-trash mr-1"></i> Hapus
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
            $("#subkriteria").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#subkriteria_wrapper .col-md-6:eq(0)');
        });

        $(function () {
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
                                success: function (response) {
                                    if (response.success) {
                                        Swal.fire({
                                            title: response.message,
                                            icon: "success",
                                            showCancelButton: false,
                                            confirmButtonColor: "#3085d6",
                                            confirmButtonText: "OK"
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location = "{{ route('kriteria.display', $kriteria->id) }}"
                                            }
                                        });
                                    } else {
                                        Swal.fire({
                                            title: "Gagal menghapus data",
                                            text: response.message,
                                            icon: "error",
                                            showCancelButton: false,
                                            confirmButtonColor: "#3085d6",
                                            confirmButtonText: "OK"
                                        });
                                    }
                                },
                                error: function () {
                                    Swal.fire({
                                        title: "Gagal menghapus data",
                                        icon: "error",
                                        showCancelButton: false,
                                        confirmButtonColor: "#3085d6",
                                        confirmButtonText: "OK"
                                    });
                                }
                            });
                        } else {
                            Swal.fire("Data aman", "", "info");
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
            @if(Session::has('err'))
                Swal.fire({
                    title: "{{ Session::get('err') }}",
                    icon: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK"
                });
            @endif
            @if(Session::has('errpenilaian'))
                Swal.fire({
                    title: "{{ Session::get('errpenilaian') }}",
                    text: "Hapus penilaian terlebih dahulu",
                    icon: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK"
                });
            @endif
        });
    </script>
@endsection