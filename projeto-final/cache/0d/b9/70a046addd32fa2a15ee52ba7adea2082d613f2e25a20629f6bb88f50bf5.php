<?php

/* layout.html */
class __TwigTemplate_0db970a046addd32fa2a15ee52ba7adea2082d613f2e25a20629f6bb88f50bf5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'titulo' => array($this, 'block_titulo'),
            'menu' => array($this, 'block_menu'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<html>
    <head>
        <meta charset=\"utf-8\">
        <meta name=\"description\" content=\"\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
          <link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('site_url')->getCallable(), array()), "html", null, true);
        echo "/public/css/styles.css\">
        <link rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('site_url')->getCallable(), array()), "html", null, true);
        echo "/vendor/twitter/bootstrap/dist/css/bootstrap.css\">
        <title>";
        // line 9
        $this->displayBlock('titulo', $context, $blocks);
        echo "</title>
        <link rel=\"stylesheet\" href=\"css/style.css\">
    </head>
    <body>
\t<div id=\"container\">
    \t<div id=\"menu\">
    \t\t";
        // line 15
        $this->displayBlock('menu', $context, $blocks);
        echo "\t
    \t</div>

    \t<div id=\"conteudo\">
    \t\t";
        // line 19
        $this->displayBlock('content', $context, $blocks);
        // line 20
        echo "    \t</div>
   </div>    
    </body>
</html>";
    }

    // line 9
    public function block_titulo($context, array $blocks = array())
    {
        echo " ";
    }

    // line 15
    public function block_menu($context, array $blocks = array())
    {
        echo " ";
    }

    // line 19
    public function block_content($context, array $blocks = array())
    {
        echo " ";
    }

    public function getTemplateName()
    {
        return "layout.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 15,  63 => 9,  54 => 19,  38 => 9,  34 => 8,  22 => 1,  112 => 39,  108 => 37,  104 => 35,  93 => 30,  89 => 29,  82 => 25,  75 => 19,  66 => 17,  60 => 13,  56 => 20,  53 => 11,  51 => 10,  47 => 15,  44 => 7,  36 => 5,  30 => 7,);
    }
}
