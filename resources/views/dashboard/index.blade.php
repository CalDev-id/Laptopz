@extends('layouts.dashboard')

@section('inner-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $user }}</h3>
                        <h4>User</h4>
                    </div>
                    <div class="icon">
                        <i class="ion fas fa-users"></i>
                    </div>
                    <a href="{{ route('dashboard.index') }}" class="small-box-footer">More info ... <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $kriteria }}</h3>
                        <h4>Kriteria</h4>
                    </div>
                    <div class="icon">
                        <i class="ion fas fa-globe"></i>
                    </div>
                    <a href="{{ route('kriteria.index') }}" class="small-box-footer">More info ... <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $subkriteria }}</h3>
                        <h4>Sub Kriteria</h4>
                    </div>
                    <div class="icon">
                        <i class="ion fas fa-puzzle-piece"></i>
                    </div>
                    <a href="{{ route('kriteria.index') }}" class="small-box-footer">More info ... <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $alternatif }}</h3>
                        <h4>Alternatif</h4>
                    </div>
                    <div class="icon">
                        <i class="ion fas fa-laptop"></i>
                    </div>
                    <a href="{{ route('alternatif.index') }}" class="small-box-footer">More info ... <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection

