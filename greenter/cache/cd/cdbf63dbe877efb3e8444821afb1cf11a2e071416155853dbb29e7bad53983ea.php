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

/* voided.xml.twig */
class __TwigTemplate_447fa44fab7bbf30e5915f4ac7dad788d772c8602631205066f71c435911d587 extends \Twig\Template
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
<VoidedDocuments xmlns=\"urn:sunat:names:specification:ubl:peru:schema:xsd:VoidedDocuments-1\" xmlns:cac=\"urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2\" xmlns:cbc=\"urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2\" xmlns:ext=\"urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2\" xmlns:sac=\"urn:sunat:names:specification:ubl:peru:schema:xsd:SunatAggregateComponents-1\" xmlns:ds=\"http://www.w3.org/2000/09/xmldsig#\">
    <ext:UBLExtensions>
        <ext:UBLExtension>
            <ext:ExtensionContent/>
        </ext:UBLExtension>
    </ext:UBLExtensions>
    <cbc:UBLVersionID>2.0</cbc:UBLVersionID>
    <cbc:CustomizationID>1.0</cbc:CustomizationID>
    <cbc:ID>";
        // line 11
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "xmlId", []);
        echo "</cbc:ID>
    <cbc:ReferenceDate>";
        // line 12
        echo twig_date_format_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "fecGeneracion", []), "Y-m-d");
        echo "</cbc:ReferenceDate>
    <cbc:IssueDate>";
        // line 13
        echo twig_date_format_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "fecComunicacion", []), "Y-m-d");
        echo "</cbc:IssueDate>
    ";
        // line 14
        $context["emp"] = $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "company", []);
        // line 15
        echo "    <cac:Signature>
        <cbc:ID>";
        // line 16
        echo $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "ruc", []);
        echo "</cbc:ID>
        <cac:SignatoryParty>
            <cac:PartyIdentification>
                <cbc:ID>";
        // line 19
        echo $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "ruc", []);
        echo "</cbc:ID>
            </cac:PartyIdentification>
            <cac:PartyName>
                <cbc:Name><![CDATA[";
        // line 22
        echo $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "razonSocial", []);
        echo "]]></cbc:Name>
            </cac:PartyName>
        </cac:SignatoryParty>
        <cac:DigitalSignatureAttachment>
            <cac:ExternalReference>
                <cbc:URI>#GREENTER-SIGN</cbc:URI>
            </cac:ExternalReference>
        </cac:DigitalSignatureAttachment>
    </cac:Signature>
    <cac:AccountingSupplierParty>
        <cbc:CustomerAssignedAccountID>";
        // line 32
        echo $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "ruc", []);
        echo "</cbc:CustomerAssignedAccountID>
        <cbc:AdditionalAccountID>6</cbc:AdditionalAccountID>
        <cac:Party>
            <cac:PartyLegalEntity>
                <cbc:RegistrationName><![CDATA[";
        // line 36
        echo $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "razonSocial", []);
        echo "]]></cbc:RegistrationName>
            </cac:PartyLegalEntity>
        </cac:Party>
    </cac:AccountingSupplierParty>
    ";
        // line 40
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "details", []));
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
        foreach ($context['_seq'] as $context["_key"] => $context["det"]) {
            // line 41
            echo "    <sac:VoidedDocumentsLine>
        <cbc:LineID>";
            // line 42
            echo $this->getAttribute($context["loop"], "index", []);
            echo "</cbc:LineID>
        <cbc:DocumentTypeCode>";
            // line 43
            echo $this->getAttribute($context["det"], "tipoDoc", []);
            echo "</cbc:DocumentTypeCode>
        <sac:DocumentSerialID>";
            // line 44
            echo $this->getAttribute($context["det"], "serie", []);
            echo "</sac:DocumentSerialID>
        <sac:DocumentNumberID>";
            // line 45
            echo $this->getAttribute($context["det"], "correlativo", []);
            echo "</sac:DocumentNumberID>
        <sac:VoidReasonDescription><![CDATA[";
            // line 46
            echo $this->getAttribute($context["det"], "desMotivoBaja", []);
            echo "]]></sac:VoidReasonDescription>
    </sac:VoidedDocumentsLine>
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['det'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "</VoidedDocuments>
";
        $___internal_42283855ac362291ed32dca6fd4d3c07605a471025a914d95aea76fed0c26776_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 1
        echo twig_spaceless($___internal_42283855ac362291ed32dca6fd4d3c07605a471025a914d95aea76fed0c26776_);
    }

    public function getTemplateName()
    {
        return "voided.xml.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  156 => 1,  152 => 49,  135 => 46,  131 => 45,  127 => 44,  123 => 43,  119 => 42,  116 => 41,  99 => 40,  92 => 36,  85 => 32,  72 => 22,  66 => 19,  60 => 16,  57 => 15,  55 => 14,  51 => 13,  47 => 12,  43 => 11,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "voided.xml.twig", "/opt/lampp/htdocs/clientes/comercial_penia/greenter/vendor/greenter/xml/src/Xml/Templates/voided.xml.twig");
    }
}
