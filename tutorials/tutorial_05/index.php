<?php
require 'vendor/autoload.php';

use \PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use \PhpOffice\PhpWord\IOFactory;
use \PhpOffice\PhpWord\Element;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_05</title>

</head>

<body>
    <h1>Tutorial_05</h1>
    <section>
        <h2>Text File</h2>
        <?php
        $fh = fopen('text_file.txt', 'r');
        while ($line = fgets($fh)) {
            echo $line, "<br>";
        }
        fclose($fh);
        ?>
    </section>
    <section>
        <h2>Excel file</h2>
        <?php
        $reader = new Xlsx();
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load("excel_file.xlsx");
        $sheetData = $spreadsheet->getActiveSheet()->toArray();
        echo "<table>";
        $head = true;
        foreach ($sheetData as $sheet) {
            echo "<tr>";
            foreach ($sheet as $cell) {
                if ($cell !== null) {
                    if ($head) {
                        echo "<th>" . $cell . "</th>";
                    } else {
                        echo '<td>' . $cell . '</td>';
                    }
                }
            }
            $head = false;
            echo "</tr>";
        }
        echo "</table>";
        ?>
    </section>
    <section>
        <h2>CSV file</h2>
        <?php
        $open = fopen('csv_file.csv', 'r');
        $head = true;
        while (($data = fgetcsv($open, 1024, ","))) {
            if ($head) {
                echo "<pre><h4>$data[0], $data[1]</h4></pre>";
            } else {
                echo "<pre>$data[0], $data[1]</pre>";
            }
            $head = false;
        }
        ?>
    </section>
    <section>
        <h2>Doc Word File</h2>
        <?php
        $phpWord = IOFactory::load('doc_file.docx');
        foreach ($phpWord->getSections() as $section) {
            foreach ($section->getElements() as $element) {
                if ($element instanceof Element\TextRun) {
                    foreach ($element->getElements() as $el) {
                        if ($el instanceof Element\Text) {
                            echo $el->getText() . "<br>";
                        }
                    }
                } elseif ($element instanceof Element\Text) {
                    echo $element->getText() . "<br>";
                }
            }
        }
        ?>
    </section>
</body>

</html>