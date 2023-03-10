<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Route User / Guest
$route['print'] = 'guest/print';
$route['PilihGerbong'] = 'guest/PilihGerbong';
$route['konfirmasi'] = 'guest/halamankonfirmasi';
$route['kirimKonfirmasi'] = 'guest/kirimKonfirmasi';
$route['cekKonfirmasi'] = 'guest/cekKonfirmasi';
$route['pembayaran'] = 'guest/halamanPembayaran/$no_pembayaran';
$route['pesanTiket'] = 'guest/pesanTiket';
$route['pesan/(:any)'] = 'guest/pesan/$1';
$route['cariTiket'] = 'guest/cari_tiket';

// Route Admin
$route['admin/dash'] = 'admin/halamanDash';
$route['admin/data-tiket'] = 'admin/halamanTiket';
$route['admin/data-penumpang'] = 'admin/halamanPenumpang';
$route['admin/profile'] = 'admin/halamanProfile';
$route['verifikasi/(:num)'] = 'admin/verifikasiPembayaran/$1';
$route['hapusJadwal/(:any)'] = 'admin/hapusJadwal/$1';
$route['tambahJadwal'] = 'admin/tambah_jadwal';
$route['admin/kelola-jadwal'] = 'admin/kelolajadwal';
$route['admin/konfirmasi-pembayaran'] = 'admin/halamanKonfirmasi';
$route['editJadwal'] = 'admin/update_jadwal';
$route['admin/dashboard/edit-jadwal/(:any)'] = 'admin/editJadwal/$1';
$route['editStasiun'] = 'admin/update_stasiun';
$route['admin/dashboard/edit/(:any)'] = 'admin/edit_stasiun/$1';
$route['hapusStasiun/(:any)'] = 'admin/hapus_stasiun/$1';
$route['tambahStasiun'] = 'admin/tambah_stasiun';
$route['admin/stasiun'] = 'admin/halamanDashboard';
$route['admin'] = 'admin/halamanDash';

$route['default_controller'] = 'guest/halamanhome';
$route['404_override'] = 'Costum404';
$route['translate_uri_dashes'] = FALSE;
