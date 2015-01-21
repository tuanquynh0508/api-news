<?php

namespace News\RestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

//For FOSRestController
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\Controller\Annotations\QueryParam;
//For API DOC
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class ApiController extends FOSRestController
{

  /**
     * Get single Article.
     *
     * @QueryParam(name="id", requirements="\d+", default=0, description="Id of article")
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Gets a Article for a given id",
     *   output = "News\RestBundle\Entity\Article",
     *   section="Article",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the article is not found"
     *   }
     * )
     *
     * @Annotations\View(
     *  template = "NewsRestBundle:Api:getArticle.html.twig",
     *  templateVar = "article"
     * )
     *
     * @param Request $request the request object
     *
     * @return News\RestBundle\Entity\Article
     *
     * @throws NotFoundHttpException when article not exist
     */
    public function getArticleAction(Request $request)
    {
      $id = $request->get('id');
      if(!$id) {
        $id = 0;
      }

      $em = $this->getDoctrine()->getManager();
      $article = $em->getRepository('NewsRestBundle:Article')->getArticle($id);

      if (!$article) {
        throw $this->createNotFoundException('No article found');
      }

      return array(
        'code' => 200,
        'article' => $article,
      );
    }

    /**
     * Get list Articles
     *
     * @QueryParam(name="limit", requirements="\d+", default=10, description="Limit number of return records")
     * @QueryParam(name="page", requirements="\d+", default=1, description="Page current")
     * @QueryParam(name="category_id", requirements="\d+", default=0, description="Category id of article")
     *
     * @ApiDoc(
     *   resource = true,
     *   section="Article",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the article is not found"
     *   }
     * )
     *
     * @Annotations\View(
     *  template = "NewsRestBundle:Api:getArticles.html.twig",
     *  templateVar = "article"
     * )
     *
     * @param Request $request the request object
     *
     * @return array
     *
     * @throws NotFoundHttpException when article not exist
     */
    public function getArticlesAction(Request $request)
    {
      $page = $request->get('page');
      if(!$page) {
        $page = 1;
      } else {
        $page = abs($page);
      }

      $limit = $request->get('limit');
      if(!$limit) {
        $limit = 10;
      } else {
        $limit = (abs($limit)>50)?50:abs($limit);
      }

      $category_id = $request->get('category_id');
      if(!$category_id) {
        $category_id = 0;
      } else {
        $category_id = abs($category_id);
      }

      $em = $this->getDoctrine()->getManager();
      $list = $em->getRepository('NewsRestBundle:Article')->getArticles($page, $limit, $category_id);

      if (!$list) {
        throw $this->createNotFoundException('No articles found');
      }

      return array(
        'code' => 200,
        'list' => $list,
      );
    }

    /**
     * Get list Category
     *
     * @ApiDoc(
     *   resource = true,
     *   section="Category",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the article is not found"
     *   }
     * )
     *
     * @Annotations\View(
     *  template = "NewsRestBundle:Api:getCategories.html.twig",
     *  templateVar = "category"
     * )
     *
     * @param Request $request the request object
     *
     * @return array
     *
     * @throws NotFoundHttpException when article not exist
     */
    public function getCategoriesAction(Request $request)
    {
      $em = $this->getDoctrine()->getManager();
      $list = $em->getRepository('NewsRestBundle:Category')->getCategories();

      if (!$list) {
        throw $this->createNotFoundException('No category found');
      }

      return array(
        'code' => 200,
        'list' => $list,
      );
    }

}
