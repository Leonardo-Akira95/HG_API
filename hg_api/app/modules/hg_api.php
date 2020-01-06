<?php

class hg_api{

    private $key = null;
    private $erro = false;

    public function __construct($key=null){
        if(!empty($key)) $this->key = $key;
    }

    public function request($endpoint = '', $parametros = array()){
        $url = "https://api.hgbrasil.com/" . $endpoint . "?key=" . $this->key . "&format=json";

        if(is_array($parametros)){
            foreach($parametros as $key=>$value){
                if(empty($value)) continue;
                $url .= $key . '=' . urlencode($value) . '&';
            }
            $url = substr($url, 0, -1);
            $response = @file_get_contents($url);
            $this->erro = false;

            return json_decode($response, true);
        }else{
            $this->erro = true;
            return false;
        }
    }

    public function getErro(){
        $this->erro;
    }

    public function requestDollar(){
        $data = $this->request('finance');
        $dollar = $data['results']['currencies']['USD'];

        if(!empty($data) && is_array($dollar)){
            $this->erro = false;
            return $dollar;
        }else{
            $this->erro = true;
            return false;
        }
    }

    public function requestEuro(){
        $data = $this->request('finance');
        $euro = $data['results']['currencies']['EUR'];

        if(!empty($data) && is_array($euro)){
            $this->erro = false;
            return $euro;
        }else{
            $this->erro = true;
            return false;
        }
    }

    public function requestBitcoin(){  
        $data = $this->request('finance');
        $bitcoin = $data['results']['currencies']['BTC'];

        if(!empty($data) && is_array($bitcoin)){
            $this->erro =false;
            return $bitcoin;
        }else{
            $this->erro = true;
            return false;
        }

    }
}

?>