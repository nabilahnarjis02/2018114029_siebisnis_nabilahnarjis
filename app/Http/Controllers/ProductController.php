<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
use App\Models\M_produk;
use App\Models\M_supplier;
 
class Produk_controller extends Controller
{
    public function index(){
        $title = 'List Product';
        $data = M_produk::orderBy('nama','asc')->get();
 
        return view('produk.index',compact('title','data'));
    }
 
    public function add(){
        $title = 'Tambah Produk';
        $supplier = M_supplier::get();
        $kode = rand();
 
        return view('produk.add',compact('title','supplier','kode'));
    }
 
    public function store(Request $request){
        $this->validate($request,[
            'supplier'=>'required',
            'nama'=>'required',
            'kode'=>'required',
            'minimal_stock'=>'required',
            'harga'=>'required'
        ]);
 
        $data = $request->except(['_token']);
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['stock'] = 0;
        // dd($data);
        M_produk::insert($data);
 
        \Session::flash('sukses','Data berhasil ditambah');
        return redirect('produk/add');
    }
 
    public function edit($id){
        $title = 'Edit Produk';
        $supplier = M_supplier::get();
        // $kode = rand();
        $dt = M_produk::find($id);
 
        return view('produk.edit',compact('title','supplier','dt'));
    }
 
    public function update(Request $request,$id){
        $this->validate($request,[
            'no'=>'required',
            'supplier'=>'required',
            'nama'=>'required',
            'kode'=>'required',
            'minimal_stock'=>'required',
            'harga'=>'required'
        ]);
 
        $data = $request->except(['_token','_method']);
        // $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        // dd($data);
        M_produk::where('id',$id)->update($data);
 
        \Session::flash('sukses','Data berhasil diupdate');
        return redirect('produk');
    }
 
    public function delete($id){
        try {
            M_produk::where('id',$id)->delete();
 
            \Session::flash('sukses','Data berhasil dihapus');
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }
 
        return redirect()->back();
    }
}