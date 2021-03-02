<?php

if (!function_exists('getSegment')) {

    function getSegment(int $number)
    {
        $request = \Config\Services::request();

        if ($request->uri->getTotalSegments() >= $number && $request->uri->getSegment($number)) {
            return $request->uri->getSegment($number);
        } else {
            return false;
        }
    }
}
