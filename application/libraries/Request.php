<?php
class RequestData{
    private $val;

    public function __construct($val){
        $this->val = $val;
    }

    public function setVal($val){
        $this->val = $val;
    }

    public function getVal(){
        return $this->val;
    }

    public function setUploadImage($varName,$dir){
        $uploaddir = 'uploads/';
        $target_file = $uploaddir . basename($_FILES[$varName]['name']);

        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $filename = round(microtime(true)) . '.' . $imageFileType;
        $uploadfile = "$dir".$uploaddir . $filename;
        while(true){
            if(file_exists($uploadfile)){
                $filename = round(microtime(true)) . '.' . $imageFileType;
                $uploadfile = $uploaddir . $filename;
            }
            else
                break;
        }
        $this->val = $uploaddir . $filename;

        move_uploaded_file($_FILES[$varName]['tmp_name'] , $uploadfile);

        return $this->val;
    }

    public function isValidImage($varName){
        $uploaddir = 'uploads/';
        $target_file = $uploaddir . basename($_FILES[$varName]['name']);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg")
            return false;
        else
            return true;
    }

    public function isValidText(){
        return (preg_match('/^[a-zA-Z0-9_]+$/', $this->val)); // cuma boleh alphabet, angka, dan underscore
    }

    public function isValidLength($minLength = -1, $maxLength = 255){
        return (strlen($this->val) > $minLength && strlen($this->val) < $maxLength);
    }
    
    public function isValidBirthDate(){
        $minDate = new DateTime('1920-01-01'); // date ga boleh lebih kecil dari ini
        $minDate = $minDate->format('Y-m-d'); 
        $maxDate = date('Y-m-d', time()); // date ga boleh lebih besar dari waktu sekarang

        return ($this->val >= $minDate && $this->val <= $maxDate);
    }

    public function isValidUsername(){
        return ($this->isValidLength(3, 255) && $this->isValidText());
    }

    public function isValidEmail(){
        $clean_email = filter_var($this->val, FILTER_SANITIZE_EMAIL);
        return ($this->val == $clean_email && filter_var($clean_email, FILTER_VALIDATE_EMAIL));
    }

    public function isValidPassword(){
        return $this->isValidLength(6, 255);
    }
}

class Request{
    public static function get($varName, $defaultValue = false){
        if (isset($_GET[$varName]))
            return new RequestData($_GET[$varName]);

        return new RequestData($defaultValue);
    }

    public static function post($varName, $defaultValue = false){
        if (isset($_POST[$varName]))
            return new RequestData($_POST[$varName]);

        return new RequestData($defaultValue);
    }

}
?>
