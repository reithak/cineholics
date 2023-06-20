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

/* sign-up.html */
class __TwigTemplate_6261bc12abe03ceb86c691a6ce430b85 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'css' => [$this, 'block_css'],
            'content' => [$this, 'block_content'],
            'script' => [$this, 'block_script'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "sign-up.html"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "sign-up.html"));

        $this->parent = $this->loadTemplate("base.html", "sign-up.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_css($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "css"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "css"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 6
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 7
        echo "
";
        // line 8
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 8, $this->source); })()), 'form_start');
        echo "
<section class=\"vh-100 mt-5\">
  <div class=\"container h-100\">
    <div class=\"row d-flex justify-content-center align-items-center\">
      <div class=\"col-lg-12\">
        <div class=\"card\" style=\"border-radius: 25px;\">
          <div class=\"card-body p-md-5\">
            <div class=\"row justify-content-center\">
              <div class=\"col-md-10\">

                <p class=\"text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4\">Sign up</p>

                <form class=\"mx-1 mx-md-4\" method=\"POST\">

                  <div class=\"d-flex flex-row align-items-center mb-4\">
                    <div class=\"form-outline flex-fill mb-0 mx-1\">
                        ";
        // line 24
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 24, $this->source); })()), "first_name", [], "any", false, false, false, 24), 'row');
        echo "
                    </div>
                    <div class=\"form-outline flex-fill mb-0 mx-1\">
                        ";
        // line 27
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 27, $this->source); })()), "last_name", [], "any", false, false, false, 27), 'row');
        echo "
                    </div>
                  </div>

                  <div class=\"d-flex flex-row align-items-center mb-4\">
                    <div class=\"form-outline flex-fill mb-0 mx-1\">
                        ";
        // line 33
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 33, $this->source); })()), "username", [], "any", false, false, false, 33), 'row');
        echo "
                    </div>
                    <div class=\"form-outline flex-fill mb-0 mx-1\">
                        ";
        // line 36
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 36, $this->source); })()), "email", [], "any", false, false, false, 36), 'row');
        echo "
                    </div>
                  </div>

                  <div class=\"d-flex flex-row align-items-center mb-4\">
                    <div class=\"form-outline flex-fill mb-0 mx-1\">
                        ";
        // line 42
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 42, $this->source); })()), "password", [], "any", false, false, false, 42), 'row');
        echo "
                    </div>
                  </div>
                  
                  <div class=\"d-flex flex-row align-items-center mb-4\">
                    <div class=\"form-outline flex-fill mb-0 mx-1\">
                        ";
        // line 48
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 48, $this->source); })()), "country", [], "any", false, false, false, 48), 'row');
        echo "
                    </div>
                    <div class=\"form-outline flex-fill mb-0 mx-1\">
                        ";
        // line 51
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 51, $this->source); })()), "city", [], "any", false, false, false, 51), 'row');
        echo "
                    </div>
                  </div>

                  <div class=\"d-flex flex-row align-items-center mb-4\">
                    <div class=\"form-outline flex-fill mb-0 mx-1\">
                        ";
        // line 57
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 57, $this->source); })()), "address", [], "any", false, false, false, 57), 'row');
        echo "
                    </div>
                  </div>

                  <div class=\"d-flex justify-content-center mx-4 mb-3 mb-lg-4\">
                    <a href=\"/\"><button type=\"button\" class=\"btn btn-secondary btn-lg mx-1\">Back</button></a>
                    <button type=\"submit\" class=\"btn btn-success btn-lg mx-1\">Register</button>
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
        // line 76
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 76, $this->source); })()), 'form_end');
        echo "

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 80
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "script"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "script"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "sign-up.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  199 => 80,  186 => 76,  164 => 57,  155 => 51,  149 => 48,  140 => 42,  131 => 36,  125 => 33,  116 => 27,  110 => 24,  91 => 8,  88 => 7,  78 => 6,  60 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.html\" %}

{% block css %}
{% endblock %}

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

                <p class=\"text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4\">Sign up</p>

                <form class=\"mx-1 mx-md-4\" method=\"POST\">

                  <div class=\"d-flex flex-row align-items-center mb-4\">
                    <div class=\"form-outline flex-fill mb-0 mx-1\">
                        {{ form_row(form.first_name) }}
                    </div>
                    <div class=\"form-outline flex-fill mb-0 mx-1\">
                        {{ form_row(form.last_name) }}
                    </div>
                  </div>

                  <div class=\"d-flex flex-row align-items-center mb-4\">
                    <div class=\"form-outline flex-fill mb-0 mx-1\">
                        {{ form_row(form.username) }}
                    </div>
                    <div class=\"form-outline flex-fill mb-0 mx-1\">
                        {{ form_row(form.email) }}
                    </div>
                  </div>

                  <div class=\"d-flex flex-row align-items-center mb-4\">
                    <div class=\"form-outline flex-fill mb-0 mx-1\">
                        {{ form_row(form.password) }}
                    </div>
                  </div>
                  
                  <div class=\"d-flex flex-row align-items-center mb-4\">
                    <div class=\"form-outline flex-fill mb-0 mx-1\">
                        {{ form_row(form.country) }}
                    </div>
                    <div class=\"form-outline flex-fill mb-0 mx-1\">
                        {{ form_row(form.city) }}
                    </div>
                  </div>

                  <div class=\"d-flex flex-row align-items-center mb-4\">
                    <div class=\"form-outline flex-fill mb-0 mx-1\">
                        {{ form_row(form.address) }}
                    </div>
                  </div>

                  <div class=\"d-flex justify-content-center mx-4 mb-3 mb-lg-4\">
                    <a href=\"/\"><button type=\"button\" class=\"btn btn-secondary btn-lg mx-1\">Back</button></a>
                    <button type=\"submit\" class=\"btn btn-success btn-lg mx-1\">Register</button>
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

{% block script %}
{% endblock %}
", "sign-up.html", "/var/www/cineholics/templates/sign-up.html");
    }
}
