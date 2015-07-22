<?php
$braille_str = 
"O. O. O. O. O. .O O. O. O. OO
OO .O O. O. .O OO .O OO O. .O
.. .. O. O. O. .O O. O. O. ..";

$braille_str = 
".O O. .O OO O. O. .O OO O. OO O. .O O. .O
O. .O O. .. .. OO OO .. .. .. OO OO .O OO
O. O. O. O. .. O. O. O. OO .. .. .O O. .O";


$braille_table = [
	'O.....' => "a",
	'O.O...' => "b",
	'OO....' => "c",
	'OO.O..' => "d",
	'O..O..' => "e",
	'OOO...' => "f",
	'O.OO..' => "h",
	'.OO...' => "i",
	'.OOO..' => "j",
	'O...O.' => "k",
	'O.O.O.' => "l",
	'OO..O.' => "m",
	'OO.OO.' => "n",
	'O..OO.' => "o",
	'OOO.O.' => "p",
	'OOOOO.' => "q",
	'O.OOO.' => "r",
	'.OO.O.' => "s",
	'.OOOO.' => "t",
	'O...OO' => "u",
	'O.O.OO' => "v",
	'.OOO.O' => "w",
	'OO..OO' => "x",
	'OO.OOO' => "y",
	'O..OOO' => "z",
];

/**
* 
*/
class Solver 
{
	
	function __construct($braille_str, $table)
	{
		$this->braille_str = $braille_str;
		$this->braille_table = $table;
	}

	private function breakToThreeLines()
	{
		$this->braille_str_lines = explode("\n", $this->braille_str);
	}

	private function breakRow()
	{
		foreach ($this->braille_str_lines as $lines) {
			$this->exploded_lines[] = str_replace(["\n"], [""], explode(" ", $lines));
		} 
	}

	private function flattenBrailleChars()
	{  
		$flattenedChar = [];
		for ($i=0; $i <= (count($this->exploded_lines[0]) - 1) ; $i++) {
			for ($j=0; $j <= 2; $j++) {
				$flattenedChar[] = trim( $this->exploded_lines[$j][$i] );
			}
			$this->chars[] = implode("", $flattenedChar);
			$flattenedChar = [];
		}
	}

	public function solve()
	{
		$this->breakToThreeLines();
		$this->breakRow();
		$this->flattenBrailleChars();	

		$word = '';
		foreach ($this->chars as $value) {
			$word .= $this->braille_table[$value];  	
		}

		echo $word;		
	}
}

$s = new Solver($braille_str, $braille_table);

echo $s->solve();

?>