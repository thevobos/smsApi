<?php

class Iletimerkezi
{


    /*
     * Atanan değişkenler
     * */
    public $username        = "";
    public $password        = "";
    public $title           = "";
    public $text            = "";
    public $numbers         = array();
    public $numbersexp      = array();
    public $date            = "";
    public $xml             = "";
    public $url             = "";
    public $header          = array('Content-Type: text/xml');


    /*
     * @ Mixed
     * # Bu fonksiyon bakiye durumu ve sms gönderimi için seçim yapılması içindir.
     * */
    public function url($url = "send"){

        if($url == "send"){

            $this->url =   "http://api.iletimerkezi.com/v1/send-sms";

        }
        else if ($url = "status"){

            $this->url = "http://api.iletimerkezi.com/v1/get-balance";
        }

        return $this;


    }

    /*
     * @ Mixed
     * # Kullanıcı adınız - ( GSM NO )
     * */
    public function username($username = ""){

        $this->username =   $username;
        return $this;

    }

    /*
     * @ Mixed
     * # Kullanıcı şifreniz.
     * */
    public function password($password = ""){

        $this->password =   $password;
        return $this;

    }

    /*
     * @ Mixed
     * # iletimerkezi.com'da kayıtlı sms başlığınızı gireceksiniz.
     * */
    public function title($title = ""){

        $this->title    =   $title;
        return $this;

    }

    /*
     * @ Mixed
     * # Gönderilecek olan sms bilgisini yazacagınız fonksiyon
     * */
    public function text($text = ""){

        $this->text    =   $text;
        return $this;

    }

    /*
     * @ Mixed
     * # İleri tarihli bir sms atılacaksa tarihi girilmelidir örnek olarak GG/AA/YYYY SS:DD formatında olamlıdır
     * */
    public function date($date = ""){

        $this->date = $date;
        return $this;

    }

    /*
     * @ Mixed
     * Bu alan çoklu numara girişi yapabilirsiniz. bu alanı sadece sms gönderirken kullanabilirsiniz.
     * */
    public function addnumber(array $array = []){

        $this->numbers[] = $array;
        return $this;

    }

    /* Sistem Numara Listesi */
    public function numberlist(){

        return implode(",",$this->numbers[0]);

    }

    /* Sms Gönderimi */
    public function sms(){



        $this->xml =  <<<EOS
<request>
     <authentication>
         <username>{$this->username}</username>
         <password>{$this->password}</password>
     </authentication>

     <order>
         <sender>{$this->title}</sender>
         <sendDateTime>{$this->date}</sendDateTime>
         <message>
             <text>{$this->text}</text>
             <receipents>{$this->numberlist() }</receipents>
         </message>
     </order>
</request>
EOS;
        return $this;

    }

    /* Bakiye Sorgulama */
    public function status(){

        $this->xml =  <<<EOS
<request>
     <authentication>
         <username>{$this->username}</username>
         <password>{$this->password}</password>
     </authentication>
</request>
EOS;
        return $this;

    }


    public function send(){

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$this->url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->xml);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$this->header);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 120);

        return simplexml_load_string(curl_exec($ch));




    }


}
