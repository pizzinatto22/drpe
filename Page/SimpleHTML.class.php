<?php

namespace Page;

class SimpleHTML extends GeneralContent {

    public function text() {
        return $this->nobr($this->element()->nodeValue);
    }

}
