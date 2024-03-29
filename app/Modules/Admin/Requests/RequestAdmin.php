<?php

namespace App\Modules\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class RequestAdmin extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'bail|required||email',
            'password' => 'bail|required|min:8'
        ];
    }

    /**
     * Get the authorization credentials from the request.
     * @return array
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     * */
    public function getCredentials()
    {
        $email = $this->get('email');

        if ($this->isEmail($email)) {
            return [
                'email' => $email,
                'password' => $this->get('password')
            ];
        }

        return $this->only('email', 'password');
    }

    /**
     * Validate if provided parameter is valid email.
     *
     * @param $param
     * @return bool
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     * */
    private function isEmail($param)
    {
        $factory = $this->container->make(ValidationFactory::class);

        return !$factory->make(
            ['email' => $param],
            ['email' => 'email']
        )->fails();
    }

    /**
     *
     * */
}
