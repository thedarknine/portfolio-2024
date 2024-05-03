<?php

/**
 * This file is part of Portfolio project.
 * (c) Caroline Noyer <hello@carolinenoyer.info>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact
{
    #[Assert\NotBlank(message: 'Merci de remplir votre nom')]
    #[Assert\Length(min: 3, max: 200, minMessage: 'Doit contenir 3 caractères minimum', maxMessage: 'Doit contenir 200 caractères maximum')]
    public string $name = '';

    #[Assert\NotBlank(message: 'Merci de remplir votre email')]
    #[Assert\Email(message: 'Merci de saisir une adresse valide')]
    public string $email = '';

    #[Assert\NotBlank(message: 'Merci de saisir un message')]
    #[Assert\Length(min: 10, minMessage: 'Doit contenir 10 caractères minimum')]
    public string $message = '';
}
