<?php

namespace App\Http\Controllers;

use App\Models\Prisoner;
use Illuminate\Http\Request;

class AdminPrisonerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $param;
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }
    public function index()
    {
        try {
            $this->param['getPrisoner'] = Prisoner::all();

            return view('admin.pages.prisoner.list-prisoner', $this->param);
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

            return view('admin.pages.prisoner.add-prisoner');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,
        [
            'name' => 'required',
            'nik' => 'required|numeric',
            'birth_date' => 'required',
            'country' => 'required',
            'room' =>  'required',
            // 'photo' =>  'required',
        ],
        [
            'required' => ':attribute  harus diisi.',
        ],
        [
            'name' => 'Nama',
            'nik' => 'NIK',
            'birth_date' => 'Tanggal Lahir',
            'country' => 'Asal',
            'room' => 'Ruangan',
            // 'photo' => 'Foto'
        ]);
        try {
            $date = date('H-i-s');
            $random = \Str::random(5);

            $prisoner = new Prisoner();
            $prisoner->name = $request->name;
            $prisoner->nik = $request->nik;
            $prisoner->birth_date = $request->birth_date;
            $prisoner->country = $request->country;
            $prisoner->room = $request->room;
            if ($request->file('photo')) {
                $request->file('photo')->move('assets/upload/prisoner', $date.$random.$request->file('photo')->getClientOriginalName());
                $prisoner->photo = $date.$random.$request->file('photo')->getClientOriginalName();
            } else {
                $prisoner->photo = "default.png";
            }
            $prisoner->save();

            return redirect('/back-admin/prisoner')->withStatus('Berhasil menambah data.');

        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prisoner  $prisoner
     * @return \Illuminate\Http\Response
     */
    public function show(Prisoner $prisoner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prisoner  $prisoner
     * @return \Illuminate\Http\Response
     */
    public function edit(Prisoner $prisoner)
    {
        try {
            $this->param['getPrisonerDetails'] = Prisoner::find($prisoner->id);

            return view('admin.pages.prisoner.edit-prisoner', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prisoner  $prisoner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prisoner $prisoner)
    {
        $this->validate($request,
        [
            'name' => 'required',
            'nik' => 'required',
            'birth_date' => 'required',
            'country' => 'required',
            'room' =>  'required',
            // 'photo' =>  'required',
        ],
        [
            'required' => ':attribute  harus diisi.',
        ],
        [
            'name' => 'Nama',
            'nik' => 'NIK',
            'birth_date' => 'Tanggal Lahir',
            'country' => 'Asal',
            'room' => 'Ruangan',
            // 'photo' => 'Foto'
        ]);
        try {
            $date = date('H-i-s');
            $random = \Str::random(5);

            $prisoner = Prisoner::find($prisoner->id);
            $prisoner->name = $request->name;
            $prisoner->nik = $request->nik;
            $prisoner->birth_date = $request->birth_date;
            $prisoner->country = $request->country;
            $prisoner->room = $request->room;
            if ($request->file('photo')) {
                $request->file('photo')->move('assets/upload/prisoner', $date.$random.$request->file('photo')->getClientOriginalName());
                $prisoner->photo = $date.$random.$request->file('photo')->getClientOriginalName();
            } else {
                $prisoner->photo = "default.png";
            }
            $prisoner->save();

            return redirect('/back-admin/prisoner')->withStatus('Berhasil mengubah data.');

        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prisoner  $prisoner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prisoner $prisoner)
    {
        try {
            Prisoner::find($prisoner->id)->delete();
            return redirect('/back-admin/prisoner')->withStatus('Berhasil menghapus data.');
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
