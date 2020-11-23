<?php
namespace ExtbaseBook\Simpleblog\Controller;
use ExtbaseBook\Simpleblog\Domain\Repository\AuthorRepository;
use ExtbaseBook\Simpleblog\Domain\Repository\TagRepository;
use \TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use \ExtbaseBook\Simpleblog\Domain\Model\Blog;
use \ExtbaseBook\Simpleblog\Domain\Model\Post;
use \ExtbaseBook\Simpleblog\Domain\Repository\PostRepository;
use \ExtbaseBook\Simpleblog\Domain\Repository\BlogRepository;
class PostController extends ActionController
{
    /**
     * @var PostRepository
     */
    protected $postRepository;
    /**
     * @param PostRepository $postRepository
     */
    public function injectBlogRepository(PostRepository $postRepository): void
    {
        $this->postRepository = $postRepository;
    }
    /**
     * @param Blog $blog
     * @param Post $post
     */
    public function addFormAction(Blog $blog, Post $post = null): void
    {
        $this->view->assign('blog', $blog);
        $this->view->assign('post', $post);
        $this->view->assign('tags', $this->objectManager->get(TagRepository::class)->findAll());
        $this->view->assign('authors', $this->objectManager->get(AuthorRepository::class)->findAll());
    }


    /**
     * @param Blog $blog
     * @param Post $post
     */
    public function addAction(Blog $blog, Post $post = null): void
    {
// $post->setPostdate(new \DateTime());
        $this->postRepository->add($post);
        $blog->addPost($post);
        $this->objectManager->get(BlogRepository::class)->update($blog);
        $this->redirect('show', 'Blog', null, ['blog' => $blog]);
    }


    /**
     * @param Blog $blog
     * @param Post $post
     */
    public function showAction(Blog $blog, Post $post): void
    {
        $this->view->assign('blog', $blog);
        $this->view->assign('post', $post);
    }



    /**
     * @param Blog $blog
     * @param Post $post
     */
    public function updateFormAction(Blog $blog, Post $post)
    {
        $this->view->assign('blog', $blog);
        $this->view->assign('post', $post);
        $this->view->assign('tags', $this->objectManager->get(TagRepository::class)->findAll());
        $this->view->assign('authors', $this->objectManager->get(AuthorRepository::class)->findAll());
    }
    /**
     * @param Blog $blog
     * @param Post $post
     */
    public function updateAction(Blog $blog, Post $post)
    {
        $this->postRepository->update($post);
        $this->redirect('show', 'Blog', null, ['blog' => $blog]);
    }
    /**
     * @param Blog $blog
     * @param Post $post
     */
    public function deleteConfirmAction(Blog $blog, Post $post)
    {
        $this->view->assign('blog', $blog);
        $this->view->assign('post', $post);
    }
    /**
     * @param Blog $blog
     * @param Post $post
     */
    public function deleteAction(Blog $blog, Post $post)
    {
        $blog->removePost($post);
        $this->objectManager->get(BlogRepository::class)->update($blog);
        $this->postRepository->remove($post);
        $this->redirect('show', 'Blog', null, ['blog' => $blog]);
    }


}