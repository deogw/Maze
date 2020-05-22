#!/usr/bin/php
<?php
// prevent browser
if(PHP_SAPI !== 'cli'){ die; }

// Ambil nilai argument, jika tidak ada argument, default Input adalah 15.
$input = (isset($argv[1]) ? $argv[1] : 15);

// Check apakah input bisa dinyatakan 4n-1, yang dimana n = positive integer.
$s = (++$input) % 4;
if ($s == 0) {
    --$input;
    generateMaze($input);
} else {
    echo "Input yang Anda masukkan bukan 4n-1 \n";
}

/**
 * Generate Maze
 *
 * @param Integer $row Jumlah Baris Maze.
 */
function generateMaze($row)
{
    echo "\n ";

    // 0 = berarti kiri, 1 berarti kanan.
    $pintu = 0;
    // Looping dari $row.
    for ($i = 1; $i <= $row; $i++) {

        // Check apakah index row sekarang itu bilangan ganjil atau genap.
        // Jika index row nya ganjil, maka pintu terletak di sebelah kiri atau kanan baris.
        // Jika index row nya genap, maka yang terisi tembok hanya ujung kiri dan kanan nya saja.
        if (isOdd($i)) {

            for ($a = 0; $a < $row; $a++) {
                if ($a == 1 && $pintu == 0 || $a == $row - 2 && $pintu == 1) {
                    echo " ";
                } else {
                    echo "@";
                }
            }

            $pintu = ($pintu == 0 ? $pintu = 1 : 0);
            echo "\n ";
        } else {

            for ($b = 0; $b < $row; $b++) {
                if ($b == 0 || $b == $row - 1) {
                    echo "@";
                } else {
                    echo " ";
                }
            }

            echo "\n ";
        }
    }
}

/**
 * Check apakah bilangan Ganjil atau Genap
 *
 * @param Integer $value
 * @return bool
 */
function isOdd($value)
{
    return ($value % 2 == 1 ? true : false);
}