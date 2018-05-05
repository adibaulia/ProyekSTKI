<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProyekSTKIController extends Controller
{
    public function tokenizing(Request $request){

      $dokumen = $request->judul_buku.$request->sinopsis;
      $tokenizerFactory  = new \Sastrawi\Tokenizer\TokenizerFactory();
      $tokenizer = $tokenizerFactory->createDefaultTokenizer();
      $tokens = $tokenizer->tokenize($dokumen);

      return view('tokenize')->with('dokumen', $request)->with('token', $tokens);
    }
}
