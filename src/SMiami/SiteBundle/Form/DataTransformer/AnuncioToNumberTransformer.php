<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PerfilToNumberTransformer
 *
 * @author piero
 */
namespace SMiami\SiteBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Doctrine\Common\Persistence\ObjectManager;
use SMiami\SiteBundle\Entity\Anuncio;

class AnuncioToNumberTransformer implements DataTransformerInterface
{
    /**
     * @var ObjectManager
     */
    private $om;

    /**
     * @param ObjectManager $om
     */
    public function __construct(ObjectManager $om)
    {
        $this->om = $om;
    }

    /**
     * Transforms an object (anuncio) to a string (number).
     *
     * @param  Anuncio|null $anuncio
     * @return string
     */
    public function transform($anuncio)
    {
        if (null === $anuncio) {
            return "";
        }

        return $anuncio->getId();
    }

    /**
     * Transforms a string (number) to an object (anuncio).
     *
     * @param  string $id
     * @return Anuncio|null
     * @throws TransformationFailedException if object (anuncio) is not found.
     */
    public function reverseTransform($id)
    {
        if (!$id) {
            return null;
        }

        $anuncio = $this->om
            ->getRepository('SiteBundle:Anuncio')
            ->findOneBy(array('id' => $id))
        ;

        if (null === $anuncio) {
            throw new TransformationFailedException(sprintf(
                'El anuncio con id "%s" no existe!',
                $id
            ));
        }

        return $anuncio;
    }
}

?>
