<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<?php
date_default_timezone_set('Europe/Tallinn');
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Calculator</title>
{{--    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" >--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</head>
<body>
<header class="s">
    @include('includes.header')
</header>
<div class="cost-calculator">


    <h1>Insurance Calculator


    </h1>
    <form method="post" action="/calculate">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <table>
            <tr>
                <!-- inputs -->
                <td class="input-container"><table width="100%"><tr><td>
                                <div class="slider-input-container">
                                    <h3>  Price </h3>
                                        <div class="slider-1 cost-slider"></div><div class="value-input-box"><div class="dollar-percent-spacer"></div>
                                            <input name="price" type="number" class="price" value="10000" size="10" maxlength="6" min="100" max="100000"></div></div>


                                <div class="slider-input-container">
                                    <h3> Tax </h3>
                                        <div class="slider-2 cost-slider"></div><div class="dollar-percent-spacer">%</div>
                                            <input name="tax" type="number" step="0.01" class="tax" value="10" size="10" maxlength="3" min="0" max="100"></div>
                                <div class="slider-input-container">
                                    <h3> Instalments </h3>

                                    <div class="slider-3 cost-slider"></div><div class="value-input-box"><div class="dollar-percent-spacer"></div>
                                        <input name="instalment" type="number" class="instalment" value="2" size="10" maxlength="6" min="0" max="12"></div></div>
                            </td></tr></table>


                </td>


            </tr>
            <td class="submit-container">
                <div class="col-md-3">
                    <button class="button1" type="submit">Submit</button>
                </div>
            </td>
        </table></form>
    <h1></h1>

    <h4></h4>
    <h4></h4></div>
<div class="row text-center">
    <div class="col-md-2">
    </div>
        <div class="col-md-6">
        @if(session('result'))
            <?php
                $html = '';
                $result = json_decode(session('result'), true);
                echo $result;
            ?>
        @endif
            <div class="col-md-2">
            </div>
    </div>
</div>

</body>
</html>

<script>
    //Slider settings for audience
    $('.slider-1').slider({
        animate: 600,
        max: 100000,
        min: 100,
        step: 100,
        value: 10000,
        slide: function(event, ui) {
            $('.price').val( ui.value );
            $(ui.value).val($('.price').val());
            $(function() {
                calculate();
            });
        }
    });

    $('.price').change(function() {
        $('.slider-1').slider("value" , $(this).val())
    });


    //Slider settings average cpc
    $('.slider-2').slider({
        animate: 600,
        max: 100,
        min: 0,
        step: 0.01,
        value: 10,
        slide: function(event, ui) {
            $('.tax').val( ui.value );
            $(ui.value).val($('.tax').val());
            $(function() {
                calculate();
            });
        }
    });

    $('.tax').change(function() {
        $('.slider-2').slider("value" , $(this).val())
    });

    //Slider settings average ctr
    $('.slider-3').slider({
        animate: 600,
        max: 12,
        min: 1,
        step:1,
        value:2,
        slide: function(event, ui) {
            $('.instalment').val( ui.value );
            $(ui.value).val($('.instalment').val());
            $(function() {
                calculate();
            });
        }
    });

    $('.instalment').change(function() {
        $('.slider-3').slider("value" , $(this).val())
    });


    //Calculate this
    function calculate() {
        var price = Math.max($('.price').val());
        var tax1 = $('.tax').val();
        var instalment1 = Math.max($('.instalment').val() / 100);

        var monthly = Math.round(price * instalment1 * tax1);
        var daily = Math.round(Math.max(monthly / 30)*100)/100;


        $('input[name="monthly"]').val('$' + monthly);
        $('input[name="daily"]').val('$' + daily);

    };


    $('input[type="text"], .daily-slider').keyup(function() {
        calculate();
    });

    $(function () {

        //toggle
        $(".toggle").click(function(){
            $("#popup1").toggle();
        });

    });


</script>

