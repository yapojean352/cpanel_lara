<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class imageValidateUpdate implements Rule
{
    protected $img1;
    protected $img2;
    protected $message;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($img1, $img2)
    {
        $this->img1 = $img1;
        $this->img2 = $img2;
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($this->img2) {
            foreach ($this->img2 as $s) {
                if (count($this->img1) <= 4 && count(($s)->photos) <= 4
                 && (count($this->img1) + count(($s)->photos))<=4) {
                    
                    return true;
                }else{
                    $this->message='vous devez ajouter  '.abs((count(($s)->photos)-4)).' photos';
                   return false ;
                };

            }
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return  $this->message;
    }
}
