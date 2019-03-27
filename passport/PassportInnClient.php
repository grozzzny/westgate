<?php


namespace grozzzny\westgate\passport;


use grozzzny\westgate\BaseClient;

class PassportInnClient extends BaseClient
{
    const OBJECT = 'passport';
    const METHOD = 'inn';

    public function response($response)
    {
        return $response;
    }

    public function passportParams($fio, $birthdate, $docnum, $docdt, $dcode)
    {
        return $this->addParams([
            'fio' => $fio,
            'birthdate' => $birthdate,
            'docnum' => $docnum,
            'docdt' => $docdt,
            'dcode' => $dcode,
        ]);
    }
}