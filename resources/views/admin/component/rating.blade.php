<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>rating</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">rating</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>

    <div class="page-heading">
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Basic Rating</h4>
                        </div>
                        <div class="card-body">
                            <div id="basic"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">5 Star Rating with Step</h4>
                        </div>
                        <div class="card-body">
                            <div id="step"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Unlimited Number of Stars</h4>
                        </div>
                        <div class="card-body">
                            <div id="unli1"></div>
                            <br>
                            <div id="unli2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <link rel="stylesheet" href="../vendors/rater-js/style.css">
    <script src="assets/extensions/rater-js/index.js?v=2"></script>
    <script src="../vendors/rater-js/rater-js.js"></script>

    <script src="../js/pages/rating.js"></script>


</x-app-layout>



