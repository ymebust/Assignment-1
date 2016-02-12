<?php

/**
 * Created by PhpStorm.
 * User: Teufel Hunden
 * Date: 1/25/2016
 * Time: 5:58 PM
 */
class Person {
	public $fname;
	public $lname;
	public $food;
	public $color;
	public $game;
	public $lang;

	/**
	 * Person constructor.
	 * @param $lname
	 * @param $fname
	 * @param $food
	 * @param $color
	 * @param $game
	 * @param $lang
	 */
	public function __construct()
	{

	}

	/**
	 * @return mixed
	 */
	public function getFname()
	{
		return $this->fname;
	}

	/**
	 * @param mixed $fname
	 */
	public function setFname($fname)
	{
		$this->fname = $fname;
	}

	/**
	 * @return mixed
	 */
	public function getLname()
	{
		return $this->lname;
	}

	/**
	 * @param mixed $lname
	 */
	public function setLname($lname)
	{
		$this->lname = $lname;
	}

	/**
	 * @return mixed
	 */
	public function getFood()
	{
		return $this->food;
	}

	/**
	 * @param mixed $food
	 */
	public function setFood($food)
	{
		$this->food = $food;
	}

	/**
	 * @return mixed
	 */
	public function getColor()
	{
		return $this->color;
	}

	/**
	 * @param mixed $color
	 */
	public function setColor($color)
	{
		$this->color = $color;
	}

	/**
	 * @return mixed
	 */
	public function getGame()
	{
		return $this->game;
	}

	/**
	 * @param mixed $game
	 */
	public function setGame($game)
	{
		$this->game = $game;
	}

	/**
	 * @return mixed
	 */
	public function getLang()
	{
		return $this->lang;
	}

	/**
	 * @param mixed $lang
	 */
	public function setLang($lang)
	{
		$this->lang = $lang;
	}


}