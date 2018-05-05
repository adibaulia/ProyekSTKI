<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProyekSTKIController extends Controller
{
    public function tokenizing(Request $request){

      $dokumen = strtolower($request->judul_buku.$request->sinopsis);
      $tokenizerFactory  = new \Sastrawi\Tokenizer\TokenizerFactory();
      $tokenizer = $tokenizerFactory->createDefaultTokenizer();
      $tokens = $tokenizer->tokenize($dokumen);
      $stopWords = new \voku\helper\StopWords();
      $stopWords->getStopWordsFromLanguage('id');
      $docstop=preg_replace('/\b('.implode('|',$stopWords->getStopWordsFromLanguage('id')).')\b/','',$tokens);
      $finalTokens=array_filter(preg_replace("/[^a-zA-Z 0-9]+/", "",$docstop));
      //dd();
      return view('tokenize')->with('dokumen', $request)->with('token', $finalTokens);
    }
}
