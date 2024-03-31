<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VerificationCodes
 *
 * @ORM\Table(name="verification_codes")
 * @ORM\Entity
 */
class VerificationCodes
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=10, nullable=false)
     */
    private $code;


}
