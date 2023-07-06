<?php

namespace App\Http\Controllers\Newsletter;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsletterController extends Controller
{
    public function newsletter(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'email' => 'required|email|unique:subscribers',
        ], [
            'email.required' => 'L\'adresse e-mail est obligatoire.',
            'email.email' => 'L\'adresse e-mail doit être valide.',
            'email.unique' => 'Vous êtes déjà abonné à notre newsletter.',
        ]);
    
        // Créer un nouvel abonné
        $subscriber = new Subscriber();
        $subscriber->email = $validatedData['email'];
        $subscriber->save();
    
        // Rediriger avec un message de succès
        return redirect()->back()->with('success', 'Vous êtes maintenant abonné à notre newsletter !');
    }
}
