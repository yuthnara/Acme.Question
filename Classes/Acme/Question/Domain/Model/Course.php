<?php
namespace Acme\Question\Domain\Model;

/*
 * This file is part of the Acme.Question package.
 */

use Doctrine\Common\Collections\Collection;
use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class Course {

	/**
	 * @Flow\Validate(type="NotEmpty")
	 * @Flow\Validate(type="StringLength", options={ "minimum"=3, "maximum"=80 })
	 * @ORM\Column(length=80)
	 * @var string
	 */
	protected $title;

	/**
	 * @Flow\Validate(type="StringLength", options={ "maximum"=250 })
	 * @ORM\Column(length=250)
	 * @var string
	 */
	protected $description = '';

	/**
	 * @ORM\OneToMany(mappedBy="course")
	 * @var Collection<Question>
	 */
	protected $questions;


	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * @return Collection
	 */
	public function getQuestions() {
		return $this->questions;
	}

	/**
	 * @param Collection $questions
	 * @return void
	 */
	public function setQuestions(Collection $questions) {
		$this->questions = $questions;
	}

	/**
	 * Adds a question to this blog
	 *
	 * @param Question $question
	 * @return void
	 */
	public function addQuestion(Question $question) {
		$this->questions->add($question);
	}

	/**
	 * Removes a question from this blog
	 *
	 * @param Question $question
	 * @return void
	 */
	public function removeQuestion(Question $question) {
		$this->questions->removeElement($question);
	}

}
