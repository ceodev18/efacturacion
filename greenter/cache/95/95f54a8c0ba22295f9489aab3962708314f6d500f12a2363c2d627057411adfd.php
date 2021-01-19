<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* perception.xml.twig */
class __TwigTemplate_b081c8ed6fe1e21eabf777d8d8bec064218ad3684d26b912945dc6e0a0856bd9 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        ob_start(function () { return ''; });
        // line 2
        echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>
<Perception xmlns=\"urn:sunat:names:specification:ubl:peru:schema:xsd:Perception-1\" xmlns:cac=\"urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2\" xmlns:cbc=\"urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2\" xmlns:ds=\"http://www.w3.org/2000/09/xmldsig#\" xmlns:ext=\"urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2\" xmlns:sac=\"urn:sunat:names:specification:ubl:peru:schema:xsd:SunatAggregateComponents-1\">
\t<ext:UBLExtensions>
\t\t<ext:UBLExtension>
\t\t\t<ext:ExtensionContent/>
\t\t</ext:UBLExtension>
\t</ext:UBLExtensions>
\t<cbc:UBLVersionID>2.0</cbc:UBLVersionID>
\t<cbc:CustomizationID>1.0</cbc:CustomizationID>
    ";
        // line 11
        $context["emp"] = $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "company", []);
        // line 12
        echo "\t<cac:Signature>
\t\t<cbc:ID>";
        // line 13
        echo $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "ruc", []);
        echo "</cbc:ID>
\t\t<cac:SignatoryParty>
\t\t\t<cac:PartyIdentification>
\t\t\t\t<cbc:ID>";
        // line 16
        echo $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "ruc", []);
        echo "</cbc:ID>
\t\t\t</cac:PartyIdentification>
\t\t\t<cac:PartyName>
\t\t\t\t<cbc:Name><![CDATA[";
        // line 19
        echo $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "razonSocial", []);
        echo "]]></cbc:Name>
\t\t\t</cac:PartyName>
\t\t</cac:SignatoryParty>
\t\t<cac:DigitalSignatureAttachment>
\t\t\t<cac:ExternalReference>
\t\t\t\t<cbc:URI>#GREENTER-SIGN</cbc:URI>
\t\t\t</cac:ExternalReference>
\t\t</cac:DigitalSignatureAttachment>
\t</cac:Signature>
\t<cbc:ID>";
        // line 28
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "serie", []);
        echo "-";
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "correlativo", []);
        echo "</cbc:ID>
\t<cbc:IssueDate>";
        // line 29
        echo twig_date_format_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "fechaEmision", []), "Y-m-d");
        echo "</cbc:IssueDate>
\t<cbc:IssueTime>";
        // line 30
        echo twig_date_format_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "fechaEmision", []), "H:i:s");
        echo "</cbc:IssueTime>
\t<cac:AgentParty>
\t\t<cac:PartyIdentification>
\t\t\t<cbc:ID schemeID=\"6\">";
        // line 33
        echo $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "ruc", []);
        echo "</cbc:ID>
\t\t</cac:PartyIdentification>
\t\t<cac:PartyName>
\t\t\t<cbc:Name><![CDATA[";
        // line 36
        echo $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "nombreComercial", []);
        echo "]]></cbc:Name>
\t\t</cac:PartyName>
        ";
        // line 38
        $context["addr"] = $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "address", []);
        // line 39
        echo "\t\t<cac:PostalAddress>
\t\t\t<cbc:ID>";
        // line 40
        echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "ubigueo", []);
        echo "</cbc:ID>
\t\t\t<cbc:StreetName><![CDATA[";
        // line 41
        echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "direccion", []);
        echo "]]></cbc:StreetName>
\t\t\t<cbc:CityName>";
        // line 42
        echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "departamento", []);
        echo "</cbc:CityName>
\t\t\t<cbc:CountrySubentity>";
        // line 43
        echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "provincia", []);
        echo "</cbc:CountrySubentity>
\t\t\t<cbc:District>";
        // line 44
        echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "distrito", []);
        echo "</cbc:District>
\t\t\t<cac:Country>
\t\t\t\t<cbc:IdentificationCode>";
        // line 46
        echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "codigoPais", []);
        echo "</cbc:IdentificationCode>
\t\t\t</cac:Country>
\t\t</cac:PostalAddress>
\t\t<cac:PartyLegalEntity>
\t\t\t<cbc:RegistrationName><![CDATA[";
        // line 50
        echo $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "razonSocial", []);
        echo "]]></cbc:RegistrationName>
\t\t</cac:PartyLegalEntity>
\t</cac:AgentParty>
\t<cac:ReceiverParty>
\t\t<cac:PartyIdentification>
\t\t\t<cbc:ID schemeID=\"";
        // line 55
        echo $this->getAttribute($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "proveedor", []), "tipoDoc", []);
        echo "\">";
        echo $this->getAttribute($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "proveedor", []), "numDoc", []);
        echo "</cbc:ID>
\t\t</cac:PartyIdentification>
\t\t<cac:PartyLegalEntity>
\t\t\t<cbc:RegistrationName><![CDATA[";
        // line 58
        echo $this->getAttribute($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "proveedor", []), "rznSocial", []);
        echo "]]></cbc:RegistrationName>
\t\t</cac:PartyLegalEntity>
\t</cac:ReceiverParty>
\t<sac:SUNATPerceptionSystemCode>";
        // line 61
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "regimen", []);
        echo "</sac:SUNATPerceptionSystemCode>
\t<sac:SUNATPerceptionPercent>";
        // line 62
        echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tasa", [])]);
        echo "</sac:SUNATPerceptionPercent>
    ";
        // line 63
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "observacion", [])) {
            // line 64
            echo "\t<cbc:Note><![CDATA[";
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "observacion", []);
            echo "]]></cbc:Note>
\t";
        }
        // line 66
        echo "\t<cbc:TotalInvoiceAmount currencyID=\"PEN\">";
        echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "impPercibido", [])]);
        echo "</cbc:TotalInvoiceAmount>
\t<sac:SUNATTotalCashed currencyID=\"PEN\">";
        // line 67
        echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "impCobrado", [])]);
        echo "</sac:SUNATTotalCashed>
\t";
        // line 68
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "details", []));
        foreach ($context['_seq'] as $context["_key"] => $context["det"]) {
            // line 69
            echo "\t<sac:SUNATPerceptionDocumentReference>
\t\t<cbc:ID schemeID=\"";
            // line 70
            echo $this->getAttribute($context["det"], "tipoDoc", []);
            echo "\">";
            echo $this->getAttribute($context["det"], "numDoc", []);
            echo "</cbc:ID>
\t\t<cbc:IssueDate>";
            // line 71
            echo twig_date_format_filter($this->env, $this->getAttribute($context["det"], "fechaEmision", []), "Y-m-d");
            echo "</cbc:IssueDate>
\t\t<cbc:TotalInvoiceAmount currencyID=\"";
            // line 72
            echo $this->getAttribute($context["det"], "moneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["det"], "impTotal", [])]);
            echo "</cbc:TotalInvoiceAmount>
\t\t";
            // line 73
            if ($this->getAttribute($context["det"], "cobros", [])) {
                // line 74
                echo "        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["det"], "cobros", []));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["cob"]) {
                    // line 75
                    echo "\t\t<cac:Payment>
\t\t\t<cbc:ID>";
                    // line 76
                    echo $this->getAttribute($context["loop"], "index", []);
                    echo "</cbc:ID>
\t\t\t<cbc:PaidAmount currencyID=\"";
                    // line 77
                    echo $this->getAttribute($context["cob"], "moneda", []);
                    echo "\">";
                    echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["cob"], "importe", [])]);
                    echo "</cbc:PaidAmount>
\t\t\t<cbc:PaidDate>";
                    // line 78
                    echo twig_date_format_filter($this->env, $this->getAttribute($context["cob"], "fecha", []), "Y-m-d");
                    echo "</cbc:PaidDate>
\t\t</cac:Payment>
        ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cob'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 81
                echo "\t\t";
            }
            // line 82
            echo "\t\t";
            if ((($this->getAttribute($context["det"], "impPercibido", []) && $this->getAttribute($context["det"], "impCobrar", [])) && $this->getAttribute($context["det"], "fechaPercepcion", []))) {
                // line 83
                echo "\t\t<sac:SUNATPerceptionInformation>
\t\t\t<sac:SUNATPerceptionAmount currencyID=\"PEN\">";
                // line 84
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["det"], "impPercibido", [])]);
                echo "</sac:SUNATPerceptionAmount>
\t\t\t<sac:SUNATPerceptionDate>";
                // line 85
                echo twig_date_format_filter($this->env, $this->getAttribute($context["det"], "fechaPercepcion", []), "Y-m-d");
                echo "</sac:SUNATPerceptionDate>
\t\t\t<sac:SUNATNetTotalCashed currencyID=\"PEN\">";
                // line 86
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["det"], "impCobrar", [])]);
                echo "</sac:SUNATNetTotalCashed>
            ";
                // line 87
                if ($this->getAttribute($context["det"], "tipoCambio", [])) {
                    // line 88
                    echo "\t\t\t<cac:ExchangeRate>
\t\t\t\t<cbc:SourceCurrencyCode>";
                    // line 89
                    echo $this->getAttribute($this->getAttribute($context["det"], "tipoCambio", []), "monedaRef", []);
                    echo "</cbc:SourceCurrencyCode>
\t\t\t\t<cbc:TargetCurrencyCode>";
                    // line 90
                    echo $this->getAttribute($this->getAttribute($context["det"], "tipoCambio", []), "monedaObj", []);
                    echo "</cbc:TargetCurrencyCode>
\t\t\t\t<cbc:CalculationRate>";
                    // line 91
                    echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($this->getAttribute($context["det"], "tipoCambio", []), "factor", []), 6]);
                    echo "</cbc:CalculationRate>
\t\t\t\t<cbc:Date>";
                    // line 92
                    echo twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($context["det"], "tipoCambio", []), "fecha", []), "Y-m-d");
                    echo "</cbc:Date>
\t\t\t</cac:ExchangeRate>
            ";
                }
                // line 95
                echo "\t\t</sac:SUNATPerceptionInformation>
\t\t";
            }
            // line 97
            echo "\t</sac:SUNATPerceptionDocumentReference>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['det'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 99
        echo "</Perception>
";
        $___internal_e0af1df6d3dbd17a852fdc85ec24862c2cb7aa10d15725724783294965c06248_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 1
        echo twig_spaceless($___internal_e0af1df6d3dbd17a852fdc85ec24862c2cb7aa10d15725724783294965c06248_);
    }

    public function getTemplateName()
    {
        return "perception.xml.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  311 => 1,  307 => 99,  300 => 97,  296 => 95,  290 => 92,  286 => 91,  282 => 90,  278 => 89,  275 => 88,  273 => 87,  269 => 86,  265 => 85,  261 => 84,  258 => 83,  255 => 82,  252 => 81,  235 => 78,  229 => 77,  225 => 76,  222 => 75,  204 => 74,  202 => 73,  196 => 72,  192 => 71,  186 => 70,  183 => 69,  179 => 68,  175 => 67,  170 => 66,  164 => 64,  162 => 63,  158 => 62,  154 => 61,  148 => 58,  140 => 55,  132 => 50,  125 => 46,  120 => 44,  116 => 43,  112 => 42,  108 => 41,  104 => 40,  101 => 39,  99 => 38,  94 => 36,  88 => 33,  82 => 30,  78 => 29,  72 => 28,  60 => 19,  54 => 16,  48 => 13,  45 => 12,  43 => 11,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "perception.xml.twig", "/home/lunasystems/public_html/clientes/efacturacion/greenter/vendor/greenter/xml/src/Xml/Templates/perception.xml.twig");
    }
}
