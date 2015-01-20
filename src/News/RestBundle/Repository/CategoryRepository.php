<?php

namespace News\RestBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoryRepository extends EntityRepository
{

  /**
   * Get Categories list
   *
   * @author Nguyen Nhu Tuan <tuanquynh0508@gmail.com>
   * @since 1.0
   * @return array
   */
  public function getCategories()
  {
    $q = $this->createQueryBuilder('c');
    $result = $q->getQuery()
                ->getResult();
    return $result;
  }
}
