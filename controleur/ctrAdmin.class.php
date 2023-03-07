<?php

require_once "vue/vue.class.php";

class ctrAdmin
{
    public function admin()
    {
        $title = "Administration - Kaiserstuhl escape";
        $objVue = new vue("Admin");
        $objVue->afficher(array(), $title);
    }
}