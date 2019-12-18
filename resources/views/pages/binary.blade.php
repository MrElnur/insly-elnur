@extends('layouts.default')
@section('content')

    <h3>Text to Binary conversion</h3>

    <form action="/stringCalc" method="GET">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        Binary string: <input type="text" value="Elnur Mammadov" name="str" size="110" /><input type="submit" value="Submit" />
    </form>

    <div class="row text-center">
        <div class="col-md-2">
        </div>
        <div class="col-md-6">
            @if(session('str'))
                {{ session('str') }}
            @endif
            <div class="col-md-2">
            </div>
        </div>
    </div>

    <h3>Binary to Text conversion</h3>

    <form action="/binaryCalc" method="GET">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        Binary string: <input type="text" value="01110000 01110010 01101001 01101110 01110100 00100000 01101111 01110101 01110100 00100000 01111001 01101111 01110101 01110010 00100000 01101110 01100001 01101101 01100101 00100000 01110111 01101001 01110100 01101000 00100000 01101111 01101110 01100101 00100000 01101111 01100110 00100000 01110000 01101000 01110000 00100000 01101100 01101111 01101111 01110000 01110011" name="bin" size="110" /><input type="submit" value="Submit" />
    </form>


    <div class="row text-center">
        <div class="col-md-2">
        </div>
        <div class="col-md-6">
            @if(session('bin'))
                {{ session('bin') }}
            @endif
            <div class="col-md-2">
            </div>
        </div>
    </div>

@stop
