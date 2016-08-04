<?php
namespace Acme\Question\Controller;

/*
 * This file is part of the Acme.Question package.
 */

use Acme\Question\Domain\Repository\CourseRepository;
use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Mvc\Controller\ActionController;
use Acme\Question\Domain\Model\Course;

class CourseController extends ActionController {

	/**
	* @Flow\Inject
	* @var CourseRepository
	*/
	protected $courseRepository;

	/**
	* @return void
	*/
	public function indexAction() {
		$this->view->assign('courses', $this->courseRepository->findAll());
	}

	/**
	* @param Course $course
	* @return void
	*/
	public function showAction(Course $course) {
		$this->view->assign('course', $course);
	}

	/**
	* @return void
	*/
	public function newAction() {
	}

	/**
	* @param Course $newCourse
	* @return void
	*/
	public function createAction(Course $newCourse) {
		$this->courseRepository->add($newCourse);
		$this->addFlashMessage('Created a new course.');
		$this->redirect('index');
	}

	/**
	* @param Course $course
	* @return void
	*/
	public function editAction(Course $course) {
		$this->view->assign('course', $course);
	}

	/**
	* @param Course $course
	* @return void
	*/
	public function updateAction(Course $course) {
		$this->courseRepository->update($course);
		$this->addFlashMessage('Updated the course.');
		$this->redirect('index');
	}

	/**
	* @param Course $course
	* @return void
	*/
	public function deleteAction(Course $course) {
		$this->courseRepository->remove($course);
		$this->addFlashMessage('Deleted a course.');
		$this->redirect('index');
	}

}
