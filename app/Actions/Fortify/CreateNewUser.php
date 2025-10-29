<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255', 'regex:/^[A-Za-z\s]+$/'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'gender' => ['required', Rule::in(['Laki-laki', 'Perempuan', 'Lainnya'])],
            'phone' => ['required', 'string', 'max:15', 'regex:/^[0-9]+$/'],
            'g-recaptcha-response' => ['required'],
        ])->validate();

        // Verify reCAPTCHA
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret_key'),
            'response' => $input['g-recaptcha-response'] ?? '',
        ]);

        $verify = $response->json();

        if (!($verify['success'] ?? false)) {
            throw ValidationException::withMessages([
                'captcha' => ['Verifikasi reCAPTCHA gagal, coba lagi.'],
            ]);
        }

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'gender' => $input['gender'] ?? null,
            'phone' => $input['phone'],
            'role' => 'user',
            'email_verified_at' => now(),
        ]);
    }
}
