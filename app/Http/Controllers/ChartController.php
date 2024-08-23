<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function get_alumni_info()
    {
        // $data = DB::table("alumnis")->select(['id','prodi','jenjang','agama', 'tahun_masuk','tahun_lulus'])->get();
        $prodi_options = [
            "Teknik Informatika",
            "Teknik Multimedia dan Jaringan",
            "Teknik Multimedia Digital",
            "Teknik Komputer dan Jaringan"
        ];
        $prodi =  Alumni::get_alumni_chart("prodi", $prodi_options);

        $jenjang_options = ["D1", "D4"];
        $jenjang = Alumni::get_alumni_chart("jenjang", $jenjang_options);

        $jenis_kelamin_options = ["Laki-laki", "Perempuan"];
        $jenis_kelamin = Alumni::get_alumni_chart("jenis_kelamin", $jenis_kelamin_options);

        $agama_options = [
            "Islam",
            "Kristen Protestan",
            "Kristen Katolik",
            "Hindu",
            "Buddha",
            "Konghuchu"
        ];
        $agama = Alumni::get_alumni_chart("agama", $agama_options);

        $tahun_masuk_options = [
            "2014",
            "2015",
            "2016",
            "2017",
            "2018",
            "2019"
        ];
        $tahun_masuk = Alumni::get_alumni_chart("tahun_masuk", $tahun_masuk_options);

        $tahun_lulus_options = [
            "2018",
            "2019",
            "2020",
            "2021",
            "2022",
            "2023"
        ];
        $tahun_lulus = Alumni::get_alumni_chart("tahun_lulus", $tahun_lulus_options);

        return [
            'prodi' => $prodi,
            'jenjang' => $jenjang,
            'jenis_kelamin' => $jenis_kelamin,
            'agama' => $agama,
            'tahun_masuk' => $tahun_masuk,
            'tahun_lulus' => $tahun_lulus,
        ];
    }
}
