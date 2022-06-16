<?php 

class Push {
    private $title;
    private $message;
    private $image;
    private $is_background;
    // private $patientid;
    // private $patientname;

    function __construct() {        
    }
    
    public function setTitle($title) {
        $this->title = $title;
    }

    // public function setPatientId($patientid) {
    //     $this->patientid = $patientid;
    // }

    // public function setPatientName($patientname) {
    //     $this->patientname = $patientname;
    // }

    public function setMessage($message) {
        $this->message = $message;
    }

    public function setImage($image) {
        $this->image = $image;
    }
    public function setIsBackground($is_background) {
        $this->is_background = $is_background;
    }
    //getting the push notification
    public function getPush() {
        $res = array();
        $res['data']['title'] = $this->title;
        $res['data']['message'] = $this->message;
        $res['data']['image'] = $this->image;
        // $res['data']['patientid'] = $this->patientid;
        // $res['data']['patientname'] = $this->patientname;
        $res['data']['timestamp'] = date('Y-m-d G:i:s');
        return $res;
    }
 
}