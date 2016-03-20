<?php

namespace Bolt\Extension\AuthorName\Stencil\Storage\Repository;

use Bolt\Extension\AuthorName\Stencil\Storage\Entity;
use Bolt\Storage\Repository;

/**
 * Stencil repository.
 *
 * @author Your Name <you@example.com>
 */
class Stencil extends Repository
{
    /**
     * Fetches all stencil records.
     *
     * @return Entity\Stencil[]
     */
    public function getStencils()
    {
        $query = $this->getStencilsQuery();

        return $this->findWith($query);
    }

    public function getStencilsQuery()
    {
        $qb = $this->createQueryBuilder();
        $qb->select('*');

        return $qb;
    }

    /**
     * Fetches a single stencil records.
     *
     * @param string $stencil
     *
     * @return Entity\Stencil
     */
    public function Stencil($stencil)
    {
        $query = $this->getStencilQuery($stencil);

        return $this->findOneWith($query);
    }

    public function getStencilQuery($stencil)
    {
        $qb = $this->createQueryBuilder();
        $qb->select('*')
            ->where('stencil = :stencil')
            ->setParameter('stencil', $stencil)
        ;

        return $qb;
    }
}
