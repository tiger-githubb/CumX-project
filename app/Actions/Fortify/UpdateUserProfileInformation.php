<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, string>  $input
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],

            'image' => ['nullable', 'image', 'max:2048'], // Ajout de la validation pour l'image
            
        ])->validateWithBag('updateProfileInformation');

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {

            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
            ]);

            // Vérifie si une nouvelle image a été téléchargée
            if (isset($input['image'])) {

                // Supprime l'ancienne image si elle existe
                if ($user->image) {
                    $this->deleteImage($user->image);
                }
                
                $uploadedImage = $input['image'];
                $imagePath = $this->uploadImage($uploadedImage);
                $user->image = $imagePath;
            }
    
            $user->save();
        }
    }

    private function deleteImage(string $imagePath): void
    {
        if (Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }
    }

    private function uploadImage(UploadedFile $uploadedImage): string
    {
        $image = Image::make($uploadedImage);
        $imageName = uniqid() . '.' . $uploadedImage->getClientOriginalExtension();
        $imagePath = 'avatars/' . $imageName;
        Storage::disk('public')->put($imagePath, $image->stream());
        return $imagePath;
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
