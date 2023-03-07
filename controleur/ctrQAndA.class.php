<?php

require_once "vue/vue.class.php";

class ctrQAndA
{
    public function qAndA()
    {
        $title = "Q&A - Kaiserstuhl escape";
        $objVue = new vue("QAndA");
        $objVue->afficher(array(), $title);
    }
}