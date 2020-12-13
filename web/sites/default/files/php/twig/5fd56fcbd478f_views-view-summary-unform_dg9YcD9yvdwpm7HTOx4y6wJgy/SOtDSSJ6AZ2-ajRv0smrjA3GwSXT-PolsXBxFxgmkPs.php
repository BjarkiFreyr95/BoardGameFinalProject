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

/* core/themes/bartik/templates/classy/views/views-view-summary-unformatted.html.twig */
class __TwigTemplate_9661fcecd233f3e96fb7807439ed5303fe54e14a1437444dd4245be3ec9c6a6c extends \Twig\Template
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
        $tags = array("for" => 21, "if" => 23);
        $filters = array("escape" => 24, "without" => 26);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['for', 'if'],
                ['escape', 'without'],
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
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 22
            echo "  ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((twig_get_attribute($this->env, $this->source, ($context["options"] ?? null), "inline", [], "any", false, false, true, 22)) ? ("<span") : ("<div")));
            echo " class=\"views-summary views-summary-unformatted\">
  ";
            // line 23
            if (twig_get_attribute($this->env, $this->source, $context["row"], "separator", [], "any", false, false, true, 23)) {
                // line 24
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["row"], "separator", [], "any", false, false, true, 24), 24, $this->source), "html", null, true);
            }
            // line 26
            echo "  <a href=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["row"], "url", [], "any", false, false, true, 26), 26, $this->source), "html", null, true);
            echo "\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["row"], "attributes", [], "any", false, false, true, 26), "addClass", [0 => ((twig_get_attribute($this->env, $this->source, $context["row"], "active", [], "any", false, false, true, 26)) ? ("is-active") : (""))], "method", false, false, true, 26), 26, $this->source), "href"), "html", null, true);
            echo ">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["row"], "link", [], "any", false, false, true, 26), 26, $this->source), "html", null, true);
            echo "</a>
  ";
            // line 27
            if (twig_get_attribute($this->env, $this->source, ($context["options"] ?? null), "count", [], "any", false, false, true, 27)) {
                // line 28
                echo "    (";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["row"], "count", [], "any", false, false, true, 28), 28, $this->source), "html", null, true);
                echo ")
  ";
            }
            // line 30
            echo "  ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((twig_get_attribute($this->env, $this->source, ($context["options"] ?? null), "inline", [], "any", false, false, true, 30)) ? ("</span>") : ("</div>")));
            echo "
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "core/themes/bartik/templates/classy/views/views-view-summary-unformatted.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 30,  87 => 28,  85 => 27,  76 => 26,  73 => 24,  71 => 23,  66 => 22,  62 => 21,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Theme override for unformatted summary links.
 *
 * Available variables:
 * - rows: The rows contained in this view.
 *   - url: The URL to this row's content.
 *   - count: The number of items this summary item represents.
 *   - separator: A separator between each row.
 *   - attributes: HTML attributes for a row.
 *   - active: A flag indicating whether the row is active.
 * - options: Flags indicating how each row should be displayed. This contains:
 *   - count: A flag indicating whether the row's 'count' should be displayed.
 *   - inline: A flag indicating whether the item should be wrapped in an inline
 *     or block level HTML element.
 *
 * @see template_preprocess_views_view_summary_unformatted()
 */
#}
{% for row in rows  %}
  {{ options.inline ? '<span' : '<div' }} class=\"views-summary views-summary-unformatted\">
  {% if row.separator -%}
    {{ row.separator }}
  {%- endif %}
  <a href=\"{{ row.url }}\"{{ row.attributes.addClass(row.active ? 'is-active')|without('href') }}>{{ row.link }}</a>
  {% if options.count %}
    ({{ row.count }})
  {% endif %}
  {{ options.inline ? '</span>' : '</div>' }}
{% endfor %}
", "core/themes/bartik/templates/classy/views/views-view-summary-unformatted.html.twig", "/var/www/html/web/core/themes/bartik/templates/classy/views/views-view-summary-unformatted.html.twig");
    }
}
