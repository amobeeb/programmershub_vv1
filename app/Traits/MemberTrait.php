<?php
namespace App\Traits; 

trait MemberTrait{
    private $alias;
    public function check_member_gender($gender){
        if($gender == 'male'){
            $alias = "Brogrammer";
        }else{
            $alias = "Sisgrammer";
        }
        return $alias;
    }
}