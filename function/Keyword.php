<?php 

use Sastrawi\Tokenizer\TokenizerFactory;


class Keyword{


/**
* @var string keyword
 * */
protected $keyword='';

/**
 * @var  stemmer
 */

protected $stemmer;

/**
 * @var  stopwordRemover
 */

protected $stopWordRemover;

/**
 * @var   \Sastrawi\Tokenizer\DefaultTokenizer
 *  */

protected $tokenizer;

/**
 *Constructor
 *
 *
 * @return  void
 */

public function __construct(){
	$stemmerFactory=new \Sastrawi\Stemmer\StemmerFactory();
	$this->stemmer=$stemmerFactory->createStemmer();

	$stopWordRemoverFactory= new \Sastrawi\StopWordRemover\StopWordRemoverFactory();
	$this->StopWordRemover=$stopWordRemoverFactory->createStopWordRemover();

	$tokenizerFactory=new TokenizerFactory();
	$this->tokenizer=$tokenizerFactory->createDefaultTokenizer();

}

/**
 * Keyword from string
 *
 *
 * @param  string $source
 * @param  int $stricness level of strictness=1
 * 
 */

protected function tokenize($string=''){
	$tokens=$this->tokenizer->tokenize($string);
	return $tokens;

protected function getWordModus($string=''){
	$wordModus=array();

	$words=$this->tokenize($string);
	foreach($words as $word):
		if (is_numbering($word)):
			continue;
		endif;
		if(isset($wordModus[$word])):
			$wordModus[$word]+=1;
		else:
			$wordModus[$word]=1;
		endif;
	endforeach;
	arsort($wordModus,SORT_NUMERIC);

	return $wordModus;
}






}

?>