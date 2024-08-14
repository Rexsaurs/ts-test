@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('KPS') }}</h1>

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger border-left-danger" role="alert">
            <ul class="pl-4 my-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">

        <div class="col-12 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Add KPS</h6>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('access-policy.f_create') }}" autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="name">Name<span
                                                class="small text-danger">*</span></label>
                                        <input type="text" id="name" class="form-control" name="name"
                                            placeholder="Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="email">Email address<span
                                                class="small text-danger">*</span></label>
                                        <input type="email" id="email" class="form-control" name="email"
                                            placeholder="example@example.com">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="username">NIP<span
                                                class="small text-danger">*</span></label>
                                        <input type="number" id="username" class="form-control" name="username"
                                            placeholder="Nomor Induk">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="username">Program Studi<span
                                                class="small text-danger">*</span></label>
                                        <select name="prodi" id="prodi" class="form-control">
                                            <option value="" hidden>Select One</option>
                                            <option value="TI">Teknik Informatika</option>
                                            <option value="TMJ">Teknik Multimedia Jaringan</option>
                                            <option value="TMD">Teknik Multimedia Digital</option>
                                            <option value="TKJ">Teknik Komputer Jaringan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="phone_number">Nomor Telpon<span
                                                class="small text-danger">*</span></label>
                                        <input type="number" id="phone_number" class="form-control" name="phone_number"
                                            placeholder="Nomor Telpon Aktif">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="password">password</label>
                                        <div class="input-group mb-3">
                                            <input type="password" id="password" class="form-control" name="password"
                                                placeholder="password">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="show-pass">
                                                    <div class="fa fa-eye-slash"></div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="confirm_password">Confirm password</label>
                                        <div class="input-group mb-3">
                                            <input type="password" id="confirm_password" class="form-control"
                                                name="password_confirmation" placeholder="Confirm password">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="show-pass-confirm">
                                                    <div class="fa fa-eye-slash"></div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>

                        <!-- Button -->
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </div>

    <script type="text/javascript">
        window.addEventListener("DOMContentLoaded", function() {
            const togglePassword = document.querySelector("#show-pass");
            const password = document.querySelector("#password");

            togglePassword.addEventListener("click", function(e) {
                // toggle the type attribute
                const type =
                    password.getAttribute("type") === "password" ? "text" : "password";
                password.setAttribute("type", type);
                // toggle the eye / eye slash icon
                this.childNodes[1].classList.toggle("fa-eye");
            });

            const toggleConfirm = document.querySelector("#show-pass-confirm");
            const confirmPass = document.querySelector("#confirm_password");

            toggleConfirm.addEventListener("click", function(e) {
                // toggle the type attribute
                const type =
                    confirmPass.getAttribute("type") === "password" ? "text" : "password";
                confirmPass.setAttribute("type", type);
                // toggle the eye / eye slash icon
                this.childNodes[1].classList.toggle("fa-eye");
            });
        });
    </script>
@endsection
