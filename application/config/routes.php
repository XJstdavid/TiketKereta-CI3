<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['editJadwal'] = 'admin/update_jadwal';
$route['admin/dashboard/edit-jadwal/(:any)'] = 'admin/editJadwal/$1';
$route['hapusJadwal/(:any)'] = 'admin/hapusJadwal/$1';
$route['tambahJadwal'] = 'admin/tambah_jadwal';
$route['admin/dashboard/kelola-jadwal'] = 'admin/kelolajadwal';

$route['cariTiket'] = 'guest/cari_tiket';

$route['editStasiun'] = 'admin/update_stasiun';
$route['admin/dashboard/edit/(:any)'] = 'admin/edit_stasiun/$1';

$route['hapusStasiun/(:any)'] = 'admin/hapus_stasiun/$1';
$route['tambahStasiun'] = 'admin/tambah_stasiun';
$route['admin/dashboard'] = 'admin/halamanDashboard';

$route['prosesLogin'] = 'admin/login';
$route['logout'] = 'admin/logout';
$route['login'] = 'admin/halamanlogin';

$route['konfirmasi'] = 'guest/halamankonfirmasi';
// $route['default_controller'] = 'admin/halamanDashboard';
$route['default_controller'] = 'guest/halamanhome';
$route['admin'] = 'admin/halamanDashboard';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;