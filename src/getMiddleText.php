<?php

function getMiddleText($wholeText, $leftText, $rightText, $offset = 0, &$position = 0)
{
    if ($offset < 0) {
        $offset = 0;
    }

    $pos1 = strpos($wholeText, $leftText, $offset);
    if ($pos1 === false) {
        return false;
    }

    $pos2 = $pos1 + strlen($leftText);
    $pos3 = strpos($wholeText, $rightText, $pos2);
    if ($pos3 === false) {
        return false;
    }

    $position = $pos2;

    return substr($wholeText, $pos2, $pos3 - $pos2);
}

function getMiddleTexts($wholeText, $leftText, $rightText, $offset = 0, &$position = 0)
{
    $pos       = $offset >= 0 ? $offset : 0;
    $textGroup = [];
    $tmp       = '';
    do {
        $tmp = getMiddleText($wholeText, $leftText, $rightText, $pos + strlen($tmp), $pos);
        if ($tmp === false) {
            break;
        }

        $textGroup[] = $tmp;
    } while (true);
    $position = $pos;

    return $textGroup;
}
