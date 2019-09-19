<?php

function    ft_is_sort($tab)
{
    if (is_array($tab))
    {
        $tmp = $tab;
        sort($tmp, SORT_STRING);
        return($tmp === $tab);
    }
    return (0);
}
?>