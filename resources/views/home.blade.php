@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @if (auth()->user()->role == 'Admin')
        @include('assets.card')
    @endif

    @if (auth()->user()->role == 'KPS')
        @if (Auth::user()->KPS->prodi == 'TI')
            @include('assets.card_ti')
        @endif
        @if (Auth::user()->KPS->prodi == 'TMJ')
            @include('assets.card_tmj')
        @endif
        @if (Auth::user()->KPS->prodi == 'TMD')
            @include('assets.card_tmd')
        @endif
        @if (Auth::user()->KPS->prodi == 'TKJ')
            @include('assets.card_tkj')
        @endif
    @endif

    <div class="row">

        <div class="col-lg-12 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                            src="{{ asset('img/svg/undraw_graduation_re_gthn.svg') }}" alt="">
                    </div>
                    <h4 class="fw-bold text-center mt-5">
                        Selamat Datang <span class="font-weight-bold">{{ ucfirst(auth()->user()->name) }}</span> di Aplikasi
                        Tracer Study Jurusan Teknik Informatika dan Komputer Politeknik Negeri Jakarta
                    </h4>

                    <div class="text-center">
                        @if (auth()->user()->alumni)
                            @if ($count_answer > 0)
                                <p class="mt-3 text-primary" style="font-size: 30px">
                                    Terimakasih telah mengisi Tracer Study, jawaban anda sangat membantu kami dalam
                                    pengembangan
                                    JTIK PNJ.
                                </p>
                            @else
                                @if ($count_answer == 0)
                                    <a href="{{ route('tracer-study.kuesioner') }}" class="btn btn-primary"
                                        role="button">ISI KUESIONER</a>
                                @endif
                            @endif
                        @else
                            @if (auth()->user()->role == 'Alumni')
                                <a href="{{ route('profile') }}" class="btn btn-primary" role="button">LENGKAPI DATA</a>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
