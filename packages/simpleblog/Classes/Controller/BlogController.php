<?php
namespace ExtbaseBook\Simpleblog\Controller;


use \ExtbaseBook\Simpleblog\Domain\Model\Blog;

use \TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use \ExtbaseBook\Simpleblog\Domain\Repository\BlogRepository;
use \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
class BlogController extends ActionController
{
    /**
     * @var BlogRepository
     */
    protected $blogRepository;
    /**
     * @param BlogRepository $blogRepository
     */
    public function injectBlogRepository(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }
    /**
     * @param string $search
     */
    public function listAction()
    {

        $search = '';
        if ($this->request->hasArgument('search')) {
            $search = $this->request->getArgument('search');
        }
        $limit = ($this->settings['blog']['max']) ?: null;
        $this->view->assign('blogs', $this->blogRepository->findSearchForm($search, $limit));
        $this->view->assign('search', $search);
    }
    /**
     * @param Blog $blog
     */
    public function addAction(Blog $blog)
    {
        $this->blogRepository->add($blog);
        $this->redirect('list');
    }
    /**
     * @param Blog $blog
     */
    public function addFormAction(Blog $blog=null){

            $this->view->assign('blog',$blog);
    }
    /**
     * @param Blog $blog
     */
    public function showAction(Blog $blog)
    {
        $this->view->assign('blog', $blog);
    }
    /**
     * @param Blog $blog
     */
    public function updateFormAction(Blog $blog)
    {
        $this->view->assign('blog', $blog);
    }
    /**
     * @param Blog $blog
     */
    public function updateAction(Blog $blog)
    {
        $this->blogRepository->update($blog);
        $this->redirect('list');
    }

    /**
     * @param Blog $blog
     */
    public function deleteAction(Blog $blog)
    {
        $this->blogRepository->remove($blog);
        $this->redirect('list');
    }
}
