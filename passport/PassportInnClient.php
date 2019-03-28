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

    public function passportParams($name, $date_of_birth, $passport, $passport_date, $passport_code)
    {
        return $this->addParams([
            'name' => $name,
            'date_of_birth' => $date_of_birth,
            'passport' => $passport,
            'passport_date' => $passport_date,
            'passport_code' => $passport_code,
        ]);
    }
}
