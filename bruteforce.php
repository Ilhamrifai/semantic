<?php
function sub_string($pattern, $subject)
{
	$n = strlen($subject);
	$m = strlen($pattern);

	for ($i = 0; $i < $n-$m; $i++) {
		$j = 0;
		while ($j < $m && $subject[$i+$j] == $pattern[$j]) {
			$j++;
		}
		if ($j == $m) return $i;
	}
	return -1;
}

function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}

echo sub_string('tata', 'catatan!');
echo '</br>';
$kata="al-qur'an";
$kata2="nabi muhammad";

echo clean($kata).'</br>.'
echo clean($kata2);


 ?>
