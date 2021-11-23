<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AwsProducts extends Model
{
    use HasFactory;
    protected $table='aws_products';
    protected $fillable=[
        'instanceType',
        'vcpu',
        'ecu',
        'memory',
        'storage',
        'price',
        'location',
        'gpu',
        'unit',
        'operatingSystem',
        'tenancy',
        'termType',
        'physicalProcessor',
        'networkPerformance',
        'licenseModel'
    ];
}
