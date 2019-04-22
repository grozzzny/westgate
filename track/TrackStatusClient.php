<?php


namespace grozzzny\westgate\track;


use grozzzny\westgate\BaseClient;

class TrackStatusClient extends BaseClient
{
    const OBJECT = 'track';
    const METHOD = 'status';

    public function response($response)
    {
        return $response;
    }

    public function number($number)
    {
        return $this->addParams(['track_no' => $number]);
    }
}
