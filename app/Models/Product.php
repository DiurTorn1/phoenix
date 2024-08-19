<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'name', 'detail', 'datetime_start', 'datetime_stop', 'type' => 'required', 'country', 'valute', 'period_job', 'prob_period', 'prob_price',
        'datetime_start_sell', 'price', 'old_price', 'datetime_start_access', 'datetime_stop_access', 'datetime_stop_sell', 'img_main', 'img_banner', 'img_video_promo', 'video_promo',
    ];
}
