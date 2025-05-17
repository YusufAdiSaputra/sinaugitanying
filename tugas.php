<?php
function countingSortDescending($arr) {
    if (empty($arr)) return [];

    $max = max($arr);
    $min = min($arr);

    $count = array_fill($min, $max - $min + 1, 0);

    // Hitung frekuensi tiap nilai
    foreach ($arr as $num) {
        $count[$num]++;
    }

    $sorted = [];

    // Urutkan dari nilai tertinggi ke terendah
    for ($i = $max; $i >= $min; $i--) {
        while ($count[$i] > 0) {
            $sorted[] = $i;
            $count[$i]--;
        }
    }

    return $sorted;
}

// Nilai-nilai
$data = [$nilai1 = 85, $nilai2 = 92, $nilai3 = 70, $nilai4 = 60, $nilai5 = 75, $nilai6 = 88];

echo "Data sebelum diurutkan:\n";
print_r($data);

$sorted = countingSortDescending($data);

echo "Data setelah diurutkan (Counting Sort - Descending):\n";
print_r($sorted);
?>
