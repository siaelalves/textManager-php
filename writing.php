<?php
/*
 © 2024 Copyright, Siael Alves
*/
namespace text ;

/**
 * Objeto que representa a escrita e a impressão de texto na tela.
 */
class writing {

 /** String ou texto desejado para manipular. */
 public string $string ;



 /**
  * Função construtora.
  * @param string $string String ou texto desejado para manipular.
  */
 public function __construct ( string $string ) {

  $this->string = $string ;

 }

 /**
  * Corrige a acentuação em letras maiúsculas,
  * impedindo que "RÓTULOS" apareça como "RóTULOS", por exemplo.
  * @param string $string Define se irá corrigir as letras maiúsculas ou minúsculas.
  * @return string Retorna o texto corrigido com a acentuação correta. Se houver um 
  * argumento incorreto, retornará uma string  vazia;
  **/
 public function correct_font ( string $step = "" , bool $all_caps ) : string {
  
  $small_letters = array ( "á","é","í","ó","ú","ç","â","ê","ô","à","ã","õ" ) ;
  $big_letters = array ( "Á","É","Í","Ó","Ú","Ç","Â","Ê","Ô","À","Ã","Õ" ) ;
  
  if ( $step == "" ) {

   if ( $all_caps == true ) {
    return str_replace ( $small_letters , $big_letters,  $this->string );	

   } else {
    return str_replace ( $big_letters , $small_letters , $this->string);

   }

  } else {

   if ( $all_caps == true ) {
    return str_replace ( $small_letters , $big_letters,  $step );	

   } else {
    return str_replace ( $big_letters , $small_letters , $step );

   }

  }

 }

 /** Remove a acentuação de uma string. Funciona apenas com o idioma pt-br.
  * @return string Retorna uma string com o texto sem acentos.
 */
 public function remove_accents ( string $step = "" ) : string {
  
  $with_accents = array ( "á","é","í","ó","ú","â","ê","ô","à","ã","õ","ç","Á","É","Í","Ó","Ú","Â","Ê","Ô","À","Ã","Õ","Ç" ) ;
  $no_accents   = array ( "a","e","i","o","u","a","e","o","a","a","o","c","A","E","I","O","U","A","E","O","A","A","O","C" ) ;

  if ( $step == "" ) {
   
   return str_replace ( $with_accents , $no_accents , $this->string ) ;

  } else {

   return str_replace ( $with_accents , $no_accents , $step ) ;

  }
  

 }

 /** Remove a pontuanção de uma string ou a substitui por um símbolo específico. Funciona apenas com o idioma pt-br.
  * @param string $replaceWith Expressão ou caractere a inserir no lugar de cada caractere de pontuanção.
  * @return string Retorna uma string com o texto sem pontuação.
 */
 public function remove_punctuation ( string $step = "" , string $replaceWith = "" ) : string {

  $signals = array ( ".","!","?",",",";",":","“","”",'"',"'","(",")","[","]","{","}","=","*","&","%","$","#","@","+","/","\\","|",">","<" ) ;

  if ( $step == "" ) {

   return str_replace ( $signals , $replaceWith , $this->string ) ;

  } else {
   
   return str_replace ( $signals , $replaceWith , $step ) ;

  }

 }

 /** Gera uma string válida para ser usada como Url de uma página, ou como identificador legível de elementos web.
  * @param string $separator Separador dos símbolos a serem substituídos. 
  * Ex.: Se $string="eu sou miguel", $separator será usado no lugar de todos os espaços, resultando em: "eu_sou_miguel".
  * @return string Retorna uma string com uma string válida para se tornar um identificador legível.
 */
 public function to_url ( string $separator = "-" ) : string {
  
  $step1 = strtolower ( str_replace ( ' ' , $separator , $this->string ) ) ;
  
  $step2 = $this->remove_punctuation ( $step1 , $separator ) ;

  $step3 = $this->correct_font ( $step2, false );

  $step4 = $this->remove_accents ( $step3 ) ;

  return $step4;
  
 }

 /**
  * Retorna um número especificado de palavras dentro de uma string contando a partir da primeira palavra.
  * @param int $count Número de palavras a retornar.
  * @return string Retorna uma string contendo apenas as primeiras $count palavras da string original.
  */
 public function get_words ( int $count ) : string {

  $words = explode ( " " , $this->string , $count ) ;
  
  $words = array_slice ( $words , 0 , $count ) ;

  return implode ( " " , $words ) ;

 }

}

?>