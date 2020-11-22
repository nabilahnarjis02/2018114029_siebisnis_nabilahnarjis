<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\M_supplier;
 
class SupplierController extends Controller
{
    public function index(){
        $title = 'List Supplier';
        $data = M_supplier::orderBy('nama_supplier','asc')->get();
 
        return view('supplier.index',compact('title','data'));
    }
 
    public function add(){
        $title = 'Tambah Produk';
        $supplier = M_supplier::get();
        $kode = rand();
 
        return view('produk.add',compact('title','supplier','kode'));
    }
 
    public function store(Request $request){
        $this->validate($request,[
            'no'=>'required',
            'nama_supplier '=>'required',
            'kode_supplier'=>'required',
            'minimal_stock'=>'required',
            'harga_jual'=>'required'
        ]);
 
        $data = $request->except(['_token']);
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['stock'] = 0;
        // dd($data);
        M_supplier::insert($data);
 
        \Session::flash('sukses','Data berhasil ditambah');
        return redirect('supplier/add');
    }
 
    public function edit($id){
        $title = 'Edit Supplier';
        $supplier = M_supplier::get();
        // $kode = rand();
        $dt = M_supplier::find($id);
 
        return view('supllier.edit',compact('title','supplier','dt'));
    }
 
    public function update(Request $request,$id){
        $this->validate($request,[
            'no'=>'required',
            'nama_supplier '=>'required',
            'kode_supplier'=>'required',
            'minimal_stock'=>'required',
            'harga_jual'=>'required'
        ]);
 
        $data = $request->except(['_token','_method']);
        // $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        // dd($data);
        M_supplier::where('id',$id)->update($data);
 
        \Session::flash('sukses','Data berhasil diupdate');
        return redirect('supplier');
    }
 
    public function delete($id){
        try {
            M_supplier::where('id',$id)->delete();
 
            \Session::flash('sukses','Data berhasil dihapus');
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }
 
        return redirect()->back();
    }
}