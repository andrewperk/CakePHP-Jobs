<?php

class JobsHelper extends AppHelper {
    public $helpers = array(
        'Html',
        'Text'
    );
    
    public function howToApply($email, $url) {
        if (!empty($email) && !empty($url)) {
            return "<hr />\n<p>Apply by email: ".$this->Text->autoLinkEmails($email)." or through: ".$this->Html->link($url, $url);
        }
        if (!empty($email)) {
            return "<hr />\n<p>Apply by email: ".$this->Text->autoLinkEmails($email);
        }
        if (!empty($url)) {
            return "<hr />\n<p>Apply through: ".$this->Html->link($url, $url);
        }
    }
}
