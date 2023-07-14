<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

 
class PostController extends Controller
{
    public function index()
    {
        $response = Http::get('https://eklinik.mushonnip.me/api/login');
  
        $jsonData = $response->json();
          
         dd($jsonData);
    }
}