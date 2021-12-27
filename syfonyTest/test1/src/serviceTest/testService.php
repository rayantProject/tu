<?php
// le app est du au fait qu'on est dans src
namespace App\serviceTest;

class testService{

    public function age(int $anne)
    {
        return 2021 - $anne;
    }
}


