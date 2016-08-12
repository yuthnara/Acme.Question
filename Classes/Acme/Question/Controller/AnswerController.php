<?php
namespace Acme\Question\Controller;

/*
 * This file is part of the Acme.Question package.
 */

use Acme\Question\Domain\Model\Question;
use Acme\Question\Domain\Repository\AnswerRepository;
use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Mvc\Controller\ActionController;
use Acme\Question\Domain\Model\Answer;

class AnswerController extends ActionController {

	/**
	 * @Flow\Inject
	 * @var AnswerRepository
	 */
	protected $answerRepository;

	/**
	 * @param Question $question
	 * @return void
	 */
	public function indexAction(Question $question) {
		$this->view->assign('question', $question);
	}

	/**
	 * @param Answer $answer
	 * @return void
	 */
	public function showAction(Answer $answer) {
		$this->view->assign('answer', $answer);
	}

	/**
	 * @param Question $question
	 * @return void
	 */
	public function newAction(Question $question) {
		$this->view->assign('question', $question);
	}

	/**
	 * @param Answer $newAnswer
	 * @return void
	 */
	public function createAction(Answer $newAnswer) {
		$this->answerRepository->add($newAnswer);
		$this->addFlashMessage('Created a new answer.');
		$this->redirect('index', NULL, NULL, array('question' => $newAnswer->getQuestion(), 'course' => $newAnswer->getQuestion()->getCourse()));
	}

	/**
	 * @param Answer $answer
	 * @return void
	 */
	public function editAction(Answer $answer) {
		$this->view->assign('answer', $answer);
	}

	/**
	 * @param Answer $answer
	 * @return void
	 */
	public function updateAction(Answer $answer) {
		$this->answerRepository->update($answer);
		$this->addFlashMessage('Updated the answer.');
		$this->redirect('index', NULL, NULL, array('question' => $answer->getQuestion(), 'course' => $answer->getQuestion()->getCourse()));
	}

	/**
	 * @param Answer $answer
	 * @return void
	 */
	public function deleteAction(Answer $answer) {
		$this->answerRepository->remove($answer);
		$this->addFlashMessage('Deleted a answer.');
		$this->redirect('index', NULL, NULL, array('question' => $answer->getQuestion(), 'course' => $answer->getQuestion()->getCourse()));
	}

}
