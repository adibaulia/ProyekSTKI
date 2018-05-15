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
		$dokumen = strtolower($request->judul_buku." ".$request->sinopsis);
		//dd($dokumen);
		$tokenizerFactory  = new \Sastrawi\Tokenizer\TokenizerFactory();
		$tokenizer = $tokenizerFactory->createDefaultTokenizer();
		$tokens = $tokenizer->tokenize($dokumen);
		//dd($tokens);
		$stopWords = new \voku\helper\StopWords();
		$docstop=preg_replace('/\b('.implode('|',$stopWords->getStopWordsFromLanguage('id')).')\b/','',$tokens); //menghilangkan stopword
		//dd($docstop);
		$finalToken=array_filter(preg_replace("/[^a-zA-Z]+/", "",$docstop));//menghilangkan angka , tanda baca (punctuation) , dan array yang kosong
		//dd($docstop);
		$c = 0;
		foreach($finalToken as $a){
			$b[$c] = $this->hapusakhiran($this->hapusawalan2($this->hapusawalan1($this->hapuspp($this->hapuspartikel($a)))));
			$c++;
		}
		//dd($b);
		$this->setFinalTokens(array_count_values($b));//menghitung TF
		$d = ($this->getFinalTokens());
		//dd($d);
		arsort($d);
		//dd($d);
		$keys=array_keys($d);
		//dd($keys);
		$final = $keys[0]."(".$d[$keys[0]].")";
		return view('tokenize')->with('dokumen', $request)->with('final', $final);
	}
  
	//langkah 1 - hapus partikel
	public function hapuspartikel($kata){
		if((substr($kata, -3) == 'kah' )||( substr($kata, -3) == 'lah' )||( substr($kata, -3) == 'pun' )){
			$kata = substr($kata, 0, -3);			
		}
		return $kata;
	}
	
	//langkah 2 - hapus possesive pronoun
	public function hapuspp($kata){
		if(strlen($kata) > 4){
			if((substr($kata, -2)== 'ku')||(substr($kata, -2)== 'mu')){
				$kata = substr($kata, 0, -2);
			}else if((substr($kata, -3)== 'nya')){
				$kata = substr($kata,0, -3);
			}
		}
		return $kata;
	}
	
	//langkah 3 hapus first order prefiks (awalan pertama)
	public function hapusawalan1($kata){
		if(substr($kata,0,4)=="meng"){
			if(substr($kata,4,1)=="e"||substr($kata,4,1)=="u"){
				$kata = "k".substr($kata,4);
			}else{
				$kata = substr($kata,4);
			}
		}else if(substr($kata,0,4)=="meny"){
			$kata = "s".substr($kata,4);
		}else if(substr($kata,0,3)=="men"){
			$kata = substr($kata,3);
		}else if(substr($kata,0,3)=="mem"){
			if(substr($kata,3,1)=="a" || substr($kata,3,1)=="i" || substr($kata,3,1)=="e" || substr($kata,3,1)=="u" || substr($kata,3,1)=="o"){
				$kata = "p".substr($kata,3);
			}else{
				$kata = substr($kata,3);
			}
		}else if(substr($kata,0,2)=="me"){
			$kata = substr($kata,2);
		}else if(substr($kata,0,4)=="peng"){
			if(substr($kata,4,1)=="e" || substr($kata,4,1)=="a"){
				$kata = "k".substr($kata,4);
			}else{
				$kata = substr($kata,4);
			}
		}else if(substr($kata,0,4)=="peny"){
			$kata = "s".substr($kata,4);
		}else if(substr($kata,0,3)=="pen"){
			if(substr($kata,3,1)=="a" || substr($kata,3,1)=="i" || substr($kata,3,1)=="e" || substr($kata,3,1)=="u" || substr($kata,3,1)=="o"){
				$kata = "t".substr($kata,3);
			}else{
				$kata = substr($kata,3);
			}
		}else if(substr($kata,0,3)=="pem"){
			if(substr($kata,3,1)=="a" || substr($kata,3,1)=="i" || substr($kata,3,1)=="e" || substr($kata,3,1)=="u" || substr($kata,3,1)=="o"){
				$kata = "p".substr($kata,3);
			}else{
				$kata = substr($kata,3);
			}
		}else if(substr($kata,0,2)=="di"){
			$kata = substr($kata,2);
		}else if(substr($kata,0,3)=="ter"){
			$kata = substr($kata,3);
		}else if(substr($kata,0,2)=="ke"){
			$kata = substr($kata,2);
		}
		return $kata;
	}
	
	//langkah 4 hapus second order prefiks (awalan kedua)
	public function hapusawalan2($kata){
	  
		if(substr($kata,0,3)=="ber"){
			$kata = substr($kata,3);
		}else if(substr($kata,0,3)=="bel"){
			$kata = substr($kata,3);
		}else if(substr($kata,0,2)=="be"){
			$kata = substr($kata,2);
		}else if(substr($kata,0,3)=="per" && strlen($kata) > 5){
			$kata = substr($kata,3);
		}else if(substr($kata,0,2)=="pe"  && strlen($kata) > 5){
			$kata = substr($kata,2);
		}else if(substr($kata,0,3)=="pel"  && strlen($kata) > 5){
			$kata = substr($kata,3);
		}else if(substr($kata,0,2)=="se"  && strlen($kata) > 5){
			$kata = substr($kata,2);
		}
		return $kata;
	}
	
	////langkah 5 hapus suffiks
	public function hapusakhiran($kata){
		if (substr($kata, -3)== "kan" ){
			$kata = substr($kata, 0, -3);
		}
		else if(substr($kata, -1)== "i" ){
			$kata = substr($kata, 0, -1);
		}else if(substr($kata, -2)== "an"){
			$kata = substr($kata, 0, -2);
		}	
		return $kata;
	}
}

