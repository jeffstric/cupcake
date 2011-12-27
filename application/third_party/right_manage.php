<?php

/*
 * author cnbb.com.cn
 */
    class Admin_right{
            protected $num;
            protected $places;
        
            public function __construct($num,$places = NULL){
                if(is_numeric($num)){
                    $this->num = $num;
                    if($places != NULL)
                        $this->places = $places;
                    else {
                        for($i=0;TRUE;$i++){
                            if($num-pow(2,$i)<0){
                                $this->places = $i;
                                break;
                            }
                        }
                    }
                }
                else
                    die('parm illegal');
            }
            
            private function get_R($N){
                return ($this->num/(pow(2,$N-1)))%2;
            }
            private function inverse($N){
                if($this->get_R($N))
                    $this->num = $this->num-pow(2,$this->places-1);
                else
                    $this->num = $this->num+pow(2,$this->places-1);
            }

            public function update_R($N,$bool=NULL){
                $R = $this->get_R($N);
                if($bool !=NULL && $bool = R )
                    ;
                else
                    $this->inverse($this->num, $this->places);
                return $this->Result_R();
            }

            public function Result_R(){
                $result = array();
                for($i = 0 ; $i< $this->places ;$i++){
                   $result[$i]=$this->get_R($i+1);
                }
                return $result;
            }
    }
?>
