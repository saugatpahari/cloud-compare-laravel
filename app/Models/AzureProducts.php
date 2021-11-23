<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AzureProducts extends Model
{
    use HasFactory;
    protected $table='azure_products';
    protected $fillable=[
        'availableForML',
        'cores',
        'diskSize',
        'gpu',
        'isVcpu',
        'ram',
        'series',
        'price_perhour',
        'price_perhour_oneyear',
        'price_perhour_threeyear',
        'price_perhourspot',
        'offerType',
        'pricingType'
    ];
}
