<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'menu_id',
        'status_id',
        'note',
        'jumlah_baju',
    ];
    protected $table = 'order';
    public function menu(){
        return $this->belongsTo(Menu::class, 'menu_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function status(){
        return $this->belongsTo(Status::class, 'status_id');
    }
}
