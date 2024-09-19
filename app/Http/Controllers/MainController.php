<?php

namespace App\Http\Controllers;

use App\Models\Number;
use PDF;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function generate(Request $request)
    {
        $values = [4, 9, 2, 3, 5, 7, 8, 1, 6];
        $dob = date('d-m-Y', strtotime($request->dob));



        list($day, $month, $year) = explode('-', $dob);

        $sumDigitsDay = $this->sumOfDigits($day);
        $sumDigitsMonth = $this->sumOfDigits($month);
        $sumDigitsYear = $this->sumOfDigits($year);
        $digits = $day . $month . $year;
        $totalDigitSum = $this->sumOfDigits($digits);

        $digitCounts = array_fill(1, 9, 0);

        for ($i = 0; $i < strlen($digits); $i++) {
            $digit = (int)$digits[$i];
            if ($digit >= 1 && $digit <= 9) {
                $digitCounts[$digit]++;
            }
        }

        $digitCounts[$sumDigitsDay]++;
        $digitCounts[$totalDigitSum]++;


        $found = [];
        $missing = [];
        foreach ($values as $key => $value) {
            if ($digitCounts[$value] != 0) {
                for ($j = 1; $j < $digitCounts[$value]; $j++) {
                    $values[$key] .= $value;
                }
            } else {
                $values[$key] = $value . 'x';
            }

            if (strpos($values[$key], 'x') !== false) {
                $missing[] = $value; // Contains 'x'
            } else {
                $found[] = $value; // Does not contain 'x'
            }
        }

        $number = Number::get();


        // print_r($found);



        return view('generate', compact('values', 'number', 'found', 'missing'));
    }


    private function sumOfDigits($number)
    {
        $sum = array_sum(str_split($number));
        return strlen($sum) > 1 ? $this->sumOfDigits($sum) : $sum;
    }


    // public function generatePDF()
    // {
    //     $values = [4, 9, 2, 3, 5, 7, 8, 1, 6];
    //     $dob = date('d-m-Y', strtotime('19-12-1998'));



    //     list($day, $month, $year) = explode('-', $dob);

    //     $sumDigitsDay = $this->sumOfDigits($day);
    //     $sumDigitsMonth = $this->sumOfDigits($month);
    //     $sumDigitsYear = $this->sumOfDigits($year);
    //     $digits = $day . $month . $year;
    //     $totalDigitSum = $this->sumOfDigits($digits);

    //     $digitCounts = array_fill(1, 9, 0);

    //     for ($i = 0; $i < strlen($digits); $i++) {
    //         $digit = (int)$digits[$i];
    //         if ($digit >= 1 && $digit <= 9) {
    //             $digitCounts[$digit]++;
    //         }
    //     }

    //     $digitCounts[$sumDigitsDay]++;
    //     $digitCounts[$totalDigitSum]++;


    //     $found = [];
    //     $missing = [];
    //     foreach ($values as $key => $value) {
    //         if ($digitCounts[$value] != 0) {
    //             for ($j = 1; $j < $digitCounts[$value]; $j++) {
    //                 $values[$key] .= $value;
    //             }
    //         } else {
    //             $values[$key] = $value . 'x';
    //         }

    //         if (strpos($values[$key], 'x') !== false) {
    //             $missing[] = $value; // Contains 'x'
    //         } else {
    //             $found[] = $value; // Does not contain 'x'
    //         }
    //     }

    //     $number = Number::get();

    //     // Load the view and pass the data to it
    //     $pdf = PDF::loadView('print', compact('values', 'number', 'found', 'missing'));

    //     // Download the PDF
    //     return $pdf->download('laravel_pdf_example.pdf');
    // }
}
