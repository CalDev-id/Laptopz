<x-app-layout>
    <x-slot name="header">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>form validation</h3>
          <p class="text-subtitle text-muted">A pretty helpful component to show emphasized information to the user.</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">Alert</li>
            </ol>
          </nav>
        </div>
      </div>
    </x-slot>

    <div class="page-heading">
        <section class="section">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Bar Chart</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="bar"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Line Chart</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="line"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    {{-- <script src="assets/extensions/chart.js/chart.umd.js"></script>
    <script src="assets/static/js/pages/ui-chartjs.js"></script> --}}

    <script src="../js/pages/ui-chartjs.js"></script>


</x-app-layout>

