<?php

namespace App\Http\Controllers;

use App\Models\Send;
use App\Models\UserDetails;
use Illuminate\Http\Request;

class AdminSendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function riwayat()
    {
        try {
            $this->param['getSend'] = Send::where('status', '!=','dalam antrian')->get();

            return view('admin.pages.send.riwayat-pengiriman-barang', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
    
    public function data()
    {
        try {
            $this->param['getSend'] = Send::where('status', 'dalam antrian')->get();

            return view('admin.pages.send.data-pengiriman-barang', $this->param);
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        try {
            $this->param['getDetailSend'] = Send::find($send->id);
            // $this->param['getNIKSender'] = User::where('id' , $send->id_user)->get();
            $this->param['getNIKSender'] = UserDetails::where('user_id' , $send->id_user)->get();
            // $this->param['getNIKSender'] = UserDetails::find($send->id);
            return view('admin.pages.send.approve-pengiriman-barang', $this->param);
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Send  $send
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Send $send)
    {
        try {
            $send = Send::find($send->id);
            $send->status = $request->status;
            $send->save();
            return redirect('/back-admin/pengiriman/data')->withStatus('Berhasil memperbarui data.');
        } catch(\Throwable $e){
            return redirect('/back-admin/pengiriman/data')->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect('/back-admin/pengiriman/data')->withError($e->getMessage());
        }
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
