<?php

/*
 * author cnbb.com.cn
 */
    class Right_manage{
            protected $num;
            protected $places;
            
            public function __construct(){
                
            }
            
            public function init($num,$places = NULL){
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
                return ($this->num/(pow(2,$N)))%2;
            }
            private function inverse($N){
                $num_bak = $this->num;
                if($this->get_R($N))
                    $this->num = $this->num-pow(2,$N);
                else
                    $this->num = $this->num+pow(2,$N);
                if($num_bak == $this->num){
                    fb('权限未被修改');
                    return TRUE;
                }
                else{
                    fb('权限已被修改');
                    return FALSE;
                }
            }

            public function update_R($N,$bool=NULL){
                $R = $this->get_R($N);
                if($bool !=NULL && $bool = R )
                    ;
                else
                    $this->inverse($N);
                return $this->num;
            }

            public function result_R(){
                $result;
                for($i = 0 ; $i< $this->places ;$i++){
                   $result->$i=$this->get_R($i);
                }
                return $result;
            }
    }
?>
