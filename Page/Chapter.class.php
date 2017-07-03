<?php 

namespace Page;

class Chapter extends SimpleHTML {
	public function __construct($element) {
		parent::__construct("span", "capitulo", $element);
	}
}