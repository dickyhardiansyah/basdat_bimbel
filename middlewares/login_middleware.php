<?php

function get_menu() {
    if (!isset($_SESSION['has_login'])) {
        header('location: login.php');
    }

    return [
        [
            "judul" => "Beranda",
            "link" => "/basdat_bimbel"
        ],
        [
            "judul" => "Siswa",
            "link" => "/basdat_bimbel/lihat_siswa.php"
        ],
        [
            "judul" => "Pengajar",
            "link" => "/basdat_bimbel/lihat_pengajar.php"
        ],
        [
            "judul" => "Kelas",
            "link" => "/basdat_bimbel/lihat_kelas.php"
        ],
        [
            "judul" => "Pelajaran",
            "link" => "/basdat_bimbel/lihat_pelajaran.php"
        ],
        [
            "judul" => "Logout",
            "link" => "/basdat_bimbel/controllers/logout_controller.php"
        ]
    ];
}