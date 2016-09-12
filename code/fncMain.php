<?php
/*
 * Funktion til at validere emails
 */
function isValidEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL)
    && preg_match('/@.+\./', $email);
}
/*
 * Funktion til at udskrive måneder på dansk
 */
function monthDanish($date)
{
    $months = array(1 => "januar", 2 => "februar", 3 => "marts", 4 => "april", 5 => "maj", 6 => "juni", 7 => "juli", 8 => "august", 9 => "september", 10 => "oktober", 11 => "november", 12 => "december");
    $month = $months[date('n', strtotime($date))];
    return $month;
}
/*
 * Funktion til at udskrive dage på dansk
 */
function dayDanish($date)
{
    $days = array(1 => "mandag", 2 => "tirsdag", 3 => "onsdag", 4 => "torsdag", 5 => "fredag", 6 => "lørdag", 7 => "søndag");
    $day = $days[date('N', strtotime($date))];
    return $day;
}