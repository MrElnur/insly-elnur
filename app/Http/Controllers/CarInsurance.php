<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarInsurance extends Controller
{

    private $commission = 17;

    public function result(Request $request)
    {
        $price = $request->input('price');
        $tax = $request->input('tax');
        $instalment = $request->input('instalment');
        $res = $this->calculate($price, $tax, $instalment);
        return redirect('/calculator')->with('result', json_encode($res));
    }

    /**
     * @param int $price
     * @param float $tax
     * @param int $instalment
     *
     * @return float
     */
    public function calculate(int $price, float $tax, int $instalment): string
    {
        $result = [];
        date_default_timezone_set('Europe/Tallinn');
        $dayOfWeek = date('w', strtotime(date('Y-m-d')));
        $time = date('w',strtotime(date('h')));
        if ($dayOfWeek == 3 && $time > 15 && $time < 20) {
            $baseR = 13;
            $baseTotal = $price * ($baseR / 100);
        }
        else {
            $baseR = 11;
            $baseTotal = $price * ($baseR / 100);
        }

        $result = $this->calculator($tax, $instalment, $baseTotal);

        $totalData = [
            'result' => $result,
            'instalment' => $instalment,
            'price' => $price,
            'baseR' => $baseR,
            'commission' => $this->commission,
            'tax' => $tax,
        ];
        $result = $this->createHtml($result, $totalData);


        return $result;
    }

    /**
     * @param int $price
     * @param float $tax
     * @param int $instalment
     *
     * @return array
     */
    private function calculator(float $tax, int $instalment, $baseTotal): array
    {
        $result = [];
        try {
            $commission = $baseTotal * ($this->commission / 100);
            $totalTax = $baseTotal * ($tax / 100);
            $totalCost = ($baseTotal + $commission + $totalTax);

            $result[0]['basePremium'] = $this->fceil((float) ($baseTotal / $instalment));
            $result[0]['commission'] = $this->fceil((float) ($commission / $instalment));
            $result[0]['totalTax'] = $this->fceil((float) ($totalTax / $instalment));
            $result[0]['totalCost'] = $this->fceil((float) ($totalCost / $instalment));

            $result[1]['basePremium'] = $this->fceil($result[0]['basePremium'] * $instalment);
            $result[1]['commission'] = $this->fceil($result[0]['commission'] * $instalment);
            $result[1]['totalTax'] = $this->fceil($result[0]['totalTax'] * $instalment);
            $result[1]['totalCost'] = $this->fceil($result[0]['totalCost'] * $instalment);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }

        return $result;
    }

    /**
     * @param array $result
     *
     * @return string
     */
    private function createHtml(array  $result, array $totalData): string
    {
        $html = '';

        if ($result) {
            $html .= '<table class="blueTable">';
            $html .= '<tr><div class="row"><th></th><th style="text-align: left;"><div class="column"><b>Policy</b></div></th><div class="column">&nbsp;</div>';
            for ($i = 0; $i < $totalData['instalment']; ++$i) {
                $html .= '<th style="text-align: left;"><div class="column"><b>'.($i + 1).' instalment</b></div></th>';
            }
            $html .= '</div></tr>';
            $html .= '<tr><div class="row"><td style="text-align: left;"><div class="column">Value</div></td>';
            $html .= '<td><div class="column">'.number_format($totalData['price'], 2).'</div></td>';
            $html .= '</div></tr>';

            $html .= '<tr><div class="row">';
            $html .= '<td style="text-align: left;"><div class="column">Base Premium ('.$totalData['baseR'].'%)</div></td>';
            $html .= '<td><div class="column">'.number_format($result[1]['basePremium'], 2).'</div></td>';
            for ($i = 0; $i < $totalData['instalment']; ++$i) {
                $html .= '<td><div class="column">'.number_format($result[0]['basePremium'], 2).'</div></td>';
            }
            $html .= '</div></tr>';

            $html .= '<tr><div class="row">';
            $html .= '<td style="text-align: left;"><div class="column">Commission ('.$totalData['commission'].'%)</div></td>';
            $html .= '<td><div class="column">'.number_format($result[1]['commission'], 2).'</div></td>';
            for ($i = 0; $i < $totalData['instalment']; ++$i) {
                $html .= '<td><div class="column">'.number_format($result[0]['commission'], 2).'</div></td>';
            }
            $html .= '</div></tr>';

            $html .= '<tr><div class="row">';
            $html .= '<td style="text-align: left;"><div class="column">Tax ('.$totalData['tax'].'%)</div></td>';
            $html .= '<td><div class="column">'.number_format($result[1]['totalTax'], 2).'</div></td>';
            for ($i = 0; $i < $totalData['instalment']; ++$i) {
                $html .= '<td><div class="column">'.number_format($result[0]['totalTax'], 2).'</div></td>';
            }
            $html .= '</div></tr>';

            $html .= '<tr><div class="row">';
            $html .= '<td style="text-align: left;"><div class="column"><b>Total Cost</b></div></td>';
            $html .= '<td><div class="column">'.number_format($result[1]['totalCost'], 2).'</div></td>';
            for ($i = 0; $i < $totalData['instalment']; ++$i) {
                $html .= '<td><div class="column"><b>'.number_format($result[0]['totalCost'], 2).'</b></div></td>';
            }
            $html .= '</div></tr>';
            $html .= '</table>';
        }

        return $html;
    }

    private function fceil($number)
    {
        $whole = floor($number);
        $fraction = $number - $whole;
        if($fraction > .50) {
            $result = (float) $whole + 1;
        } elseif($fraction <> 0) {
            $result = (float) $whole + .50;
        } else {
            $result = $number;
        }
        return $result;
    }
}
