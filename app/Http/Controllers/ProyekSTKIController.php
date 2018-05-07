<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProyekSTKIController extends Controller
{

  private $finalTokens;
  public function setFinalTokens($finalTokens)
  {
    $this->finalTokens=$finalTokens;
  }

  public function getFinalTokens()
  {
    return $this->finalTokens;
  }

  public function tokenizing(Request $request)
  {
    $dokumen = strtolower($request->judul_buku.$request->sinopsis);
    $tokenizerFactory  = new \Sastrawi\Tokenizer\TokenizerFactory();
    $tokenizer = $tokenizerFactory->createDefaultTokenizer();
    $tokens = $tokenizer->tokenize($dokumen);
    $stopWords = new \voku\helper\StopWords();
    $docstop=preg_replace('/\b('.implode('|',$stopWords->getStopWordsFromLanguage('id')).')\b/','',$tokens); //ngilangi stopword
    $finalToken=array_filter(preg_replace("/[^a-zA-Z]+/", "",$docstop));//ngilangi angka karo tanda baca (punctuation) + array yang kosong
    //dd();
    $this->setFinalTokens(array_count_values($finalToken));//ngitung TF gawe array count values
    dd($this->getFinalTokens());
    return view('tokenize')->with('dokumen', $request)->with('token', $finalToken);
  }
}
