<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Biaya;
use App\Models\Setting;
use ErrorException;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\SPP\Entities\BankAccount;

class SettingController extends Controller
{
    // setting
    public function index()
    {
      $bank = Bank::all();
      $biaya = Biaya::first();
      $biayaCount = Biaya::count();
      return view('backend.settings.index', compact('bank', 'biaya', 'biayaCount'));
    }

    // Tambah Bank
    public function addBank(Request $request)
    {
      try {
        BankAccount::create([
          'user_id'         => Auth::id(),
          'account_number'  => $request->account_number,
          'account_name'    => $request->account_name,
          'bank_name'       => $request->bank_name,
          'is_active'       => $request->is_active,
          'user_created'    => auth()->user()->id,
          'is_primary'      => 1
        ]);
        Session::flash('success','Akun Bank Berhasil Ditambah.');
        return back();
      } catch (\ErrorException $e) {
        throw new ErrorException($e->getMessage());
      }
    }
    public function addBiaya(Request $request){
      try {
        Biaya::create([
          'biaya' => $request->biaya
        ]);
        Session::flash('success','Biaya PPDB Berhasil Ditambah.');
        return back();
      } catch (\ErrorException $e) {
        throw new ErrorException($e->getMessage());
      }
    }

    public function editBiaya(Request $request, Biaya $id){
      try {
        $id->update([
          'biaya' => $request->biaya
        ]);
        Session::flash('success','Biaya PPDB Berhasil Diubah.');
        return back();
      } catch (\ErrorException $e) {
        throw new ErrorException($e->getMessage());
      }
    }

    // Setting Notification
    public function notifications(Request $request)
    {
        try {
            $setting = Setting::where('user_id', Auth::id())->first();
            $setting->isEmail  = $request->isEmail ?? 0;
            $setting->update();
            Session::flash('success','Setting Berhasil Diupdate.');
            return back();
        } catch (Exception $e) {
            throw new ErrorException($e->getMessage());
        }
    }

    public function bankDelete($id){
        $proses = BankAccount::where('id', intval($id))->delete();
        if($proses){
          return redirect('/settings');
        }

    }

}
