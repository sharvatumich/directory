<?php
namespace Directory\Model;

class Phone
{
    public $AREA_CODE;
    public $TEL_PREFIX;
    public $TEL_NUMBER;
    public $INT_CODE;
    public $CAEN_ID;
    public $TYPE;
    public $DESCRIPTION;
    public $EXTENSION;

    public function exchangeArray($data)
    {
        $this->AREA_CODE        = (!empty($data['AREA_CODE'])) ? $data['AREA_CODE'] : null;

        $this->TEL_PREFIX       = (!empty($data['TEL_PREFIX'])) ? $data['TEL_PREFIX'] : null;

        $this->TEL_NUMBER       = (!empty($data['TEL_NUMBER'])) ? $data['TEL_NUMBER'] : null;
        $this->CAEN_ID          = (!empty($data['CAEN_ID'])) ? $data['CAEN_ID'] : null;
        $this->TYPE             = (!empty($data['TYPE'])) ? $data['TYPE'] : null;
        $this->DESCRIPTION      = (!empty($data['DESCRIPTION'])) ? $data['DESCRIPTION'] : null;
        $this->EXTENSION        = (!empty($data['EXTENSION'])) ? $data['EXTENSION'] : null;

    }
}