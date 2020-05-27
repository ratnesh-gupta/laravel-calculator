<?php

namespace Likeaway\Calculator\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    /**
     * Addition of 2 integere type values.
     *
     * @param mixed $a
     * @param mixed $b
     *
     *
     */
    public function add(Request $request, $a, $b)
    {
        try {
            $add = $a + $b;
        } catch (Exception $e) {
            return response()->error($e->getMessage(), $e->getCode());
        }
        return response()->success('a + b', compact('add'));
    }

    /**
     * Subtraction of 2 integer values
     *
     * @param mixed $a
     * @param mixed $b
     *
     * @return \Illuminate\View\View
     */
    public function subtract($a, $b)
    {
        try {
            $subtract = $a - $b;
        } catch (Exception $e) {
            return response()->error($e->getMessage(), $e->getCode());
        }
        return response()->success('a - b', compact('subtract'));
    }
}
