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
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Line Area Chart</h4>
                    </div>
                    <div class="card-body">
                        <div id="area"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Radial Gradient Chart</h4>
                    </div>
                    <div class="card-body">
                        <div id="radialGradient"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Line Chart</h4>
                    </div>
                    <div class="card-body">
                        <div id="line"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Bar Chart</h4>
                    </div>
                    <div class="card-body">
                        <div id="bar"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Radial Gradient Chart</h4>
                    </div>
                    <div class="card-body">
                        <div id="candle"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

{{-- <script src="assets/extensions/dayjs/dayjs.min.js"></script>
<script src="assets/extensions/apexcharts/apexcharts.min.js"></script>
<script src="assets/static/js/pages/ui-apexchart.js"></script> --}}

{{-- <script src="../vendors/apexcharts/apexcharts.min.js"></script> --}}
<script src="../vendors/apexcharts/apexcharts.js"></script>
<script src="../js/pages/ui-apexchart.js"></script>


</x-app-layout>