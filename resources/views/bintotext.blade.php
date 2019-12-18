<?php

function strigToBinary($string)
{
    $characters = str_split($string);

    $binary = [];
    foreach ($characters as $character) {
        $data = unpack('H*', $character);
        $binary[] = base_convert($data[1], 16, 2);
    }

    return implode(' ', $binary);
}

function binaryToString($binary)
{
    $binaries = explode(' ', $binary);

    $string = null;
    foreach ($binaries as $binary) {
        $string .= pack('H*', dechex(bindec($binary)));
    }

    return $string;
}

?>
<h3>Binary to Text conversion</h3>

<form action="?" method="get">
    Binary string: <input type="text" name="bin" /><input type="submit" value="Submit" />
</form>

<?php
if (isset($_GET['bin']))
{
    $bin = $_GET['bin'];
    echo "<p style=\"background-color:#ddd;padding:5px;\">" . strigToBinary($bin) . "</p>";
}
?>
