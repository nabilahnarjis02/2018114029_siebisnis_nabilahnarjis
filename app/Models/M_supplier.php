<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class M_supplier extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'no','nama_supplier ','kode_supplier','minimal_stock','harga_jual'
    ];
}