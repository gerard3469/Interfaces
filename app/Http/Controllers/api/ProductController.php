<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductsRequest;
use App\Mail\api\Notifications\StatusMail;
use App\Models\Product;
use Exception;
use DB;
use Illuminate\Support\Facades\Mail;

class ProductController extends Controller
{
    public function store(StoreProductsRequest $request){
   
        try {
            
            $validated = $request->validated();

            // Procesar los datos si la validación 
            $productsData = $validated['products'];

            DB::beginTransaction();
            //Se recorren los productos a crear
            foreach ($productsData as $productData) {
                Product::create($productData);
            }
            DB::commit();
            $message='Products stored successfully';
            $this->sendEmail($message);

            return response()->json(['message' =>$message ], 201);
    
        }
        catch (Exception $e) {
            DB::rollBack();
            $this->sendEmail($e->getMessage());
            return response()->json([
                'message' => 'Fail register product',
                'errors' => $e->getMessage()
            ], 422);
        }

    }

    protected function sendEmail($message){
        try{
            $apiKey = env('MAIL_QA');
            $data = [
                'titulo' => 'Transaccion '.now()->format('d-M-y'),
                'contenido' =>$message
            ];
    
            Mail::to($apiKey)->send(new StatusMail($data));
        } catch(Exception $e){}
        
    }
}
