<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Base\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use RH\Entity\Noticias;
use Zend\Debug\Debug;
use \DateTime;
class IndexController extends AbstractActionController {

    protected $em;

    public function getEntityManager() {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        }
        return $this->em;
    }

    public function indexAction() {
        $data = new DateTime('now');
        $em = $this->getEntityManager();
        $not = $em->createQuery("SELECT Noticias FROM RH\Entity\Noticias Noticias where Noticias.destaque = 0 and Noticias.publicacao <= '{$data->format('Y-m-d')}' ORDER BY Noticias.idnoticia DESC");
        $noticias = $not->getResult();
        $notdest = $em->createQuery("SELECT Noticias FROM RH\Entity\Noticias Noticias where Noticias.destaque = 1 and Noticias.publicacao <= '{$data->format('Y-m-d')}' ORDER BY Noticias.idnoticia DESC");
        $noticiasdest = $notdest->getResult();
      
        return new ViewModel(array('noticiasdest' => $noticiasdest, 'noticias' => $noticias));
    }

}
