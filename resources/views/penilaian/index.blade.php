@extends('layouts.dashboard')

@section('inner-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Penilaian Alternatif</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('penilaian.store') }}" method="POST">
                            @csrf
                            <button class="btn btn-success mb-3">Simpan</button>
                            <table id="penilaian" class="table table-striped table-hover" class="table-responsive">
                                <thead>
                                    <tr class="bg-gradient bg-dark text-light">
                                        <th>Nama Alternatif</th>
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
                                                @foreach($kriteria as $key => $value)
                                                    <td>
                                                        <select name="subkriteria_id[{{ $valt->id }}][]" class="form-control">
                                                            @foreach($value->subkriteria as $k_1 => $v_1)
                                                                <option value="{{ $v_1->id }}" {{ $v_1->id == $valt->penilaian[$key]->subkriteria_id ? 'selected' : ''}}>{{ $v_1->nama_subkriteria }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                @endforeach
                                            @else
                                                @foreach($kriteria as $key => $value)
                                                    <td>
                                                        <select name="subkriteria_id[{{ $valt->id }}][]" class="form-control">
                                                            @foreach($value->subkriteria as $k_1 => $v_1)
                                                                <option value="{{ $v_1->id }}">{{ $v_1->nama_subkriteria }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                @endforeach
                                            @endif
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center">No data available in table</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $("#penilaian").DataTable({
                "paging": false, "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["colvis"]
            }).buttons().container().appendTo('#penilaian_wrapper .col-md-6:eq(0)');
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
        });
    </script>
@endsection

