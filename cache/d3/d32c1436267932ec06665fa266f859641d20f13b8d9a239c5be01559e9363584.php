<?php

/* index.twig */
class __TwigTemplate_ab95f5e4cb394e4366ffc75b0d72c3bc3d32ae74fbce236088406065500f1f39 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]>
<html class=\"no-js lt-ie9 lt-ie8 lt-ie7\" lang=\"en\"> <![endif]-->
<!--[if IE 7]>
<html class=\"no-js lt-ie9 lt-ie8\" lang=\"en\"> <![endif]-->
<!--[if IE 8]>
<html class=\"no-js lt-ie9\" lang=\"en\"> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!-->
<html class=\"no-js\" lang=\"en\"> <!--<![endif]-->
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">
    <meta name=\"description\" content=\"\">
    <meta name=\"viewport\" content=\"width=device-width\">

    <title>Twig for ever</title>

</head>
<body>

";
        // line 23
        if ((isset($context["header"]) ? $context["header"] : null)) {
            // line 24
            echo "        ";
            echo twig_escape_filter($this->env, (isset($context["header"]) ? $context["header"] : null), "html", null, true);
            echo "
";
        }
        // line 26
        echo "
<div role=\"main\">
    ";
        // line 28
        if (twig_test_empty((isset($context["name"]) ? $context["name"] : null))) {
            // line 29
            echo "        ";
            $context["name"] = "test";
            // line 30
            echo "    ";
        }
        // line 31
        echo "    <h1> Welcome ";
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo "</h1>
</div>




<footer>

</footer>



</body>
</html>";
    }

    public function getTemplateName()
    {
        return "index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 31,  60 => 30,  57 => 29,  55 => 28,  51 => 26,  45 => 24,  43 => 23,  19 => 1,);
    }
}
/* <!doctype html>*/
/* <!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->*/
/* <!--[if lt IE 7]>*/
/* <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->*/
/* <!--[if IE 7]>*/
/* <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->*/
/* <!--[if IE 8]>*/
/* <html class="no-js lt-ie9" lang="en"> <![endif]-->*/
/* <!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->*/
/* <!--[if gt IE 8]><!-->*/
/* <html class="no-js" lang="en"> <!--<![endif]-->*/
/* <head>*/
/*     <meta charset="utf-8">*/
/*     <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">*/
/*     <meta name="description" content="">*/
/*     <meta name="viewport" content="width=device-width">*/
/* */
/*     <title>Twig for ever</title>*/
/* */
/* </head>*/
/* <body>*/
/* */
/* {% if header %}*/
/*         {{ header }}*/
/* {% endif %}*/
/* */
/* <div role="main">*/
/*     {% if name is empty %}*/
/*         {% set name = "test" %}*/
/*     {% endif %}*/
/*     <h1> Welcome {{ name }}</h1>*/
/* </div>*/
/* */
/* */
/* */
/* */
/* <footer>*/
/* */
/* </footer>*/
/* */
/* */
/* */
/* </body>*/
/* </html>*/
