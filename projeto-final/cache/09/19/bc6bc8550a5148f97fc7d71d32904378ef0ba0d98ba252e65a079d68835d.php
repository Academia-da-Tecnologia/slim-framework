<?php

/* home.html */
class __TwigTemplate_0919bc6bc8550a5148f97fc7d71d32904378ef0ba0d98ba252e65a079d68835d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout.html");

        $this->blocks = array(
            'titulo' => array($this, 'block_titulo'),
            'menu' => array($this, 'block_menu'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_titulo($context, array $blocks = array())
    {
        echo "Primeira página do site";
    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        echo " ";
        echo (isset($context["menu"]) ? $context["menu"] : null);
        echo " ";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "
\t<div style=\"text-align: center\" id=\"titulo\" class=\"alert alert-info\">Bem Vindo ao curso de Slim Framework com Twig</div>
\t";
        // line 10
        if ((twig_length_filter($this->env, (isset($context["produtos"]) ? $context["produtos"] : null)) > 0)) {
            // line 11
            echo "\t
\t\t";
            // line 12
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["produtos"]) ? $context["produtos"] : null));
            foreach ($context['_seq'] as $context["key"] => $context["produto"]) {
                // line 13
                echo "
\t\t\t<div class=\"produtos\">
\t\t\t\t
\t\t\t\t<div class=\"foto-produto\">
\t\t\t\t\t<img src=\" ";
                // line 17
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('site_url')->getCallable(), array()), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["produto"]) ? $context["produto"] : null), "tb_produto_foto"), "html", null, true);
                echo " \" style=\"min-height: 160px;height: 160px; width: 200px;\" class=\"img img-thumbnail\">
\t\t\t\t</div>\t

\t\t\t\t<div class=\"nome-produto\">
\t\t\t\t\t";
                // line 21
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute((isset($context["produto"]) ? $context["produto"] : null), "tb_produto_nome")), "html", null, true);
                echo "
\t\t\t\t</div>

\t\t\t\t<div class=\"preco-produto\">
\t\t\t\t\tR\$ ";
                // line 25
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["produto"]) ? $context["produto"] : null), "tb_produto_preco"), 2, ",", "."), "html", null, true);
                echo "
\t\t\t\t</div>\t\t

\t\t\t\t<div class=\"bt-produto\">
\t\t\t\t\t<a href=\"/detalhes/";
                // line 29
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["produto"]) ? $context["produto"] : null), "tb_produto_slug"), "html", null, true);
                echo "\" class=\"btn btn-primary\">+Info</a>
\t\t\t\t\t<a href=\"";
                // line 30
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["produto"]) ? $context["produto"] : null), "tb_produto_link"), "html", null, true);
                echo "\" target=\"_blank\" class=\"btn btn-danger\">Comprar</a>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['produto'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 35
            echo "
\t";
        } else {
            // line 37
            echo "\t\tNenhum produto cadastrado até o momento
\t";
        }
        // line 39
        echo "
";
    }

    public function getTemplateName()
    {
        return "home.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 39,  108 => 37,  104 => 35,  93 => 30,  89 => 29,  82 => 25,  75 => 21,  66 => 17,  60 => 13,  56 => 12,  53 => 11,  51 => 10,  47 => 8,  44 => 7,  36 => 5,  30 => 3,);
    }
}
