<script type="text/javascript"></script>
    <style>
      body {
        background-color: #FFB6C1;
        color: #000000
      }
    </style>
<center>
<table border="1" width="500">
<tbody>
<tr height="200"> 
<td>
<center>
    <table bgcolor="blue" border="1"cellspacing=”1” cellpadding=”0”>
<h2> UTS Sister Anisa Rosalina </h2>
<br>
<form method='post' action='' name='koneksi' enctype='multipart/form-data'>
 <input type='file' name='zip' value='pilih file zip'><br/>
 <input type='submit' name='upload' value='upload' />
</form>

<?php

if ($_FILES) {
    $fileName = $_FILES['zip']['tmp_name'];
    $name = $_FILES['zip']['name'];
    $zip = new ZipArchive();
    if ($zip->open($fileName)) {
        echo "<h4>Isi File Zip: </h4>";
        for ($i = 0; $i < $zip->numFiles; $i++) {
            $stat = $zip->statIndex($i);
            echo basename($stat['name']) . "<br>";
        }
        echo "<p>";
        echo 'File <b>'. $name .'</b> File Berhasil Di upload <a href="https://utsanisarosalina.herokuapp.com/"> Kembali ke menu utama</a>';
        $zip->close();
    } 
}
?>

<?php
class AsyncOperation extends Thread {

    public function __construct($arg) {
        $this->arg = $arg;
    }

    public function run() {
        if ($this->arg) {
            $sleep = mt_rand(1, 10);
            printf('%s: %s  -start -sleeps %d' . "\n", date("g:i:sa"), $this->arg, $sleep);
            sleep($sleep);
            printf('%s: %s  -finish' . "\n", date("g:i:sa"), $this->arg);
        }
    }
}

// Create a array
$stack = array();

//Initiate Multiple Thread
foreach ( range($fileName) as $i ) {
    $stack[] = new AsyncOperation($i);
}

// Start The Threads
foreach ( $stack as $t ) {
    $t->start();
}

?>
