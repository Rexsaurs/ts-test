@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Hasil Kuesioner Tracer Study</h1>
        <a href="{{ route('alumni.excel') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Excel
        </a>
        <br>
        <hr>

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

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Status Alumni JTIK Saat Ini</h6>
            </div>
            <div class="card-body">
                <div id="status" style="width: 100%;height:400px;"></div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chart Alumni Berdasarkan Program Studi</h6>
            </div>
            <div class="card-body">
                <div id="methodology" style="width: 100%;height:400px;"></div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chart Alumni Berdasarkan Program Studi</h6>
            </div>
            <div class="card-body">
                <div id="every-methodology" style="width: 100%;height:400px;"></div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chart Alumni Berdasarkan Program Studi</h6>
            </div>
            <div class="card-body">
                <div id="job-position-0" style="width: 100%;height:400px;"></div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chart Alumni Berdasarkan Program Studi</h6>
            </div>
            <div class="card-body">
                <div id="job-position-1" style="width: 100%;height:400px;"></div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chart Alumni Berdasarkan Program Studi</h6>
            </div>
            <div class="card-body">
                <div id="job-position-2" style="width: 100%;height:400px;"></div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chart Alumni Berdasarkan Program Studi</h6>
            </div>
            <div class="card-body">
                <div id="company-type" style="width: 100%;height:400px;"></div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chart Alumni Berdasarkan Program Studi</h6>
            </div>
            <div class="card-body">
                <div id="education" style="width: 100%;height:400px;"></div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chart Alumni Berdasarkan Program Studi</h6>
            </div>
            <div class="card-body">
                <div id="compatibility" style="width: 100%;height:400px;"></div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chart Alumni Berdasarkan Program Studi</h6>
            </div>
            <div class="card-body">
                <div id="work-hunt" style="width: 100%;height:400px;"></div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chart Alumni Berdasarkan Program Studi</h6>
            </div>
            <div class="card-body">
                <div id="competency-work" style="width: 100%;height:400px;"></div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chart Alumni Berdasarkan Program Studi</h6>
            </div>
            <div class="card-body">
                <div id="competency-graduation" style="width: 100%;height:400px;"></div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/echarts@5.5.1/dist/echarts.min.js"
        integrity="sha256-6EJwvQzVvfYP78JtAMKjkcsugfTSanqe4WGFpUdzo88=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript">
        var workStatus = @json($workStatus);
        var {
            ALUMNI,
            ...averageMethod
        } = @json($averageMethod);
        var lectureScore = @json($lectureScore);
        var demoScore = @json($demoScore);
        var projectScore = @json($projectScore);
        var internScore = @json($internScore);
        var praticalScore = @json($praticalScore);
        var fieldScore = @json($fieldScore);
        var discussionScore = @json($discussionScore);
        var positionData = @json($jobPosition);
        var companyTypeData = @json($company_type);
        var companyLevelData = @json($company_level);
        var educationLocation = @json($education_location);
        var educationPayment = @json($education_payment);
        var educationReason = @json($education_reason);
        var workCompatibility = @json($work_compatibility);
        var workHunt = @json($work_hunt);
        var {
            work,
            graduation
        } = @json($competency_data);

        // Initialize the echarts instance based on the prepared dom
        var prodiChart = echarts.init(document.getElementById('status'));
        var methodChart = echarts.init(document.getElementById('methodology'));
        var everyMethodChart = echarts.init(document.getElementById('every-methodology'));
        var positionChart = []

        positionChart = [
            echarts.init(document.getElementById('job-position-0')),
            echarts.init(document.getElementById('job-position-1')),
            echarts.init(document.getElementById('job-position-2'))
        ];
        var companyTypeChart = echarts.init(document.getElementById('company-type'));
        var educationChart = echarts.init(document.getElementById('education'));
        var compatibilityChart = echarts.init(document.getElementById('compatibility'));
        var workHuntChart = echarts.init(document.getElementById('work-hunt'));
        var competencyWorkChart = echarts.init(document.getElementById('competency-work'));
        var competencyGraduationChart = echarts.init(document.getElementById('competency-graduation'));

        // Specify the configuration items and data for the chart
        var prodiOption = {
            title: {
                text: 'Status Alumni Saat Ini'
            },
            dataset: {
                dimensions: ['STATUS', 'JUMLAH'],
                source: workStatus
            },
            tooltip: {
                show: true
            },
            series: [{
                name: 'Status Alumni Saat Ini',
                type: 'pie',
            }]
        };

        var methodOption = {
            title: {
                text: 'Rata - Rata Penilaian Methodologi Pengajaran',
                subtext: 'Jumlah Responden: ' + ALUMNI
            },
            tooltip: {
                show: true
            },
            legend: {
                show: true,
                right: 20
            },
            xAxis: {
                type: 'category',
                data: Object.keys(averageMethod)
            },
            yAxis: {
                type: 'value'
            },
            series: [{
                type: 'bar',
                data: Object.values(averageMethod)
            }]
        };

        var everyMethodOption = {
            title: {
                text: 'Penilaian Methodologi Pengajaran',
                subtext: 'Jumlah Responden: ' + ALUMNI
            },
            tooltip: {
                show: true
            },
            legend: {
                show: true,
                right: 20
            },
            dataset: [{
                    dimensions: ['SCORE', 'JUMLAH'],
                    source: lectureScore
                },
                {
                    dimensions: ['SCORE', 'JUMLAH'],
                    source: demoScore
                },
                {
                    dimensions: ['SCORE', 'JUMLAH'],
                    source: projectScore
                },
                {
                    dimensions: ['SCORE', 'JUMLAH'],
                    source: internScore
                },
                {
                    dimensions: ['SCORE', 'JUMLAH'],
                    source: praticalScore
                },
                {
                    dimensions: ['SCORE', 'JUMLAH'],
                    source: fieldScore
                },
                {
                    dimensions: ['SCORE', 'JUMLAH'],
                    source: discussionScore
                },
            ],
            xAxis: {
                type: 'category'
            },
            yAxis: {
                type: 'value'
            },
            series: [{
                    name: 'Perkuliahan',
                    type: 'bar',
                    datasetIndex: 0
                },
                {
                    name: 'Demonstrasi',
                    type: 'bar',
                    datasetIndex: 1
                },
                {
                    name: 'Proyek Riset',
                    type: 'bar',
                    datasetIndex: 2
                },
                {
                    name: 'Magang',
                    type: 'bar',
                    datasetIndex: 3
                },
                {
                    name: 'Praktikum',
                    type: 'bar',
                    datasetIndex: 4
                },
                {
                    name: 'Kerja lapangan',
                    type: 'bar',
                    datasetIndex: 5
                },
                {
                    name: 'Diskusi',
                    type: 'bar',
                    datasetIndex: 6
                },
            ]
        };

        var positionOption = []

        positionOption[0] = {
            title: {
                text: 'Jabatan Alumni',
                subtext: 'Jumlah Responden: ' + ALUMNI
            },
            dataset: {
                dimensions: ['POSITION', 'JUMLAH'],
                source: positionData
            },
            legend: {
                show: true,
                right: 20
            },
            tooltip: {
                show: true
            },
            series: [{
                name: 'Jabatan Alumni',
                type: 'pie',
            }]
        };

        positionOption[1] = {
            title: {
                text: 'Rata-rata Upah Alumni per Jabatan',
                subtext: 'Jumlah Responden: ' + ALUMNI
            },
            tooltip: {
                show: true
            },
            legend: {
                show: true,
                right: 20
            },
            dataset: [{
                dimensions: [
                    'POSITION',
                    "AVG_SALARY",
                ],
                source: positionData
            }, ],
            xAxis: {
                type: 'value'
            },
            yAxis: {
                type: 'category'
            },
            series: [{
                name: 'Upah (Rupiah)',
                type: 'bar',
            }, ]
        };

        positionOption[2] = {
            title: {
                text: 'Rata-rata Alumni Mencari Pekerjaan',
                subtext: 'Jumlah Responden: ' + ALUMNI
            },
            tooltip: {
                show: true
            },
            legend: {
                show: true,
                right: 20
            },
            dataset: [{
                dimensions: [
                    'POSITION',
                    "AVG_JOB_ACQUIRED",
                    "AVG_APPLICATION",
                    "AVG_COMPANY_INTERVIEWED",
                    "AVG_COMPANY_RESPONDED",
                ],
                source: positionData
            }, ],
            xAxis: {
                type: 'category'
            },
            yAxis: {
                type: 'value'
            },
            series: [{
                    name: 'Lama Diterima (bulan)',
                    type: 'bar',
                },
                {
                    name: 'Jumlah Melamar',
                    type: 'bar',
                },
                {
                    name: 'Jumlah Wawancara',
                    type: 'bar',
                },
                {
                    name: 'Jumlah Follow Up',
                    type: 'bar',
                },
            ]
        };

        var companyTypeOption = {
            title: {
                text: 'Jumlah Alumni yang Bekerja',
                left: 'center'
            },
            dataset: [{
                dimensions: ['COMPANY_TYPE', 'JUMLAH'],
                source: companyTypeData
            }, {
                dimensions: ['COMPANY_LEVEL', 'JUMLAH'],
                source: companyLevelData
            }, ],
            tooltip: {
                show: true
            },
            series: [{
                    name: 'Jumlah Alumni Bekerja Berdasarkan Tipe Perusahaan',
                    type: 'pie',
                    center: ['25%', '50%'],
                    label: {
                        formatter: function(params) {
                            if (params.name == 5 || params.name == "5") return 'Lainnya'
                            return params.name
                        }
                    },
                    datasetIndex: 0
                },
                {
                    name: 'Jumlah Alumni Bekerja Berdasarkan Tingkat Perusahaan',
                    type: 'pie',
                    center: ['75%', '50%'],
                    datasetIndex: 1
                }
            ]
        };

        var educationOption = {
            title: {
                text: 'Jumlah Alumni yang Melanjutkan Studi',
                left: 'center'
            },
            dataset: [{
                dimensions: ['LOCATION', 'JUMLAH'],
                source: educationLocation
            }, {
                dimensions: ['PAYMENT_TYPE', 'JUMLAH'],
                source: educationPayment
            }, {
                dimensions: ['REASONS', 'JUMLAH'],
                source: educationReason
            }, ],
            tooltip: {
                show: true
            },
            series: [{
                    name: 'Lokasi Studi Alumni',
                    type: 'pie',
                    center: ['20%', '50%'],
                    datasetIndex: 0
                },
                {
                    name: 'Pembiayaan Studi Alumni',
                    type: 'pie',
                    center: ['50%', '50%'],
                    datasetIndex: 1
                },
                {
                    name: 'Pembiayaan Studi Alumni',
                    type: 'pie',
                    center: ['80%', '50%'],
                    datasetIndex: 2
                }
            ]
        };

        var compatibilityOption = {
            title: {
                text: 'Jumlah Alumni dengan Pekerjaan yang Tidak Sesuai',
            },
            tooltip: {
                show: true
            },
            dataset: {
                dimensions: [
                    'COMPATIBILITY_TYPE',
                    "JUMLAH",
                ],
                source: workCompatibility
            },
            series: [{
                name: 'Kecocokan Pekerjaan',
                type: 'pie',
            }, ]
        };

        var workHuntOption = {
            title: {
                text: 'Jumlah Methode Pencarian Pekerjaan',
            },
            tooltip: {
                show: true
            },
            dataset: {
                dimensions: [
                    'JOB_HUNT_METHOD',
                    "JUMLAH",
                ],
                source: workHunt
            },
            series: [{
                name: 'Metode Pencarian',
                type: 'pie',
            }, ]
        };

        var competencyWorkOption = {
            title: {
                text: 'Penilaian Kompetensi Pada Pekerjaan',
                subtext: 'Jumlah Responden: ' + ALUMNI
            },
            tooltip: {
                show: true
            },
            legend: {
                show: true,
                right: 20
            },
            dataset: [{
                    dimensions: ['SCORE', 'JUMLAH'],
                    source: work.ETHICS,
                },
                {
                    dimensions: ['SCORE', 'JUMLAH'],
                    source: work.EXPERTISE,
                },
                {
                    dimensions: ['SCORE', 'JUMLAH'],
                    source: work.ENGLISH,
                },
                {
                    dimensions: ['SCORE', 'JUMLAH'],
                    source: work.TECH,
                },
                {
                    dimensions: ['SCORE', 'JUMLAH'],
                    source: work.COMMUNICATION,
                },
                {
                    dimensions: ['SCORE', 'JUMLAH'],
                    source: work.TEAMWORK,
                },
                {
                    dimensions: ['SCORE', 'JUMLAH'],
                    source: work.DEVELOPMENT,
                },
            ],
            xAxis: {
                type: 'category'
            },
            yAxis: {
                type: 'value'
            },
            series: [{
                    name: 'Etika',
                    type: 'bar',
                    datasetIndex: 0,
                },
                {
                    name: 'Keahlian',
                    type: 'bar',
                    datasetIndex: 1,
                },
                {
                    name: 'Bahasa Inggris',
                    type: 'bar',
                    datasetIndex: 2,
                },
                {
                    name: 'Teknologi Informasi',
                    type: 'bar',
                    datasetIndex: 3,
                },
                {
                    name: 'Komunikasi',
                    type: 'bar',
                    datasetIndex: 4,
                },
                {
                    name: 'Teamwork',
                    type: 'bar',
                    datasetIndex: 5,
                },
                {
                    name: 'Pengembangan diri',
                    type: 'bar',
                    datasetIndex: 6,
                },
            ]
        };

        var competencyGraduationOption = {
            title: {
                text: 'Penilaian Kompetensi Pada Saat Lulus',
                subtext: 'Jumlah Responden: ' + ALUMNI
            },
            tooltip: {
                show: true
            },
            legend: {
                show: true,
                right: 20
            },
            dataset: [{
                    dimensions: ['SCORE', 'JUMLAH'],
                    source: graduation.ETHICS,
                },
                {
                    dimensions: ['SCORE', 'JUMLAH'],
                    source: graduation.EXPERTISE,
                },
                {
                    dimensions: ['SCORE', 'JUMLAH'],
                    source: graduation.ENGLISH,
                },
                {
                    dimensions: ['SCORE', 'JUMLAH'],
                    source: graduation.TECH,
                },
                {
                    dimensions: ['SCORE', 'JUMLAH'],
                    source: graduation.COMMUNICATION,
                },
                {
                    dimensions: ['SCORE', 'JUMLAH'],
                    source: graduation.TEAMWORK,
                },
                {
                    dimensions: ['SCORE', 'JUMLAH'],
                    source: graduation.DEVELOPMENT,
                },
            ],
            xAxis: {
                type: 'category'
            },
            yAxis: {
                type: 'value'
            },
            series: [{
                    name: 'Etika',
                    type: 'bar',
                    datasetIndex: 0,
                },
                {
                    name: 'Keahlian',
                    type: 'bar',
                    datasetIndex: 1,
                },
                {
                    name: 'Bahasa Inggris',
                    type: 'bar',
                    datasetIndex: 2,
                },
                {
                    name: 'Teknologi Informasi',
                    type: 'bar',
                    datasetIndex: 3,
                },
                {
                    name: 'Komunikasi',
                    type: 'bar',
                    datasetIndex: 4,
                },
                {
                    name: 'Kerja sama tim',
                    type: 'bar',
                    datasetIndex: 5,
                },
                {
                    name: 'Pengembangan diri',
                    type: 'bar',
                    datasetIndex: 6,
                },
            ]
        };

        // Display the chart using the configuration items and data just specified.
        prodiChart.setOption(prodiOption);
        methodChart.setOption(methodOption);
        everyMethodChart.setOption(everyMethodOption);
        positionChart.forEach((element, index) => {
            element.setOption(positionOption[index]);
        });
        companyTypeChart.setOption(companyTypeOption);
        educationChart.setOption(educationOption);
        compatibilityChart.setOption(compatibilityOption);
        workHuntChart.setOption(workHuntOption);
        competencyWorkChart.setOption(competencyWorkOption);
        competencyGraduationChart.setOption(competencyGraduationOption);
    </script>
@endsection
