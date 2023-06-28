<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Dashboard</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>

    <div class="page-heading">
        <section class="section">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Basic Sweet Alert</h4>
                            <p class="text-muted">SweetAlert automatically centers itself on the page and looks great no
                                matter if you're using a desktop computer, mobile or tablet. It's even highly customizable,
                                as you can see below!</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <button id="basic" class="btn btn-outline-primary btn-lg btn-block">Basic
                                        Example</button>
                                </div>
                                <div class="col-md-4 col-12">
                                    <button id="title" class="btn btn-outline-primary btn-lg btn-block">A title with a text</button>
                                </div>
                                <div class="col-md-4 col-12">
                                    <button id="footer" class="btn btn-outline-primary btn-lg btn-block">With
                                        Footer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Toast</h4>
                            <p class="text-muted">SweetAlert can also show a message in the corner of your screen!</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <button id="toast-success" class="btn btn-outline-primary btn-lg btn-block">Success Example</button>
                                </div>
                                <div class="col-md-4 col-12">
                                    <button id="toast-failed" class="btn btn-outline-primary btn-lg btn-block">Failed Toast</button>
                                </div>
                                <div class="col-md-4 col-12">
                                    <button id="toast-warning" class="btn btn-outline-primary btn-lg btn-block">Toast Warning</button>
                                </div>
                            </div>
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
                            <h4 class="card-title">Types</h4>
                            <p class='text-muted'>The type of the modal. SweetAlert comes with 5 built-in types which will
                                show a corresponding icon animation: "warning", "error", "success" and "info". You can also
                                set it as "input" to get a prompt modal. It can either be put in the object under the key
                                "icon" or passed as the third parameter of the function.</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <button id="success" class="btn btn-outline-success btn-lg btn-block">Success</button>
                                </div>
                                <div class="col-md-4 col-12">
                                    <button id="error" class="btn btn-outline-danger btn-lg btn-block">Error</button>
                                </div>
                                <div class="col-md-4 col-12">
                                    <button id="warning" class="btn btn-outline-warning btn-lg btn-block">Warning</button>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6 col-12">
                                    <button id="info" class="btn btn-outline-info btn-lg btn-block">Info</button>
                                </div>
                                <div class="col-md-6 col-12">
                                    <button id="question"
                                        class="btn btn-outline-secondary btn-lg btn-block">Question</button>
                                </div>
                            </div>
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
                            <h4 class="card-title">Alert Input</h4>
                            <p class='text-muted'>The type of the modal. SweetAlert comes with 5 built-in types which will
                                show a corresponding icon animation: "warning", "error", "success" and "info". You can also
                                set it as "input" to get a prompt modal. It can either be put in the object under the key
                                "icon" or passed as the third parameter of the function.</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <button id="text" class="btn btn-outline-success btn-lg btn-block">Text</button>
                                </div>
                                <div class="col-md-4 col-12">
                                    <button id="email" class="btn btn-outline-danger btn-lg btn-block">Email</button>
                                </div>
                                <div class="col-md-4 col-12">
                                    <button id="url" class="btn btn-outline-warning btn-lg btn-block">URL</button>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4 col-12">
                                    <button id="password" class="btn btn-outline-info btn-lg btn-block">Password</button>
                                </div>
                                <div class="col-md-4 col-12">
                                    <button id="textarea"
                                        class="btn btn-outline-secondary btn-lg btn-block">Textarea</button>
                                </div>
                                <div class="col-md-4 col-12">
                                    <button id="select" class="btn btn-outline-secondary btn-lg btn-block">Select</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    {{-- <link rel="stylesheet" href="assets/extensions/sweetalert2/sweetalert2.min.css"> --}}
    {{-- <link rel="stylesheet" href="/resources/sass/pages/sweetalert2.scss">
    <script src="assets/extensions/sweetalert2/sweetalert2.min.js"></script>
    <script src="/public/js/pages/sweetalert2.js"></script> --}}

    <script src="../vendors/sweetalert2/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../vendors/sweetalert2/sweetalert2.min.css">
    <script src="../js/pages/sweetalert2.js"></script>
</x-app-layout>


