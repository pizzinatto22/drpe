<?php 

namespace Page;

class Section extends SimpleHTML {
	public function __construct($element) {
		parent::__construct("span", "secao", $element);
	}
}