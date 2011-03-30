<?php

/* Ptuit::layout.html.twig */
class __TwigTemplate_fdcb1beb8005a0d3a65e9646e9f599c7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    public function display(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\"
\"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head> 
    <link href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('templating')->getAssetUrl("bundles/ptuit/css/style.css"), "html");
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
    
<title>Ptuit - The OpenSource makes the difference</title>
</head>
<body>
";
        // line 10
        $this->displayBlock('content', $context, $blocks);
        // line 12
        echo "</body>
</html>";
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "Ptuit::layout.html.twig";
    }
}
