<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Send;
use App\Models\Prisoner;
use Carbon\Carbon;
class SendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $param;
    public function __construct()
    {
        $this->middleware(['role:user']);
    }
    public function index()
    {
        try {
            $this->param['getSend'] = Send::where('id_user', \Auth::user()->id)->get();

            return view('user.pages.send.riwayat-pengiriman-barang', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $this->param['getPrisoner'] = Prisoner::all();
            return view('user.pages.send.pengiriman-barang', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *

     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'id_prisoner' => 'required',
            'date' => 'required',
            'desc' => 'required',
        ],
        [
            'required' => ':attribute  harus diisi.',
        ],
        [
            'id_prisoner' => 'Tujuan Tahanan',
            'date' => 'Tanggal Pengiriman',
            'desc' => 'Deskripsi Barang',
        ]);

        try {
            $send = new Send();
            $send->id_user = \Auth::user()->id;
            // $send->id_user = 2;
            $send->id_prisoner = $request->id_prisoner;

            // Carbon::parse($request->date_start)->format('y/m/d');
            $cekTanggal = Send::where('date', Carbon::parse($request->date_start)->format('y/m/d'))->count();
            $ses1 = Send::where('session', 1)->where('date', Carbon::parse($request->date_start)->format('y/m/d'))->count();

            if ($cekTanggal <= 60) {
                $send->date = Carbon::parse($request->date_start)->format('y/m/d');
                if ($ses1 < 30 ) {
                    $send->session = 1;
                } elseif ($ses1 >= 30) {
                    $send->session = 2;
                }
            }

            
            // $send->date = $request->date;
            // $send->session = 1;
            $send->desc = $request->desc;
            $send->type = $request->type;
            $send->status = 'dalam antrian';
            $send->save();

            return redirect('/back-user/riwayat-pengiriman-barang')->withStatus('Berhasil menambah data.');

        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Send  $send
     * @return \Illuminate\Http\Response
     */
    public function show(Send $send)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Send  $send
     * @return \Illuminate\Http\Response
     */
    public function edit(Send $send)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSendRequest  $request
     * @param  \App\Models\Send  $send
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSendRequest $request, Send $send)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Send  $send
     * @return \Illuminate\Http\Response
     */
    public function destroy(Send $send)
    {
        //
    }
}
