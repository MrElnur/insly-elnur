<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BinaryToString extends Controller
{
    public function result(Request $request)
    {
        $input = $request->input('bin');
        $result = $this->binaryToString($input);
        return redirect('/binaryString')->with('bin', $result);
    }
    public function stringResult(Request $request)
    {
        $input = $request->input('str');
        $result = $this->stringToBinary($input);
        return redirect('/binaryString')->with('str', $result);
    }
    private function binaryToString($binary)
    {
        $binaries = explode(' ', $binary);

        $string = null;
        foreach ($binaries as $binary) {
            $string .= pack('H*', dechex(bindec($binary)));
        }

        return $string;
    }
    private function stringToBinary($string)
    {
        $characters = str_split($string);

        $binary = [];
        foreach ($characters as $character) {
            $data = unpack('H*', $character);
            $binary[] = base_convert($data[1], 16, 2);
        }

        return implode(' ', $binary);
    }
}
