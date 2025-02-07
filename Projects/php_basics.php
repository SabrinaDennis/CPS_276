<?php
$numbers = range(1, 50);
$evenNumbersArray = [];


foreach ($numbers as $num) {
    if ($num % 2 === 0) {
        $evenNumbersArray[] = $num;
    }
}


$evenNumbers = implode(" - ", $evenNumbersArray);


$form = <<<HTML
<form class="mt-4">
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="exampleTextarea" class="form-label">Example textarea</label>
        <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
    </div>
</form>
HTML;


function createTable($rows, $columns) {
    $table = '<table class="table table-bordered mt-4">';
    for ($i = 0; $i < $rows; $i++) {
        $table .= '<tr>';
        for ($j = 0; $j < $columns; $j++) {
            $table .= '<td>Row ' . ($i + 1) . ', Col ' . ($j + 1) . '</td>';
        }
        $table .= '</tr>';
    }
    $table .= '</table>';
    return $table;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Webpage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container">
    <?php
        echo $evenNumbers;
        echo $form;
        echo createTable(8, 6);
    ?>
</body>
</html>
