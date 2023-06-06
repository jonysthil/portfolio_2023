<?php

class ImageToWebp {


    public static function convertImageToWebP($source, $destination, $quality = 80) { 

        $origin = './uploads/' . $destination . '/' . $source;
        $destiny = './uploads/' . $destination;
        
        
        $extension = pathinfo($source, PATHINFO_EXTENSION); 
    

        if ($extension == 'jpeg' || $extension == 'jpg')   		
            $image = imagecreatefromjpeg($origin);  	
        elseif ($extension == 'gif')   		
            $image = imagecreatefromgif($origin);  	
        elseif ($extension == 'png')   		
            $image = imagecreatefrompng($origin);  

        return imagewebp($image, $destiny, $quality);  	  
    }

}

?>