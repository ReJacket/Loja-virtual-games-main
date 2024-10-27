<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.cheapshark.com/api/1.0/deals");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$resposta = curl_exec($ch);
curl_close($ch);

$promocoes = json_decode($resposta, true);

foreach ($promocoes as $promo) {
    echo "<p>Jogo: {$promo['title']} - Preço: \${$promo['salePrice']} (De: \${$promo['normalPrice']})</p>";
}
?>
