<?php

namespace App\Http\Controllers;

use App\Models\Send;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class UserDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:user']);
    }

    private $param;
    public function index()
    {
        try {
            $this->param['getCountPengirimanBarang'] = Send::where('id_user', \Auth::user()->id)->count();
            $this->param['getCountPengirimanBarangAcc'] = Send::where('status', 'disetujui')->where('id_user', \Auth::user()->id)->count();
            $this->param['getCountPengirimanBarangPending'] = Send::where('status', 'dalam antrian')->where('id_user', \Auth::user()->id)->count();
            $this->param['getCountPengirimanBarangDecline'] = Send::where('status', 'ditolak')->where('id_user', \Auth::user()->id)->count();

            return view('user.pages.dashboard.dashboard', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
}
