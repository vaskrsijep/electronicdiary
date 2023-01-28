<?php

function displayInsertForSchedule($numOfClasses, $letters)
{

    $c = 1;

    for ($i = 1; $i <= $numOfClasses; $i++) {
        echo "<th scope='row'>" . $i . "</th>";

        for ($j = 0; $j <= count($letters) - 1; $j++) {
            echo "<td><input type='text'  onfocus='hideText(this)' class='form-control' name='" . $letters[$j] . $c . "'size='12'></td>\n";
            echo "<input type='hidden' id='1' name='class_num" . $c . "' value='" . $c . "'>";
        }

        $c++;
        echo '</tr>';
    }
}
