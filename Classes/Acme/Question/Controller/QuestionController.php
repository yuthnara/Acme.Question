<?php
namespace Acme\Question\Controller;

/*
 * This file is part of the Acme.Question package.
 */

use Acme\Question\Domain\Model\Course;
use Acme\Question\Domain\Repository\QuestionRepository;
use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Mvc\Controller\ActionController;
use Acme\Question\Domain\Model\Question;

class QuestionController extends ActionController {

	/**
	 * @Flow\Inject
	 * @var QuestionRepository
	 */
	protected $questionRepository;

	/**
	 * @param Course $course
	 *
	 * @return void
	 */
	public function indexAction(Course $course) {
		$this->view->assign('course', $course);
	}

	/**
	 * @param Question $question
	 * @return void
	 */
	public function showAction(Question $question) {
		$this->view->assign('question', $question);
	}

	/**
	 * @param Course $course
	 *
	 * @return void
	 */
	public function newAction(Course $course) {
		$this->view->assign('course', $course);
	}

	/**
	 * @param Question $newQuestion
	 * @return void
	 */
	public function createAction(Question $newQuestion) {
		$this->questionRepository->add($newQuestion);
		$this->addFlashMessage('Created a new question.');
		$this->redirect('index', NULL, NULL, array('course' => $newQuestion->getCourse()));
	}

	/**
	 * @param Question $question
	 * @return void
	 */
	public function editAction(Question $question) {
		$this->view->assign('question', $question);
	}

	/**
	 * @param Question $question
	 * @return void
	 */
	public function updateAction(Question $question) {
		$this->questionRepository->update($question);
		$this->addFlashMessage('Updated the question.');
		$this->redirect('index', NULL, NULL, array('course' => $question->getCourse()));
	}

	/**
	 * @param Question $question
	 * @return void
	 */
	public function deleteAction(Question $question) {
		$this->questionRepository->remove($question);
		$this->addFlashMessage('Deleted a question.');
		$this->redirect('index', NULL, NULL, array('course' => $question->getCourse()));
	}

	/**
	 * @param Course $course
	 * @return void
	 */
	public function appraiseAction(Course $course) {
		$this->view->assign('question', $this->questionRepository->findOneRandomByCourse($course));
	}

}
