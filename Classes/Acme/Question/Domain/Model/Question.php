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
class Question {

	/**
	 * @Flow\Validate(type="NotEmpty")
	 * @Flow\Validate(type="StringLength", options={ "minimum"=1, "maximum"=250 })
	 * @ORM\Column(length=250)
	 * @var string
	 */
	protected $content = '';

	/**
	 * @Flow\Validate(type="NotEmpty")
	 * @ORM\ManyToOne(inversedBy="questions")
	 * @var Course
	 */
	protected $course;

	/**
	 * @ORM\OneToMany(mappedBy="question")
	 * @var Collection<Answer>
	 */
	protected $answers;


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
	 * @return Course
	 */
	public function getCourse() {
		return $this->course;
	}

	/**
	 * @param Course $course
	 * @return void
	 */
	public function setCourse($course) {
		$this->course = $course;
	}

	/**
	 * @return Collection
	 */
	public function getAnswers() {
		return $this->answers;
	}

	/**
	 * @param Collection $answers
	 * @return void
	 */
	public function setAnswers(Collection $answers) {
		$this->answers = $answers;
	}

	/**
	 * Adds a answer to this blog
	 *
	 * @param Answer $answer
	 * @return void
	 */
	public function addQuestion(Answer $answer) {
		$this->answers->add($answer);
	}

	/**
	 * Removes a answer from this blog
	 *
	 * @param Answer $answer
	 * @return void
	 */
	public function removeQuestion(Answer $answer) {
		$this->answers->removeElement($answer);
	}

}
