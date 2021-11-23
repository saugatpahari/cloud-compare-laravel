<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client as HttpClient;
use App\Models\AzureProducts;


class AzurePriceController extends Controller
{
    public function index(){
        // dd($value);
        $client= new HttpClient([
            'verify'=>false,
            'headers'=> [
                'Accept' => 'application/json',
            ],
        ]);
         
        $result = [];
             
        try{
            $response = $client->get('https://azure.microsoft.com/api/v3/pricing/virtual-machines/calculator/');
            $body = json_decode($response->getBody());
            $result['status']=$response->getStatuscode();
            $result['data']=$body;                
        }

        catch (\Exception $e) {
            $result['status'] = $e->getCode();
            $result['message'] = $e->getMessage();
        }
        // dd($result['data']->offers);
        if(isset($result['data'])){
            $collection = json_decode(json_encode($result['data']->offers), true);
            $data = array_keys($collection);
            $count = 0;
            
            foreach($result['data']->offers as $value){
                if(isset($value->cores) && isset($value->diskSize) && isset($value->gpu) && isset($value->ram) && isset($value->prices->perhour) && isset($value->prices->perhouroneyearreserved) && isset($value->prices->perhourthreeyearreserved) && isset($value->prices->perhourspot)){
                    $perhour = json_encode($value->prices->perhour);
                    $perhouroneyearreserved = json_encode($value->prices->perhouroneyearreserved);
                    $perhourthreeyearreserved = json_encode($value->prices->perhourthreeyearreserved);
                    $perhourspot = json_encode($value->prices->perhourspot);
                    
                    AzureProducts::updateOrCreate([
                        'series' => $data[$count],
                    ],[
                        'availableForML' => $value->availableForML,
                        'cores' => $value->cores, 
                        'diskSize' => $value->diskSize, 
                        'gpu' => $value->gpu, 
                        'isVcpu' => $value->isVcpu, 
                        'ram' => $value->ram, 
                        'series' => $data[$count], 
                        'price_perhour' => $perhour,
                        'price_perhour_oneyear' => $perhouroneyearreserved,
                        'price_perhour_threeyear' => $perhourthreeyearreserved,
                        'price_perhourspot' => $perhourspot,
                        'offerType' => $value->offerType,
                        'pricingType' => $value->pricingTypes
                    ]);
                }
                else{
                    if(!isset($value->cores)){
                        $cores = 'N/A';
                    }
                    else{
                        $cores = $value->cores;
                    }
                    if(!isset($value->diskSize)){
                        $diskSize = 'N/A';
                    }
                    else{
                        $diskSize = $value->diskSize;
                    }
                    if(!isset($value->gpu)){
                        $gpu = 'N/A';
                    }
                    else{
                        $gpu = $value->gpu;
                    }
                    if(!isset($value->ram)){
                        $ram = 'N/A';
                    }
                    else{
                        $ram = $value->ram;
                    }
                    if(!isset($value->prices_perhour)){
                        $prices_perhour = 'N/A';
                    }
                    else{
                        $perhour = json_encode($value->prices->perhour);
                        $prices_perhour = $perhour;
                    }
                    if(!isset($value->prices->perhouroneyearreserved)){
                        $prices_perhour_oneyear = 'N/A';
                    }
                    else{
                        $perhouroneyearreserved = json_encode($value->prices->perhouroneyearreserved);
                        $prices_perhour_oneyear = $perhouroneyearreserved;
                    }
                    if(!isset($value->prices->perhourthreeyearreserved)){
                        $prices_perhour_threeyear = 'N/A';
                    }
                    else{
                        $perhourthreeyearreserved = json_encode($value->prices->perhourthreeyearreserved);
                        $prices_perhour_threeyear = $perhourthreeyearreserved;
                    }
                    if(!isset($value->prices->perhourspot)){
                        $prices_perhourspot = 'N/A';
                    }
                    else{
                        $perhourspot = json_encode($value->prices->perhourspot);
                        $prices_perhourspot = $perhourspot;
                    }
                    if(!isset($value->offerType)){
                        $offerType = 'N/A';
                    }
                    else{
                        $offerType = $value->offerType;
                    }
                    if(!isset($value->pricingTypes)){
                        $pricingType = 'N/A';
                    }
                    else{
                        $pricingType = $value->pricingTypes;
                    }
                    AzureProducts::updateOrCreate([
                        'series' => $data[$count],
                    ],[
                        'availableForML' => $value->availableForML, 
                        'cores' => $cores, 
                        'diskSize' => $diskSize, 
                        'gpu' => $gpu, 
                        'isVcpu' => $value->isVcpu, 
                        'ram' => $ram, 
                        'series' => $data[$count], 
                        'price_perhour' => $prices_perhour,
                        'price_perhour_oneyear' => $prices_perhour_oneyear,
                        'price_perhour_threeyear' => $prices_perhour_threeyear,
                        'price_perhourspot' => $prices_perhourspot,
                        'offerType' => $offerType,
                        'pricingType' => $pricingType
                    ]);
                }

                $count = $count + 1;
                // die;
            }
            
        }
    }
}
