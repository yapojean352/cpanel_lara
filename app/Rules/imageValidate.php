<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class imageValidate implements Rule
{
    protected $img1;
    protected $img2;
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
        //test
       
        if ($this->img2) {
            foreach ($this->img2 as $s) {
                if (count($this->img1) <= count(($s)->photos) && count(($s)->photos)<=4 ) {
                    return true;
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
        return 'vous devez telecharger maximum 4 images.';
    }
}
