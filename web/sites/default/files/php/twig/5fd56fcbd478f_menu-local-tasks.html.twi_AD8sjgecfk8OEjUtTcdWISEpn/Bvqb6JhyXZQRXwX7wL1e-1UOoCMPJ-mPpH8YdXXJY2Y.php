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

/* core/themes/bartik/templates/classy/navigation/menu-local-tasks.html.twig */
class __TwigTemplate_d2ec94db80e9a475ee9a3ea39fcc101fa0c96b84669ecb85967dcb6c6559df2a extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = array("if" => 14);
        $filters = array("t" => 15, "escape" => 16);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['t', 'escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 14
        if (($context["primary"] ?? null)) {
            // line 15
            echo "  <h2 class=\"visually-hidden\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Primary tabs"));
            echo "</h2>
  <ul class=\"tabs primary\">";
            // line 16
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["primary"] ?? null), 16, $this->source), "html", null, true);
            echo "</ul>
";
        }
        // line 18
        if (($context["secondary"] ?? null)) {
            // line 19
            echo "  <h2 class=\"visually-hidden\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Secondary tabs"));
            echo "</h2>
  <ul class=\"tabs secondary\">";
            // line 20
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["secondary"] ?? null), 20, $this->source), "html", null, true);
            echo "</ul>
";
        }
    }

    public function getTemplateName()
    {
        return "core/themes/bartik/templates/classy/navigation/menu-local-tasks.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 20,  76 => 19,  74 => 18,  69 => 16,  64 => 15,  62 => 14,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Theme override to display primary and secondary local tasks.
 *
 * Available variables:
 * - primary: HTML list items representing primary tasks.
 * - secondary: HTML list items representing primary tasks.
 *
 * Each item in these variables (primary and secondary) can be individually
 * themed in menu-local-task.html.twig.
 */
#}
{% if primary %}
  <h2 class=\"visually-hidden\">{{ 'Primary tabs'|t }}</h2>
  <ul class=\"tabs primary\">{{ primary }}</ul>
{% endif %}
{% if secondary %}
  <h2 class=\"visually-hidden\">{{ 'Secondary tabs'|t }}</h2>
  <ul class=\"tabs secondary\">{{ secondary }}</ul>
{% endif %}
", "core/themes/bartik/templates/classy/navigation/menu-local-tasks.html.twig", "/var/www/html/web/core/themes/bartik/templates/classy/navigation/menu-local-tasks.html.twig");
    }
}
