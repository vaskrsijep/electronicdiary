<?php

function display_row($row, $r = '')
{
    foreach ($row as $r) {

        if (!empty($r->subject_name)) {

            echo "<td>$r->subject_name</td>";
        } else {

            echo  "<td></td>";
        }
    }
}

function display_row_with_link($rowl, $rl = '')
{

    foreach ($rowl as $rl) {

        if (!empty($rl->subject_name)) {

            echo "<td><a title='click to edit subject' href=" . URLROOT . "/schedules/edit/$rl->id_schedules>" . $rl->subject_name . "</a></td>";
        } else {

            echo "<td class='hide-text'><a title='click to insert subject' href=" . URLROOT . "/schedules/edit/$rl->id_schedules>" . 'add subject' . "</a></td>";
        }
    }
}
