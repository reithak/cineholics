<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* base.html */
class __TwigTemplate_3298977feb4b2d9896a5c97d0c49c16d extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'css' => [$this, 'block_css'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html"));

        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
    <head>
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
        <title>My Website</title>
        <link rel=\"stylesheet\" href=\"/base.css\">
        <link rel=\"icon\" href=\"./favicon.ico\" type=\"image/x-icon\">
        <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC\" crossorigin=\"anonymous\">
        ";
        // line 11
        $this->displayBlock('css', $context, $blocks);
        // line 13
        echo "    </head>
  <body>
    <main>
        <nav class=\"navbar\">
            <a href=\"/\" class=\"logo\">
                <img src=\"https://placehold.co/250x100/cecece/5e94ae/png?text=Cineholics\" alt=\"Logo\">
            </a>
            <ul class=\"nav-links\">
                <li class=\"nav-item\"><a href=\"/\">Home</a></li>
                ";
        // line 22
        if (((array_key_exists("user", $context) && ((isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 22, $this->source); })()) != null)) && (twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 22, $this->source); })()), "role", [], "any", false, false, false, 22) == "admin"))) {
            // line 23
            echo "                    <li class=\"nav-item\"><a href=\"/admin/dashboard\">Admin Dashboard</a></li>
                    <li class=\"nav-item\"><a href=\"/admin/users\">Users</a></li>
                ";
        }
        // line 26
        echo "
                <li class=\"nav-item\"><a href=\"/movies\">Movies</a></li>
                ";
        // line 28
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 28, $this->source); })()), "session", [], "any", false, false, false, 28), "get", [0 => "user_id"], "method", false, false, false, 28)) {
            // line 29
            echo "                    <li class=\"nav-item\"><a href=\"/sign-out\">Sign Out</a></li>
                ";
        } else {
            // line 31
            echo "                    <li class=\"nav-item\"><a href=\"/sign-up\">Sign Up</a></li>
                    <li class=\"nav-item\"><a href=\"/sign-in\">Sign in</a></li>
                ";
        }
        // line 34
        echo "            </ul>
          </nav>

          ";
        // line 37
        $this->displayBlock('content', $context, $blocks);
        // line 39
        echo "    </main>
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM\" crossorigin=\"anonymous\"></script>
    <script src=\"/base.js\"></script>
  </body>
</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 11
    public function block_css($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "css"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "css"));

        // line 12
        echo "        ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 37
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 38
        echo "          ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "base.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  144 => 38,  134 => 37,  124 => 12,  114 => 11,  99 => 39,  97 => 37,  92 => 34,  87 => 31,  83 => 29,  81 => 28,  77 => 26,  72 => 23,  70 => 22,  59 => 13,  57 => 11,  45 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
    <head>
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
        <title>My Website</title>
        <link rel=\"stylesheet\" href=\"/base.css\">
        <link rel=\"icon\" href=\"./favicon.ico\" type=\"image/x-icon\">
        <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC\" crossorigin=\"anonymous\">
        {% block css %}
        {% endblock %}
    </head>
  <body>
    <main>
        <nav class=\"navbar\">
            <a href=\"/\" class=\"logo\">
                <img src=\"https://placehold.co/250x100/cecece/5e94ae/png?text=Cineholics\" alt=\"Logo\">
            </a>
            <ul class=\"nav-links\">
                <li class=\"nav-item\"><a href=\"/\">Home</a></li>
                {% if user is defined and user != null and user.role == 'admin' %}
                    <li class=\"nav-item\"><a href=\"/admin/dashboard\">Admin Dashboard</a></li>
                    <li class=\"nav-item\"><a href=\"/admin/users\">Users</a></li>
                {% endif %}

                <li class=\"nav-item\"><a href=\"/movies\">Movies</a></li>
                {% if app.session.get('user_id') %}
                    <li class=\"nav-item\"><a href=\"/sign-out\">Sign Out</a></li>
                {% else %}
                    <li class=\"nav-item\"><a href=\"/sign-up\">Sign Up</a></li>
                    <li class=\"nav-item\"><a href=\"/sign-in\">Sign in</a></li>
                {% endif %}
            </ul>
          </nav>

          {% block content %}
          {% endblock %}
    </main>
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM\" crossorigin=\"anonymous\"></script>
    <script src=\"/base.js\"></script>
  </body>
</html>
", "base.html", "/var/www/cineholics/templates/base.html");
    }
}
