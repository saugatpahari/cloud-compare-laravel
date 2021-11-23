<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AwsProducts;
use App\Models\AzureProducts;

class CalculatorController extends Controller
{
    public function index(Request $request)
    {
        if(isset($request)){
            $vcpu = $request->vcpus;
            $memory = $request->memory;
            $aws_memory = $request->memory. ' GiB';
            $platform = $request->platform;
            $region = $request->region;            

            $azure_product = AzureProducts::select()
                ->where(function ($query) use ($vcpu) {
                    $query->where('cores', $vcpu);
                })
                ->where(function ($query) use ($memory) {
                    $query->where('ram', $memory);
                })
                ->where(function ($query) use ($platform){
                    $query->where('series', 'like', $platform . '%');
                })
                ->where(function ($query) use ($region){
                    $query->whereRaw('UPPER(price_perhourspot) LIKE UPPER("%' . $region . '%")');
                })
                ->get();
            $count = 0;
// dd($azure_product->price_perhourspot);
            if(isset($azure_product->price_perhourspot)){
                foreach($azure_product as $key){
                    // dd($key->price_perhourspot);
                    if(isset($key->price_perhourspot)){
                        $perhourspot = json_decode($key->price_perhourspot, true);
                        // dd($perhourspot[$region]['value']);
                        $pricedata[] = $perhourspot[$region]['value'];
                        $count = $count + 1;
                    }
                    else{
                        $pricedata[] = 'N/A';
                    }
                }

                $value = 0;
                foreach($azure_product as $azureproduct){
                    $pricearray['price'] = $pricedata[$value];

                    $mergedArray[] = array_merge($azureproduct->toArray(), $pricearray);

                    $value = $value + 1;
                }
                
                $marks = array();
                
                foreach ($mergedArray as $key => $row)
                {
                    $marks[$key] = $row['price'];
                    
                }
                
                array_multisort($marks, SORT_ASC, $mergedArray);
            }
            else{
                $mergedArray = $azure_product;             
            }
             
            // dd($mergedArray);
            $aws_product = AwsProducts::select()
                ->where(function ($query) use ($vcpu) {
                    $query->where('vcpu', $vcpu);
                })
                ->where(function ($query) use ($memory) {
                    $query->where('memory', $memory.' GiB');
                })
                ->where(function ($query) use ($platform){
                    $query->where('operatingSystem', 'like', $platform . '%');
                })
                ->orderBy('price', 'ASC')
                ->get();
            
            return view('welcome')->with(compact('mergedArray', 'aws_product', 'region'));
        }      
        
    }
}
