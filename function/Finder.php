<?php

//include "Koleksi.php";



class Finder
{
    /**
     * @var string Needle
     */
    protected $needle;
    /**
     * @var array Haystack
     */
    protected $haystack;
    /**
     * Hold the sorted comparison stack.
     * 
     * @var array Haystack
     */
    protected $sorted_haystack;
    /**
     * Finder constructor.
     * 
     * @param string $needle
     * @param array $haystack
     * @return void
     */
    public function __construct($needle, $haystack)
    {
        $this->needle = $needle;
        $this->haystack = $haystack;
    }
    /**
     * Sort Haystack.
     * 
     * @return void
     */
    protected function sortHaystack()
    {
        $sorted_haystack = [];
        foreach ($this->haystack as $string) {
            $sorted_haystack[$string] = $this->levenshteinUtf8($this->needle, $string);
        }
        asort($sorted_haystack);
        $this->sorted_haystack = $sorted_haystack;
    }
    /**
     * Return the highest match.
     * 
     * @return mixed
     */
    public function first()
    {
        $this->sortHaystack();
        reset($this->sorted_haystack);
        return key($this->sorted_haystack);
    }
    /**
     * Return all strings in sorted match order.
     * 
     * @return array
     */
    public function all()
    {
        $this->sortHaystack();
        return array_keys($this->sorted_haystack);
    }
    /**
     * Return whether there is an exact match.
     * 
     * @return bool
     */
    public function hasExactMatch()
    {
        return in_array($this->needle, $this->haystack);
    }
    /**
     * Ensure a string only uses ascii characters.
     * 
     * @param string $str
     * @param array $map
     * @return string
     */
    protected function utf8ToExtendedAscii($str, &$map)
    {
        // Find all multi-byte characters (cf. utf-8 encoding specs).
        $matches = array();
        if (!preg_match_all('/[\xC0-\xF7][\x80-\xBF]+/', $str, $matches)) {
            return $str; // plain ascii string
        }
        // Update the encoding map with the characters not already met.
        foreach ($matches[0] as $mbc) {
            if (!isset($map[$mbc])) {
                $map[$mbc] = chr(128 + count($map));
            }
        }
        // Finally remap non-ascii characters.
        return strtr($str, $map);
    }
    /**
     * Calculate the levenshtein distance between two strings.
     * 
     * @param string $string1
     * @param string $string2
     * @return int
     */
    protected function levenshteinUtf8($string1, $string2)
    {
        $charMap = array();
        $string1 = $this->utf8ToExtendedAscii($string1, $charMap);
        $string2 = $this->utf8ToExtendedAscii($string2, $charMap);
        return levenshtein($string1, $string2);
    }
}



/*

$needle = 'php';

// Your list (from your database or an API)
$haystack = ['Dasar-Dasar Web Dinamis Menggunakan PHP', 'Pemrograman Web Mencakup HTML, CSS, Javascript, & PHP', 'Mudah Menjadi Programer PHP','Pemograman Web Dinamis Dengan Kolaborasi PHP & Java','PHP & MySQL Untuk Pemula','Aplikasi Web Dengan PHP Dan MySQL','Dreamweaver CS5 PHP-MySQL','Membangun Aplikasi Berbasis PHP.5 Dan Firebird 1.5','Kumpas Tuntas Adobe Dreamweaver CS5 Dg PHP-MYSQL','Dasar Pemograman Web Dinamis Menggunakan PHP '];

// Init Text Finder
$finder = new Finder($needle, $haystack);

// Display all results ordered by the most approching
$results = $finder->all();
print_r($haystack);
echo "<br/>";
print_r($results);
*/



?>