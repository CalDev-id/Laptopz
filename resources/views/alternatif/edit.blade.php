@extends('layouts.dashboard')

@section('inner-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Alternatif</h3>
                        <br>
                        <h3 class="card-title mt-1">"{{ $alternatif->nama_alternatif }}"</h3>
                    </div>
                    <form action="{{ route('alternatif.update', $alternatif->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_alternatif">Nama Alternatif</label>
                                <input type="text" class="form-control" id="nama_alternatif" name="nama_alternatif" value="{{ $alternatif->nama_alternatif }}" required>
                                @error('nama_alternatif')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i> Simpan</button>
                            <a href="{{ route('alternatif.index') }}" class="btn btn-success float-right"><i class="fas fa-arrow-left mr-1"></i> Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Alternatif</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="alternatif" class="table table-striped table-hover">
                                <thead>
                                    <tr class="bg-gradient bg-dark text-light">
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($listalternatif as $row)
                                        <tr>
                                            <td class="p-1 align-middle text-center">{{ $no++ }}</td>
                                            <td class="p-1 align-middle text-center">{{ $row->nama_alternatif }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <div class="btn-group">
                                                        <a href="{{ route('alternatif.edit', $row->id) }}" class="btn btn-warning rounded mr-2"><i class="fa fa-edit mr-1"></i> Edit</a>
                                                        <form action="{{ route('alternatif.destroy', $row->id) }}" method="POST" class="delete-form">
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
            $("#alternatif").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#alternatif_wrapper .col-md-6:eq(0)');
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
                                            window.location = "{{ route('alternatif.index') }}"
                                        }
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
        });
    </script>
@endsection

