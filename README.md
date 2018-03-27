# Ileti-Merkezi-Api-Class


*
*	AUTHOR   : Cengiz Akcan
*	Mail     : cengiz@zekicetasarim.com
*   	Project  : Ileti merkezi basic api class 
*	Github	 : github.com/cengizakcan1996
*	Facebook : fb.com/cengizakcan1996
*   	Gsm      : 05413509697
*



        include("Iletimerkezi.php");

        $Iletimerkezi = new Iletimerkezi();

		/*
			->addnumber(["05555555555","05333333333","05411111111"]);
			
			Bu parametre içerisindeki array değerlerine numaraları yazarak toplu sms atabilirsiniz yada tek numara ile tek sms gönderimi sağlayabilirsiniz.
			
			
		*/
		
        # Klasik Normal & Toplu Sms Yollama
        $Sms = $Iletimerkezi
			->url("send")
			->username(" KULLANICI ADI ")
			->password(" ŞİFRE ")
			->title(" SMS BAŞLIGI ")
			->addnumber([" Numara "," Numara ",....." Numara "])
			->text(" GÖNDERİLECEK MESAJ ")
			->sms()
			->send();

		// Çıktı
		print_r($Sms);
		
		// Sonuçlara erişmek için 
		 $Sms->status->code;	
                 $Sms->status->message;	
                 $Sms->order->id;

        # Bakiye Sorgulama
        $Status = $Iletimerkezi
			->url("status")
			->username(" KULLANICI ADI ")
			->password(" ŞİFRE ")
			->status()
			->send();
		// Çıktı
		print_r($Status);
		
		// Sonuçlara erişmek için 
		 $Status->status->code;	
                 $Status->status->message;	
                 $Status->balance->amount;
                 $Status->balance->sms;

