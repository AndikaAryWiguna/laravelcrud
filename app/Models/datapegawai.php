<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datapegawai extends Model
{
    use HasFactory;
        // protected $table='datapegawais';
        //  protected $primaryKey = ' id ';

    protected $fillable=[
        'user_id',"NIP","Nama",'jabatan','gambar'
    ];
}
