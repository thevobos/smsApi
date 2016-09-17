# Ileti-Merkezi-Api-Class


*
*	AUTHOR   : Cengiz Akcan
*	Mail     : cengiz@polotasarim.com
*   Project  : Ileti merkezi basic api class 
*	Github	 : github.com/cengizakcan1996
*	Facebook : fb.com/cengizakcan1996
*   Gsm      : 05413509697
*



        include("Iletimerkezi.php");

        $Iletimerkezi = new Iletimerkezi();

		/*
			->addnumber(" NUMARA ");
			
			Bu parametre çogaltılarak toplu sms atılabilir.
			
			
		*/
		
        // Klasik Normal & Toplu Sms Yollama
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


        // Bakiye Sorgulama
        $Status = $Iletimerkezi
					->url("status")
					->username(" KULLANICI ADI ")
					->password(" ŞİFRE ")
					->status()
					->send();
		// Çıktı
		print_r($Status);
			
