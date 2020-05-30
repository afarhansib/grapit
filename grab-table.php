<?php

// simpan cookie
define("COOKIE", "YOUR LARAVEL SESSION COOKIE HERE");

// buat stream
$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Cookie: laravel_session=" . COOKIE
  )
);

$context = stream_context_create($opts);

// buka file/url dengan HTTP header di atas 
$file = file_get_contents('https://dicoding.com/courseinvitationtokens', false, $context);
// echo $file;

try {
  $dom = new DOMDocument();
  $dom->loadHTML($file);
  $table = $dom->getElementsByTagName('table')[0];
  // var_dump($table);

  $table_document = new DOMDocument();
  $table_node = $table_document->importNode($table, true);
  $table_document->appendChild($table_node);

  // tambahkan javascript di sini, gunanya untuk mengambil data nama peserta 
  // beserta tokenid nya
  $script = $table_document->createElement('script', "
    const getData = () => {
      return new Promise((resolve, reject) => {
        const data = {}
        data['timestamp'] = []
        data['data'] = []
        Array.from(document.querySelector('tbody').children).forEach((e, i) => {
          data['data'].push({
            'tokenid': e.children[1].children[0].href.split('/')[4],
            'name': e.children[5].innerText,
            'color': '#' + Math.floor(Math.random() * 16777215).toString(16),
            'progress': []
          })
        })
        resolve(JSON.stringify(data))
      })
    }

    getData()
      .then(data => {
        fetch('save-json.php', {
            method: 'post',
            body: data
          })
          .then(response => response.text())
          .then(data => console.log(data))
          .catch(err => console.error(err))
      })
    ");

  $table_document->appendChild($script);
  // var_dump($table_document);

  // cetak html documen di atas
  echo $table_document->saveHTML();
} catch (Error $e) {
  echo "Error caught: " . $e->getMessage();
}

?>