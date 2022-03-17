<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Alert;

class Kategori extends Model
{
    use HasFactory;
    protected $visible = ['id','kategori','nama_barang','alamat','no_wa'];

    protected $fillable = ['id','kategori','nama_barang','alamat','no_wa'];
    public $timestamps = true;

    //membuat relasi one to many

    public function barang()
    {
        // data model "Author" bisa memiliki banyak data
        //dari model "Book" melalui fk "author_id"
       return $this->hasMany('App\Models\Barang','id_kategori');
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(function ($kategori) {
            if ($kategori->barang->count() > 0) {
                Alert::error('Ups', 'Data tidak bisa dihapus');
                return false;
            }
        });
    }

   
}
