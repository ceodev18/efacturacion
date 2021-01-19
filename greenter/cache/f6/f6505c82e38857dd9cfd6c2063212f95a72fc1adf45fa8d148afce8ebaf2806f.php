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

/* despatch.xml.twig */
class __TwigTemplate_1009de332fcb3216803de69fbd200a7fac58d833cb760f808641093d6fdc23ed extends \Twig\Template
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
<DespatchAdvice xmlns=\"urn:oasis:names:specification:ubl:schema:xsd:DespatchAdvice-2\" xmlns:ds=\"http://www.w3.org/2000/09/xmldsig#\" xmlns:cac=\"urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2\" xmlns:cbc=\"urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2\" xmlns:ext=\"urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2\">
\t<ext:UBLExtensions>
\t\t<ext:UBLExtension>
\t\t\t<ext:ExtensionContent/>
\t\t</ext:UBLExtension>
\t</ext:UBLExtensions>
\t<cbc:UBLVersionID>2.1</cbc:UBLVersionID>
\t<cbc:CustomizationID>1.0</cbc:CustomizationID>
\t<cbc:ID>";
        // line 11
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "serie", []);
        echo "-";
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "correlativo", []);
        echo "</cbc:ID>
\t<cbc:IssueDate>";
        // line 12
        echo twig_date_format_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "fechaEmision", []), "Y-m-d");
        echo "</cbc:IssueDate>
\t<cbc:IssueTime>";
        // line 13
        echo twig_date_format_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "fechaEmision", []), "H:i:s");
        echo "</cbc:IssueTime>
\t<cbc:DespatchAdviceTypeCode>";
        // line 14
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoDoc", []);
        echo "</cbc:DespatchAdviceTypeCode>
    ";
        // line 15
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "observacion", [])) {
            // line 16
            echo "\t<cbc:Note><![CDATA[";
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "observacion", []);
            echo "]]></cbc:Note>
    ";
        }
        // line 18
        echo "    ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "docBaja", [])) {
            // line 19
            echo "\t<cac:OrderReference>
\t\t<cbc:ID>";
            // line 20
            echo $this->getAttribute($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "docBaja", []), "nroDoc", []);
            echo "</cbc:ID>
\t\t<cbc:OrderTypeCode listAgencyName=\"PE:SUNAT\" listName=\"SUNAT:Identificador de Tipo de Documento\" listURI=\"urn:pe:gob:sunat:cpe:see:gem:catalogos:catalogo01\">";
            // line 21
            echo $this->getAttribute($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "docBaja", []), "tipoDoc", []);
            echo "</cbc:OrderTypeCode>
\t</cac:OrderReference>
    ";
        }
        // line 24
        echo "    ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "relDoc", [])) {
            // line 25
            echo "\t<cac:AdditionalDocumentReference>
\t\t<cbc:ID>";
            // line 26
            echo $this->getAttribute($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "relDoc", []), "nroDoc", []);
            echo "</cbc:ID>
\t\t<cbc:DocumentTypeCode listAgencyName=\"PE:SUNAT\" listName=\"SUNAT:Identificador de documento relacionado\" listURI=\"urn:pe:gob:sunat:cpe:see:gem:catalogos:catalogo21\">";
            // line 27
            echo $this->getAttribute($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "relDoc", []), "tipoDoc", []);
            echo "</cbc:DocumentTypeCode>
\t</cac:AdditionalDocumentReference>
    ";
        }
        // line 30
        echo "    ";
        $context["emp"] = $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "company", []);
        // line 31
        echo "\t<cac:DespatchSupplierParty>
\t\t<cbc:CustomerAssignedAccountID schemeID=\"6\">";
        // line 32
        echo $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "ruc", []);
        echo "</cbc:CustomerAssignedAccountID>
\t\t<cac:Party>
\t\t\t<cac:PartyLegalEntity>
\t\t\t\t<cbc:RegistrationName><![CDATA[";
        // line 35
        echo $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "razonSocial", []);
        echo "]]></cbc:RegistrationName>
\t\t\t</cac:PartyLegalEntity>
\t\t</cac:Party>
\t</cac:DespatchSupplierParty>
\t<cac:DeliveryCustomerParty>
\t\t<cbc:CustomerAssignedAccountID schemeID=\"";
        // line 40
        echo $this->getAttribute($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "destinatario", []), "tipoDoc", []);
        echo "\">";
        echo $this->getAttribute($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "destinatario", []), "numDoc", []);
        echo "</cbc:CustomerAssignedAccountID>
\t\t<cac:Party>
\t\t\t<cac:PartyLegalEntity>
\t\t\t\t<cbc:RegistrationName><![CDATA[";
        // line 43
        echo $this->getAttribute($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "destinatario", []), "rznSocial", []);
        echo "]]></cbc:RegistrationName>
\t\t\t</cac:PartyLegalEntity>
\t\t</cac:Party>
\t</cac:DeliveryCustomerParty>
    ";
        // line 47
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tercero", [])) {
            // line 48
            echo "\t<cac:SellerSupplierParty>
\t\t<cbc:CustomerAssignedAccountID schemeID=\"";
            // line 49
            echo $this->getAttribute($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tercero", []), "tipoDoc", []);
            echo "\">";
            echo $this->getAttribute($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tercero", []), "numDoc", []);
            echo "</cbc:CustomerAssignedAccountID>
\t\t<cac:Party>
\t\t\t<cac:PartyLegalEntity>
\t\t\t\t<cbc:RegistrationName><![CDATA[";
            // line 52
            echo $this->getAttribute($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tercero", []), "rznSocial", []);
            echo "]]></cbc:RegistrationName>
\t\t\t</cac:PartyLegalEntity>
\t\t</cac:Party>
\t</cac:SellerSupplierParty>
    ";
        }
        // line 57
        echo "    ";
        $context["envio"] = $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "envio", []);
        // line 58
        echo "\t<cac:Shipment>
\t\t<cbc:ID>1</cbc:ID>
\t\t<cbc:HandlingCode>";
        // line 60
        echo $this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "codTraslado", []);
        echo "</cbc:HandlingCode>
        ";
        // line 61
        if ($this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "desTraslado", [])) {
            // line 62
            echo "\t\t<cbc:Information>";
            echo $this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "desTraslado", []);
            echo "</cbc:Information>
\t\t";
        }
        // line 64
        echo "\t\t<cbc:GrossWeightMeasure unitCode=\"";
        echo $this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "undPesoTotal", []);
        echo "\">";
        echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "pesoTotal", []), 3]);
        echo "</cbc:GrossWeightMeasure>
        ";
        // line 65
        if ($this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "numBultos", [])) {
            // line 66
            echo "\t\t<cbc:TotalTransportHandlingUnitQuantity>";
            echo $this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "numBultos", []);
            echo "</cbc:TotalTransportHandlingUnitQuantity>
\t\t";
        }
        // line 68
        echo "\t\t<cbc:SplitConsignmentIndicator>";
        echo (($this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "indTransbordo", [])) ? ("true") : ("false"));
        echo "</cbc:SplitConsignmentIndicator>
\t\t<cac:ShipmentStage>
\t\t\t<cbc:TransportModeCode>";
        // line 70
        echo $this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "modTraslado", []);
        echo "</cbc:TransportModeCode>
\t\t\t<cac:TransitPeriod>
\t\t\t\t<cbc:StartDate>";
        // line 72
        echo twig_date_format_filter($this->env, $this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "fecTraslado", []), "Y-m-d");
        echo "</cbc:StartDate>
\t\t\t</cac:TransitPeriod>
            ";
        // line 74
        if ($this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "transportista", [])) {
            // line 75
            echo "\t\t\t<cac:CarrierParty>
\t\t\t\t<cac:PartyIdentification>
\t\t\t\t\t<cbc:ID schemeID=\"";
            // line 77
            echo $this->getAttribute($this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "transportista", []), "tipoDoc", []);
            echo "\">";
            echo $this->getAttribute($this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "transportista", []), "numDoc", []);
            echo "</cbc:ID>
\t\t\t\t</cac:PartyIdentification>
\t\t\t\t<cac:PartyName>
\t\t\t\t\t<cbc:Name><![CDATA[";
            // line 80
            echo $this->getAttribute($this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "transportista", []), "rznSocial", []);
            echo "]]></cbc:Name>
\t\t\t\t</cac:PartyName>
\t\t\t</cac:CarrierParty>
\t\t\t<cac:TransportMeans>
\t\t\t\t<cac:RoadTransport>
\t\t\t\t\t<cbc:LicensePlateID>";
            // line 85
            echo $this->getAttribute($this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "transportista", []), "placa", []);
            echo "</cbc:LicensePlateID>
\t\t\t\t</cac:RoadTransport>
\t\t\t</cac:TransportMeans>
\t\t\t<cac:DriverPerson>
\t\t\t\t<cbc:ID schemeID=\"";
            // line 89
            echo $this->getAttribute($this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "transportista", []), "choferTipoDoc", []);
            echo "\">";
            echo $this->getAttribute($this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "transportista", []), "choferDoc", []);
            echo "</cbc:ID>
\t\t\t</cac:DriverPerson>
            ";
        }
        // line 92
        echo "\t\t</cac:ShipmentStage>
\t\t<cac:Delivery>
\t\t\t<cac:DeliveryAddress>
\t\t\t\t<cbc:ID>";
        // line 95
        echo $this->getAttribute($this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "llegada", []), "ubigueo", []);
        echo "</cbc:ID>
\t\t\t\t<cbc:StreetName>";
        // line 96
        echo $this->getAttribute($this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "llegada", []), "direccion", []);
        echo "</cbc:StreetName>
\t\t\t</cac:DeliveryAddress>
\t\t</cac:Delivery>
        ";
        // line 99
        if ($this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "numContenedor", [])) {
            // line 100
            echo "\t\t<cac:TransportHandlingUnit>
\t\t\t<cbc:ID>";
            // line 101
            echo $this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "numContenedor", []);
            echo "</cbc:ID>
\t\t</cac:TransportHandlingUnit>
        ";
        }
        // line 104
        echo "\t\t<cac:OriginAddress>
\t\t\t<cbc:ID>";
        // line 105
        echo $this->getAttribute($this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "partida", []), "ubigueo", []);
        echo "</cbc:ID>
\t\t\t<cbc:StreetName>";
        // line 106
        echo $this->getAttribute($this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "partida", []), "direccion", []);
        echo "</cbc:StreetName>
\t\t</cac:OriginAddress>
        ";
        // line 108
        if ($this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "codPuerto", [])) {
            // line 109
            echo "\t\t<cac:FirstArrivalPortLocation>
\t\t\t<cbc:ID>";
            // line 110
            echo $this->getAttribute((isset($context["envio"]) ? $context["envio"] : null), "codPuerto", []);
            echo "</cbc:ID>
\t\t</cac:FirstArrivalPortLocation>
        ";
        }
        // line 113
        echo "\t</cac:Shipment>
    ";
        // line 114
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
            // line 115
            echo "\t<cac:DespatchLine>
\t\t<cbc:ID>";
            // line 116
            echo $this->getAttribute($context["loop"], "index", []);
            echo "</cbc:ID>
\t\t<cbc:DeliveredQuantity unitCode=\"";
            // line 117
            echo $this->getAttribute($context["det"], "unidad", []);
            echo "\">";
            echo $this->getAttribute($context["det"], "cantidad", []);
            echo "</cbc:DeliveredQuantity>
\t\t<cac:OrderLineReference>
\t\t\t<cbc:LineID>";
            // line 119
            echo $this->getAttribute($context["loop"], "index", []);
            echo "</cbc:LineID>
\t\t</cac:OrderLineReference>
\t\t<cac:Item>
\t\t\t<cbc:Name><![CDATA[";
            // line 122
            echo $this->getAttribute($context["det"], "descripcion", []);
            echo "]]></cbc:Name>
\t\t\t<cac:SellersItemIdentification>
\t\t\t\t<cbc:ID>";
            // line 124
            echo $this->getAttribute($context["det"], "codigo", []);
            echo "</cbc:ID>
\t\t\t</cac:SellersItemIdentification>
\t\t\t";
            // line 126
            if ($this->getAttribute($context["det"], "codProdSunat", [])) {
                // line 127
                echo "\t\t\t\t<cac:CommodityClassification>
\t\t\t\t\t<cbc:ItemClassificationCode listID=\"UNSPSC\" listAgencyName=\"GS1 US\" listName=\"Item Classification\">";
                // line 128
                echo $this->getAttribute($context["det"], "codProdSunat", []);
                echo "</cbc:ItemClassificationCode>
\t\t\t\t</cac:CommodityClassification>
\t\t\t";
            }
            // line 131
            echo "\t\t</cac:Item>
\t</cac:DespatchLine>
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
        // line 134
        echo "</DespatchAdvice>
";
        $___internal_fb1cef821e178bf7d8b2993ad35932349e70efe1520ea3aa2b28eb5af2eae1c7_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 1
        echo twig_spaceless($___internal_fb1cef821e178bf7d8b2993ad35932349e70efe1520ea3aa2b28eb5af2eae1c7_);
    }

    public function getTemplateName()
    {
        return "despatch.xml.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  374 => 1,  370 => 134,  354 => 131,  348 => 128,  345 => 127,  343 => 126,  338 => 124,  333 => 122,  327 => 119,  320 => 117,  316 => 116,  313 => 115,  296 => 114,  293 => 113,  287 => 110,  284 => 109,  282 => 108,  277 => 106,  273 => 105,  270 => 104,  264 => 101,  261 => 100,  259 => 99,  253 => 96,  249 => 95,  244 => 92,  236 => 89,  229 => 85,  221 => 80,  213 => 77,  209 => 75,  207 => 74,  202 => 72,  197 => 70,  191 => 68,  185 => 66,  183 => 65,  176 => 64,  170 => 62,  168 => 61,  164 => 60,  160 => 58,  157 => 57,  149 => 52,  141 => 49,  138 => 48,  136 => 47,  129 => 43,  121 => 40,  113 => 35,  107 => 32,  104 => 31,  101 => 30,  95 => 27,  91 => 26,  88 => 25,  85 => 24,  79 => 21,  75 => 20,  72 => 19,  69 => 18,  63 => 16,  61 => 15,  57 => 14,  53 => 13,  49 => 12,  43 => 11,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "despatch.xml.twig", "/home/lunasystems/public_html/clientes/efacturacion/greenter/vendor/greenter/xml/src/Xml/Templates/despatch.xml.twig");
    }
}
