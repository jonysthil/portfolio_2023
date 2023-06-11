<?php
//clase para funciones que pueden ayudar
class Tools {

    public static function exist_image($folder, $nombre) {
        if ($nombre == NULL || $nombre == ''){
            return "assets/admin/app-assets/images/no-photo.png";
        } elseif (file_exists('uploads/'.$folder.'/'.$nombre)) {
            return 'uploads/'.$folder.'/'.$nombre;
        } else {
            return "assets/admin/app-assets/images/no-photo.png";
        }
    }

    public static function clean_text($depurar) {

        $depurar = trim($depurar);
        
        $depurar = str_replace(array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'), array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'), $depurar);
        
        $depurar = str_replace(array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'), array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'), $depurar);
        
        $depurar = str_replace(array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'), array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'), $depurar);
        
        $depurar = str_replace(array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'), array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'), $depurar);
        
        $depurar = str_replace(array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'), array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'), $depurar);
        
        $depurar = str_replace(array('ñ', 'Ñ', 'ç', 'Ç'), array('n', 'N', 'c', 'C',), $depurar);
    
        $depurar = str_replace(array("\\", "¨", "º", "-", "~", "#", "@", "|", "!", "\"", "·", "$", "%", "&", "/", "(", ")", "?", "'", "¡", "¿", "[", "^", "`", "]", "+", "}", "{", "¨", "´", ">", "< ", ";", ",", ":", " "), "-", $depurar);
        
        return strtolower($depurar); 
    }

    public static function months($m) {
        $month = array(
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December" 
        );
        return $month[$m];
    }

}

?>