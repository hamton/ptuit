<?php

/* Ptuit:Vista:index.html.twig */
class __TwigTemplate_412bcd3ee0ff32ed39cb464466e02771 extends Twig_Template
{
    protected $parent;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    public function getParent(array $context)
    {
        if (null === $this->parent) {
            $this->parent = $this->env->loadTemplate("Ptuit::layout.html.twig");
        }

        return $this->parent;
    }

    public function display(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo " <div id=\"header\">
            <img src=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('templating')->getAssetUrl("bundles/ptuit/images/logo.png"), "html");
        echo "\" alt=\"ptuit\"/>
            <a id=\"registro\" href=\"#\">Registrarse</a>
            <a id=\"login\" href=\"#\">Login</a>
            <div id=\"logExito\"></div>
            <div id=\"panel\">
                <form action=\"#\" method=\"post\" >                    
                    <p><em>Escribe tu nick y password</em></p>
                    <label class=\"label\" for=\"nick\">Nombre/Nick:</label><input id=\"nick\" class=\"campo\" type=\"text\"/>               
                    <label class=\"label\" for=\"pass\">Password:</label> <input id=\"pass\" class=\"campo\" title=\"pass\" type=\"password\"/>
                    <label class=\"label\" for=\"cat\">Catcha:</label><input id=\"cat\" class=\"campo\" title=\"cat\" type=\"text\"/>
                    <p><input id=\"btnLogin\" title=\"btnlogin\" name=\"login\" value=\"login\" type=\"button\"/></p>
                    <div class=\"error\" id=\"errorFormLogin\"></div>
                </form>
            </div>
            <div id=\"panel2\">
                <form action=\"#\" method=\"post\">                    
                    <p><em>Entra tus datos para registrarte</em></p>
                    <label class=\"label\" for=\"nickR\">Nombre/Nick:</label><input id=\"nickR\" class=\"campo\" title=\"nick\" type=\"text\"/>
                    <label class=\"label\" for=\"passR\">Password:</label><input id=\"passR\" class=\"campo\" title=\"pass\" type=\"password\"/>
                    <label class=\"label\" for=\"passR2\">Repite Password:</label><input id=\"passR2\" class=\"campo\" title=\"pass2\" type=\"password\"/>
                    <label class=\"label\" for=\"correo\">Email:</label><input id=\"correo\" class=\"campo\" title=\"correo\" type=\"text\"/>
                    <p><input id=\"btnRegistrar\" title=\"registrar\" name=\"registrar\" value=\"registrar\" type=\"button\"/></p>
                    <div class=\"error\" id=\"errorFormRegistro\"></div>
                </form>
            </div>
        </div>
        </div>
        <div id=\"footer\">
            <div id=\"cc\">Ptuit 2011 </div>
        </div>
";
    }

    public function getTemplateName()
    {
        return "Ptuit:Vista:index.html.twig";
    }
}
