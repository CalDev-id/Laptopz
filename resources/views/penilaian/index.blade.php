@extends('layouts.dashboard')

@section('inner-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Kode Kriteria</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="kriteria" class="table table-striped table-hover table-responsive">
                            <thead>
                                <tr class="bg-gradient bg-dark text-light">
                                    <th class="text-center" width="10%">Kode Kriteria</th>
                                    <th class="text-center" width="20%">Nama Kriteria</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kriteria as $kri => $vkri)
                                    <tr>
                                        <td class="p-1 align-middle text-center">{{ $vkri->kode }}</td>
                                        <td class="p-1 align-middle text-center">{{ $vkri->nama_kriteria }}</td>
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
                        <h3 class="card-title">Penilaian Alternatif</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('penilaian.store') }}" method="POST">
                            @if(count($penilaian) < 1)
                                <button type="submit" class="btn btn-success mb-3">Generate</button>
                            @endif
                            @csrf
                            <table id="penilaian" class="table table-striped table-hover table-responsive">
                                <thead>
                                    <tr class="bg-gradient bg-dark text-light">
                                        <th width="10%">Nama Alternatif</th>
                                        @if(count($penilaian) < 1)
                                            <th class="text-center" width="20%">Kode Kriteria</th>  
                                        @endif
                                        @foreach($kriteria as $key => $value)
                                            <th class="text-center">{{ $value->kode }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($alternatif as $alt => $valt)
                                        <tr>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#alternativeModal{{ $valt->id }}">
                                                    {{ $valt->nama_alternatif }}
                                                </a>
                                            </td>
                                            @if(count($valt->penilaian) > 0)
                                                @foreach($kriteria as $key => $value)
                                                    <td class="text-center">
                                                        @foreach($value->subkriteria as $k_1 => $v_1)
                                                            {{ $v_1->id == $valt->penilaian[$key]->subkriteria_id ? $v_1->nama_subkriteria : ''}}
                                                        @endforeach
                                                    </td>
                                                @endforeach
                                            @else
                                                <td class="text-center" colspan="9">---</td>
                                            @endif
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="alternativeModal{{ $valt->id }}" tabindex="-1" role="dialog" aria-labelledby="alternativeModalLabel{{ $valt->id }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="alternativeModalLabel{{ $valt->id }}">Nama Alternatif: {{ $valt->nama_alternatif }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @foreach($kriteria as $key => $value)
                                                            <div class="form-group">
                                                                <label>{{ $value->kode }} - {{ $value->nama_kriteria }}</label>
                                                                @if(count($valt->penilaian) > 0)
                                                                    @if($value->id == 1)
                                                                        <select name="subkriteria_id[{{ $valt->id }}][{{ $value->id }}]" class="form-control">
                                                                            @foreach($value->subkriteria as $k_1 => $v_1)
                                                                                <option value="{{ $v_1->id }}" {{ $v_1->id == $valt->penilaian[$key]->subkriteria_id ? 'selected' : ''}}>{{ $v_1->nama_subkriteria }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    @elseif($value->id == 2)
                                                                        <select name="subkriteria_id[{{ $valt->id }}][{{ $value->id }}]" class="form-control">
                                                                            @foreach($value->subkriteria as $k_1 => $v_1)
                                                                                <option value="{{ $v_1->id }}" {{ $v_1->id == $valt->penilaian[$key]->subkriteria_id ? 'selected' : ''}}>{{ $v_1->nama_subkriteria }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    @elseif($value->id == 3)
                                                                        <select name="subkriteria_id[{{ $valt->id }}][{{ $value->id }}]" class="form-control">
                                                                            @foreach($value->subkriteria as $k_1 => $v_1)
                                                                                <option value="{{ $v_1->id }}" {{ $v_1->id == $valt->penilaian[$key]->subkriteria_id ? 'selected' : ''}}>{{ $v_1->nama_subkriteria }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    @elseif($value->id == 4)
                                                                        <select name="subkriteria_id[{{ $valt->id }}][{{ $value->id }}]" class="form-control">
                                                                            @foreach($value->subkriteria as $k_1 => $v_1)
                                                                                <option value="{{ $v_1->id }}" {{ $v_1->id == $valt->penilaian[$key]->subkriteria_id ? 'selected' : ''}}>{{ $v_1->nama_subkriteria }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    @elseif($value->id == 5)
                                                                        <select name="subkriteria_id[{{ $valt->id }}][{{ $value->id }}]" class="form-control">
                                                                            @foreach($value->subkriteria as $k_1 => $v_1)
                                                                                <option value="{{ $v_1->id }}" {{ $v_1->id == $valt->penilaian[$key]->subkriteria_id ? 'selected' : ''}}>{{ $v_1->nama_subkriteria }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    @elseif($value->id == 6)
                                                                        <select name="subkriteria_id[{{ $valt->id }}][{{ $value->id }}]" class="form-control">
                                                                            @foreach($value->subkriteria as $k_1 => $v_1)
                                                                                <option value="{{ $v_1->id }}" {{ $v_1->id == $valt->penilaian[$key]->subkriteria_id ? 'selected' : ''}}>{{ $v_1->nama_subkriteria }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    @elseif($value->id == 7)
                                                                        <select name="subkriteria_id[{{ $valt->id }}][{{ $value->id }}]" class="form-control">
                                                                            @foreach($value->subkriteria as $k_1 => $v_1)
                                                                                <option value="{{ $v_1->id }}" {{ $v_1->id == $valt->penilaian[$key]->subkriteria_id ? 'selected' : ''}}>{{ $v_1->nama_subkriteria }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    @elseif($value->id == 8)
                                                                        <select name="subkriteria_id[{{ $valt->id }}][{{ $value->id }}]" class="form-control">
                                                                            @foreach($value->subkriteria as $k_1 => $v_1)
                                                                                <option value="{{ $v_1->id }}" {{ $v_1->id == $valt->penilaian[$key]->subkriteria_id ? 'selected' : ''}}>{{ $v_1->nama_subkriteria }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    @elseif($value->id == 9)
                                                                        <select name="subkriteria_id[{{ $valt->id }}][{{ $value->id }}]" class="form-control">
                                                                            @foreach($value->subkriteria as $k_1 => $v_1)
                                                                                <option value="{{ $v_1->id }}" {{ $v_1->id == $valt->penilaian[$key]->subkriteria_id ? 'selected' : ''}}>{{ $v_1->nama_subkriteria }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    @endif
                                                                @else
                                                                    @if($value->id == 1)
                                                                        <select name="subkriteria_id[{{ $valt->id }}][{{ $value->id }}]" class="form-control">
                                                                            @foreach($value->subkriteria as $k_1 => $v_1)
                                                                                <option value="{{ $v_1->id }}">{{ $v_1->nama_subkriteria }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    @elseif($value->id == 2)
                                                                        <select name="subkriteria_id[{{ $valt->id }}][{{ $value->id }}]" class="form-control">
                                                                            @foreach($value->subkriteria as $k_1 => $v_1)
                                                                                <option value="{{ $v_1->id }}">{{ $v_1->nama_subkriteria }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    @elseif($value->id == 3)
                                                                        <select name="subkriteria_id[{{ $valt->id }}][{{ $value->id }}]" class="form-control">
                                                                            @foreach($value->subkriteria as $k_1 => $v_1)
                                                                                <option value="{{ $v_1->id }}">{{ $v_1->nama_subkriteria }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    @elseif($value->id == 4)
                                                                        <select name="subkriteria_id[{{ $valt->id }}][{{ $value->id }}]" class="form-control">
                                                                            @foreach($value->subkriteria as $k_1 => $v_1)
                                                                                <option value="{{ $v_1->id }}">{{ $v_1->nama_subkriteria }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    @elseif($value->id == 5)
                                                                        <select name="subkriteria_id[{{ $valt->id }}][{{ $value->id }}]" class="form-control">
                                                                            @foreach($value->subkriteria as $k_1 => $v_1)
                                                                                <option value="{{ $v_1->id }}">{{ $v_1->nama_subkriteria }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    @elseif($value->id == 6)
                                                                        <select name="subkriteria_id[{{ $valt->id }}][{{ $value->id }}]" class="form-control">
                                                                            @foreach($value->subkriteria as $k_1 => $v_1)
                                                                                <option value="{{ $v_1->id }}">{{ $v_1->nama_subkriteria }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    @elseif($value->id == 7)
                                                                        <select name="subkriteria_id[{{ $valt->id }}][{{ $value->id }}]" class="form-control">
                                                                            @foreach($value->subkriteria as $k_1 => $v_1)
                                                                                <option value="{{ $v_1->id }}">{{ $v_1->nama_subkriteria }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    @elseif($value->id == 8)
                                                                        <select name="subkriteria_id[{{ $valt->id }}][{{ $value->id }}]" class="form-control">
                                                                            @foreach($value->subkriteria as $k_1 => $v_1)
                                                                                <option value="{{ $v_1->id }}">{{ $v_1->nama_subkriteria }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    @elseif($value->id == 9)
                                                                        <select name="subkriteria_id[{{ $valt->id }}][{{ $value->id }}]" class="form-control">
                                                                            @foreach($value->subkriteria as $k_1 => $v_1)
                                                                                <option value="{{ $v_1->id }}">{{ $v_1->nama_subkriteria }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    @endif
                                                                @endif
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                                        <button class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal -->
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
            $("#kriteria").DataTable({
                "paging": false, "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#kriteria_wrapper .col-md-6:eq(0)');
        });

        $(function () {
            $("#penilaian").DataTable({
                "paging": false, "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["excel", "pdf", "print", "colvis"]
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
