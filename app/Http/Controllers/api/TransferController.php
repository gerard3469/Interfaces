<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Mail\api\Notifications\StatusMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TransferController extends Controller
{

    public function ejemplo(){

        $data = [
            'titulo' => 'Este es el título',
            'contenido' => 'Este es el contenido del correo electrónico'
        ];

        Mail::to('gerard.c.m.666@gmail.com')->send(new StatusMail($data));

        return response()->json(['message' => 'Correo enviado exitosamente'],201);
        //return response()->json(['message' => 'Datos guardados exitosamente', 'data' => 'asdas'], 201);
        
    }

    public function store(Request $request){
        
    }

}
