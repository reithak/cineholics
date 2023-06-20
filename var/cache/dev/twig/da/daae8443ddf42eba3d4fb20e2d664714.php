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

/* sign-in.html */
class __TwigTemplate_6ccc935ab985b51d91a5b4450a45ff5c extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "sign-in.html"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "sign-in.html"));

        $this->parent = $this->loadTemplate("base.html", "sign-in.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 4
        echo "
";
        // line 5
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 5, $this->source); })()), 'form_start');
        echo "
<section class=\"vh-100 mt-5\">
  <div class=\"container h-100\">
    <div class=\"row d-flex justify-content-center align-items-center\">
      <div class=\"col-lg-12\">
        <div class=\"card\" style=\"border-radius: 25px;\">
          <div class=\"card-body p-md-5\">
            <div class=\"row justify-content-center\">
              <div class=\"col-md-10\">

                <p class=\"text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4\">Sign In</p>

                <form class=\"mx-1 mx-md-4\" method=\"POST\">

                  <div class=\"d-flex flex-row align-items-center mb-4\">
                    <div class=\"form-outline flex-fill mb-0 mx-1\">
                        ";
        // line 21
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 21, $this->source); })()), "username", [], "any", false, false, false, 21), 'row');
        echo "
                    </div>
                  </div>

                  <div class=\"d-flex flex-row align-items-center mb-4\">
                    <div class=\"form-outline flex-fill mb-0 mx-1\">
                        ";
        // line 27
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 27, $this->source); })()), "password", [], "any", false, false, false, 27), 'row');
        echo "
                    </div>
                  </div>

                  <div class=\"d-flex flex-row align-items-center mb-4\">
                    <div class=\"form-outline flex-fill mb-0 mx-1\">
                        ";
        // line 33
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 33, $this->source); })()), "rememberMe", [], "any", false, false, false, 33), 'row');
        echo "
                    </div>
                  </div>

                    ";
        // line 37
        if ((isset($context["resultMessage"]) || array_key_exists("resultMessage", $context) ? $context["resultMessage"] : (function () { throw new RuntimeError('Variable "resultMessage" does not exist.', 37, $this->source); })())) {
            // line 38
            echo "                        <div class=\"alert alert-danger\" role=\"alert\">
                            ";
            // line 39
            echo twig_escape_filter($this->env, (isset($context["resultMessage"]) || array_key_exists("resultMessage", $context) ? $context["resultMessage"] : (function () { throw new RuntimeError('Variable "resultMessage" does not exist.', 39, $this->source); })()), "html", null, true);
            echo "
                        </div>                      
                    ";
        }
        // line 42
        echo "
                  <div class=\"d-flex justify-content-center mx-4 mb-3 mb-lg-4\">
                    <a href=\"/\"><button type=\"button\" class=\"btn btn-secondary btn-lg mx-1\">Back</button></a>
                    <button type=\"submit\" class=\"btn btn-success btn-lg mx-1\">Login</button>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
";
        // line 57
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 57, $this->source); })()), 'form_end');
        echo "

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "sign-in.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  143 => 57,  126 => 42,  120 => 39,  117 => 38,  115 => 37,  108 => 33,  99 => 27,  90 => 21,  71 => 5,  68 => 4,  58 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.html\" %}

{% block content %}

{{ form_start(form) }}
<section class=\"vh-100 mt-5\">
  <div class=\"container h-100\">
    <div class=\"row d-flex justify-content-center align-items-center\">
      <div class=\"col-lg-12\">
        <div class=\"card\" style=\"border-radius: 25px;\">
          <div class=\"card-body p-md-5\">
            <div class=\"row justify-content-center\">
              <div class=\"col-md-10\">

                <p class=\"text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4\">Sign In</p>

                <form class=\"mx-1 mx-md-4\" method=\"POST\">

                  <div class=\"d-flex flex-row align-items-center mb-4\">
                    <div class=\"form-outline flex-fill mb-0 mx-1\">
                        {{ form_row(form.username) }}
                    </div>
                  </div>

                  <div class=\"d-flex flex-row align-items-center mb-4\">
                    <div class=\"form-outline flex-fill mb-0 mx-1\">
                        {{ form_row(form.password) }}
                    </div>
                  </div>

                  <div class=\"d-flex flex-row align-items-center mb-4\">
                    <div class=\"form-outline flex-fill mb-0 mx-1\">
                        {{ form_row(form.rememberMe) }}
                    </div>
                  </div>

                    {% if resultMessage %}
                        <div class=\"alert alert-danger\" role=\"alert\">
                            {{ resultMessage }}
                        </div>                      
                    {% endif %}

                  <div class=\"d-flex justify-content-center mx-4 mb-3 mb-lg-4\">
                    <a href=\"/\"><button type=\"button\" class=\"btn btn-secondary btn-lg mx-1\">Back</button></a>
                    <button type=\"submit\" class=\"btn btn-success btn-lg mx-1\">Login</button>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
{{ form_end(form) }}

{% endblock %}
", "sign-in.html", "/var/www/cineholics/templates/sign-in.html");
    }
}
