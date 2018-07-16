<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;

class IndexController extends Controller
{
    public function index()
    {
        return view('index');
    }
}