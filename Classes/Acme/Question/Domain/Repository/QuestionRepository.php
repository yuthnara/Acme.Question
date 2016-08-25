<?php
namespace Acme\Question\Domain\Repository;

/*
 * This file is part of the Acme.Question package.
 */

use Acme\Question\Domain\Model\Course;
use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Persistence\QueryResultInterface;
use TYPO3\Flow\Persistence\Repository;

/**
 * @Flow\Scope("singleton")
 */
class QuestionRepository extends Repository {

	/**
	 * Find random
	 *
	 * @param Course $course
	 * @return QueryResultInterface
	 */
	public function findOneRandomByCourse(Course $course) {
		$query = $this->createQuery();
		$rows = $course->getQuestions()->count();
		$rowNumber = mt_rand(0, max(0, ($rows - 1)));
		return $query->matching($query->equals('course', $course))->setOffset($rowNumber)->setLimit(1)->execute()->getFirst();
	}

}
