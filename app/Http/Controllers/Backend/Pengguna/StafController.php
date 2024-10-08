<?php

namespace App\Http\Controllers\Backend\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UsersDetail;
use Illuminate\Http\Request;
use App\Http\Requests\StafRequest;
use ErrorException;
use Session;
use Illuminate\Support\Facades\DB;

class StafController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staf = User::with('userDetail')->where('role','Staf')->get();
        return view('backend.pengguna.staf.index', compact('staf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pengguna.staf.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StafRequest $request)
    {
        try {
            DB::beginTransaction();

            $image = $request->file('foto_profile');
            $nama_img = time()."_".$image->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'public/images/profile';
            $image->storeAs($tujuan_upload,$nama_img);

            // Pilih kalimat
            $kalimatKe  = "1";
            $username   = implode(" ", array_slice(explode(" ", $request->name), 0, $kalimatKe)); // ambil kalimat

            $user = new User();
            $user->name             = $request->name;
            $user->email            = $request->email;
            $user->username         = strtolower($username).date("s");
            $user->role             = 'Staf';
            $user->status           = 'Aktif';
            $user->foto_profile     = $nama_img;
            $user->password         = bcrypt('12345678');
            $user->user_created = auth()->user()->id;
            $user->save();

            if ($user) {
                $userDetail = new UsersDetail();
                $userDetail->user_id      = $user->id;
                $userDetail->role         = $user->role;
                $userDetail->nip          = $request->nip;
                $userDetail->email        = $request->email;
                $userDetail->linkidln     = $request->linkidln;
                $userDetail->instagram    = $request->instagram;
                $userDetail->website      = $request->website;
                $userDetail->facebook     = $request->facebook;
                $userDetail->twitter      = $request->twitter;
                $userDetail->youtube      = $request->youtube;
                $userDetail->user_created = auth()->user()->id;
                $userDetail->save();
            }

            $user->assignRole($user->role);
            DB::commit();
            Session::flash('success','Staf Berhasil ditambah !');
            return redirect()->route('backend-pengguna-staf.index');

        } catch (ErrorException $e) {
            DB::rollback();
            throw new ErrorException($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staf = User::with('userDetail')->where('role','Staf')->find($id);
        return view('backend.pengguna.staf.edit', compact('staf'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            if ($request->foto_profile) {
                $image = $request->file('foto_profile');
                $nama_img = time()."_".$image->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'public/images/profile';
                $image->storeAs($tujuan_upload,$nama_img);
            }

           
            $user = User::find($id);
            $user->name             = $request->name;
            $user->email            = $request->email;
            $user->status           = $request->status;
            $user->foto_profile     = $nama_img ?? $user->foto_profile;
            $user->user_updated = auth()->user()->id;
            $user->save();

            if ($user) {
                $userDetail = UsersDetail::where('user_id',$id)->first();
                $userDetail->user_id      = $user->id;
                $userDetail->nip          = $request->nip;
                $userDetail->is_active    = $user->status == 'Aktif' ? '0' : '1';
                $userDetail->email        = $request->email;
                $userDetail->linkidln     = $request->linkidln;
                $userDetail->instagram    = $request->instagram;
                $userDetail->website      = $request->website;
                $userDetail->facebook     = $request->facebook;
                $userDetail->twitter      = $request->twitter;
                $userDetail->youtube      = $request->youtube;
                $userDetail->user_updated = auth()->user()->id;
                $userDetail->save();
            }

            DB::commit();
            Session::flash('success','Staf Berhasil diubah !');
            return redirect()->route('backend-pengguna-staf.index');

        } catch (ErrorException $e) {
            DB::rollback();
            throw new ErrorException($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($staf){
        $staf = User::where('id', $staf)->first();
        $staf->update([
            'deleted_at' => now(),
            'user_deleted' => auth()->user()->id,
            'deleted' => true
        ]);
        UsersDetail::where('user_id', $staf->id)->update([
            'deleted_at' => now(),
            'user_deleted' => auth()->user()->id,
            'deleted' => true
        ]);
        session()->flash('success', 'Berhasil menghapus data');
        return redirect()->back();
    }
}
