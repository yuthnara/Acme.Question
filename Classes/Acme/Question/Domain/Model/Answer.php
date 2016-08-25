<?php
namespace Acme\Question\Domain\Model;

/*
 * This file is part of the Acme.Question package.
 */

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class Answer {

	/**
	 * @Flow\Validate(type="NotEmpty")
	 * @Flow\Validate(type="StringLength", options={ "minimum"=1, "maximum"=500 })
	 * @ORM\Column(length=500)
	 * @var string
	 */
	protected $content = '';

	/**
	 * @Flow\Validate(type="NotEmpty")
	 * @var boolean
	 */
	protected $correct = FALSE;

	/**
	 * @Flow\Validate(type="NotEmpty")
	 * @ORM\ManyToOne(inversedBy="answers")
	 * @var Question
	 */
	protected $question;


	/**
	 * @return string
	 */
	public function getContent() {
		return $this->content;
	}

	/**
	 * @param string $content
	 * @return void
	 */
	public function setContent($content) {
		$this->content = $content;
	}

	/**
	 * @return boolean
	 */
	public function isCorrect() {
		return $this->correct;
	}

	/**
	 * @param boolean $correct
	 * @return void
	 */
	public function setCorrect($correct) {
		$this->correct = $correct;
	}

	/**
	 * @return Question
	 */
	public function getQuestion() {
		return $this->question;
	}

	/**
	 * @param Question $question
	 * @return void
	 */
	public function setQuestion($question) {
		$this->question = $question;
	}

}
