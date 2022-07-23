<?php

namespace App\Http\Controllers;

use App\Models\Send;
use App\Models\User;
use App\Models\Prisoner;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    private $param;
    public function index()
    {
        try {
            $this->param['getCountUser'] = User::count();
            $this->param['getCountTahanan'] = Prisoner::count();
            $this->param['getCountPengirimanBarangHistory'] = Send::count();
            $this->param['getCountPengirimanBarangPending'] = Send::where('status', 'dalam antrian')->count();
            
            return view('admin.pages.dashboard.dashboard', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
}
