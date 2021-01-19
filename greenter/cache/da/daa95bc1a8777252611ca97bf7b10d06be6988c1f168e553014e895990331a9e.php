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

/* summary.xml.twig */
class __TwigTemplate_9737ce6a9633e72458ec17a1ce5bb7739e37df944b1be687a91936016394347c extends \Twig\Template
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
<SummaryDocuments xmlns=\"urn:sunat:names:specification:ubl:peru:schema:xsd:SummaryDocuments-1\" xmlns:cac=\"urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2\" xmlns:cbc=\"urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2\" xmlns:ds=\"http://www.w3.org/2000/09/xmldsig#\" xmlns:ext=\"urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2\" xmlns:sac=\"urn:sunat:names:specification:ubl:peru:schema:xsd:SunatAggregateComponents-1\">
    <ext:UBLExtensions>
        <ext:UBLExtension>
            <ext:ExtensionContent/>
        </ext:UBLExtension>
    </ext:UBLExtensions>
    <cbc:UBLVersionID>2.0</cbc:UBLVersionID>
    <cbc:CustomizationID>1.1</cbc:CustomizationID>
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
        echo twig_date_format_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "fecResumen", []), "Y-m-d");
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
            echo "    <sac:SummaryDocumentsLine>
        <cbc:LineID>";
            // line 42
            echo $this->getAttribute($context["loop"], "index", []);
            echo "</cbc:LineID>
        <cbc:DocumentTypeCode>";
            // line 43
            echo $this->getAttribute($context["det"], "tipoDoc", []);
            echo "</cbc:DocumentTypeCode>
        <cbc:ID>";
            // line 44
            echo $this->getAttribute($context["det"], "serieNro", []);
            echo "</cbc:ID>
        <cac:AccountingCustomerParty>
            <cbc:CustomerAssignedAccountID>";
            // line 46
            echo $this->getAttribute($context["det"], "clienteNro", []);
            echo "</cbc:CustomerAssignedAccountID>
            <cbc:AdditionalAccountID>";
            // line 47
            echo $this->getAttribute($context["det"], "clienteTipo", []);
            echo "</cbc:AdditionalAccountID>
        </cac:AccountingCustomerParty>
        ";
            // line 49
            if ($this->getAttribute($context["det"], "docReferencia", [])) {
                // line 50
                echo "        <cac:BillingReference>
            <cac:InvoiceDocumentReference>
                <cbc:ID>";
                // line 52
                echo $this->getAttribute($this->getAttribute($context["det"], "docReferencia", []), "nroDoc", []);
                echo "</cbc:ID>
                <cbc:DocumentTypeCode>";
                // line 53
                echo $this->getAttribute($this->getAttribute($context["det"], "docReferencia", []), "tipoDoc", []);
                echo "</cbc:DocumentTypeCode>
            </cac:InvoiceDocumentReference>
        </cac:BillingReference>
        ";
            }
            // line 57
            echo "        ";
            if ($this->getAttribute($context["det"], "percepcion", [])) {
                // line 58
                echo "        ";
                $context["perc"] = $this->getAttribute($context["det"], "percepcion", []);
                // line 59
                echo "        <sac:SUNATPerceptionSummaryDocumentReference>
            <sac:SUNATPerceptionSystemCode>";
                // line 60
                echo $this->getAttribute((isset($context["perc"]) ? $context["perc"] : null), "codReg", []);
                echo "</sac:SUNATPerceptionSystemCode>
            <sac:SUNATPerceptionPercent>";
                // line 61
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["perc"]) ? $context["perc"] : null), "tasa", [])]);
                echo "</sac:SUNATPerceptionPercent>
            <cbc:TotalInvoiceAmount currencyID=\"PEN\">";
                // line 62
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["perc"]) ? $context["perc"] : null), "mto", [])]);
                echo "</cbc:TotalInvoiceAmount>
            <sac:SUNATTotalCashed currencyID=\"PEN\">";
                // line 63
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["perc"]) ? $context["perc"] : null), "mtoTotal", [])]);
                echo "</sac:SUNATTotalCashed>
            <cbc:TaxableAmount currencyID=\"PEN\">";
                // line 64
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["perc"]) ? $context["perc"] : null), "mtoBase", [])]);
                echo "</cbc:TaxableAmount>
        </sac:SUNATPerceptionSummaryDocumentReference>
        ";
            }
            // line 67
            echo "        <cac:Status>
            <cbc:ConditionCode>";
            // line 68
            echo $this->getAttribute($context["det"], "estado", []);
            echo "</cbc:ConditionCode>
        </cac:Status>
        <sac:TotalAmount currencyID=\"";
            // line 70
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "moneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["det"], "total", [])]);
            echo "</sac:TotalAmount>
        ";
            // line 71
            if ($this->getAttribute($context["det"], "mtoOperGravadas", [])) {
                // line 72
                echo "        <sac:BillingPayment>
            <cbc:PaidAmount currencyID=\"";
                // line 73
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "moneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["det"], "mtoOperGravadas", [])]);
                echo "</cbc:PaidAmount>
            <cbc:InstructionID>01</cbc:InstructionID>
        </sac:BillingPayment>
        ";
            }
            // line 77
            echo "        ";
            if ($this->getAttribute($context["det"], "mtoOperExoneradas", [])) {
                // line 78
                echo "        <sac:BillingPayment>
            <cbc:PaidAmount currencyID=\"";
                // line 79
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "moneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["det"], "mtoOperExoneradas", [])]);
                echo "</cbc:PaidAmount>
            <cbc:InstructionID>02</cbc:InstructionID>
        </sac:BillingPayment>
        ";
            }
            // line 83
            echo "        ";
            if ($this->getAttribute($context["det"], "mtoOperInafectas", [])) {
                // line 84
                echo "        <sac:BillingPayment>
            <cbc:PaidAmount currencyID=\"";
                // line 85
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "moneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["det"], "mtoOperInafectas", [])]);
                echo "</cbc:PaidAmount>
            <cbc:InstructionID>03</cbc:InstructionID>
        </sac:BillingPayment>
        ";
            }
            // line 89
            echo "        ";
            if ($this->getAttribute($context["det"], "mtoOperExportacion", [])) {
                // line 90
                echo "        <sac:BillingPayment>
            <cbc:PaidAmount currencyID=\"";
                // line 91
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "moneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["det"], "mtoOperExportacion", [])]);
                echo "</cbc:PaidAmount>
            <cbc:InstructionID>04</cbc:InstructionID>
        </sac:BillingPayment>
        ";
            }
            // line 95
            echo "        ";
            if ($this->getAttribute($context["det"], "mtoOperGratuitas", [])) {
                // line 96
                echo "        <sac:BillingPayment>
            <cbc:PaidAmount currencyID=\"";
                // line 97
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "moneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["det"], "mtoOperGratuitas", [])]);
                echo "</cbc:PaidAmount>
            <cbc:InstructionID>05</cbc:InstructionID>
        </sac:BillingPayment>
        ";
            }
            // line 101
            echo "        ";
            if ($this->getAttribute($context["det"], "mtoOtrosCargos", [])) {
                // line 102
                echo "        <cac:AllowanceCharge>
            <cbc:ChargeIndicator>true</cbc:ChargeIndicator>
            <cbc:Amount currencyID=\"";
                // line 104
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "moneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["det"], "mtoOtrosCargos", [])]);
                echo "</cbc:Amount>
        </cac:AllowanceCharge>
        ";
            }
            // line 107
            echo "        ";
            if ($this->getAttribute($context["det"], "mtoIvap", [])) {
                // line 108
                echo "        ";
                $context["ivap"] = call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["det"], "mtoIvap", [])]);
                // line 109
                echo "        <cac:TaxTotal>
            <cbc:TaxAmount currencyID=\"";
                // line 110
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "moneda", []);
                echo "\">";
                echo (isset($context["ivap"]) ? $context["ivap"] : null);
                echo "</cbc:TaxAmount>
            <cac:TaxSubtotal>
                <cbc:TaxAmount currencyID=\"";
                // line 112
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "moneda", []);
                echo "\">";
                echo (isset($context["ivap"]) ? $context["ivap"] : null);
                echo "</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>1016</cbc:ID>
                        <cbc:Name>IVAP</cbc:Name>
                        <cbc:TaxTypeCode>VAT</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        </cac:TaxTotal>
        ";
            } else {
                // line 123
                echo "        ";
                $context["igv"] = call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["det"], "mtoIGV", [])]);
                // line 124
                echo "        <cac:TaxTotal>
            <cbc:TaxAmount currencyID=\"";
                // line 125
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "moneda", []);
                echo "\">";
                echo (isset($context["igv"]) ? $context["igv"] : null);
                echo "</cbc:TaxAmount>
            <cac:TaxSubtotal>
                <cbc:TaxAmount currencyID=\"";
                // line 127
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "moneda", []);
                echo "\">";
                echo (isset($context["igv"]) ? $context["igv"] : null);
                echo "</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>1000</cbc:ID>
                        <cbc:Name>IGV</cbc:Name>
                        <cbc:TaxTypeCode>VAT</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        </cac:TaxTotal>
        ";
            }
            // line 138
            echo "        ";
            if ($this->getAttribute($context["det"], "mtoISC", [])) {
                // line 139
                echo "        ";
                $context["isc"] = call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["det"], "mtoISC", [])]);
                // line 140
                echo "        <cac:TaxTotal>
            <cbc:TaxAmount currencyID=\"";
                // line 141
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "moneda", []);
                echo "\">";
                echo (isset($context["isc"]) ? $context["isc"] : null);
                echo "</cbc:TaxAmount>
            <cac:TaxSubtotal>
                <cbc:TaxAmount currencyID=\"";
                // line 143
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "moneda", []);
                echo "\">";
                echo (isset($context["isc"]) ? $context["isc"] : null);
                echo "</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>2000</cbc:ID>
                        <cbc:Name>ISC</cbc:Name>
                        <cbc:TaxTypeCode>EXC</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        </cac:TaxTotal>
        ";
            }
            // line 154
            echo "        ";
            if ($this->getAttribute($context["det"], "mtoOtrosTributos", [])) {
                // line 155
                echo "        ";
                $context["oth"] = call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["det"], "mtoOtrosTributos", [])]);
                // line 156
                echo "        <cac:TaxTotal>
            <cbc:TaxAmount currencyID=\"";
                // line 157
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "moneda", []);
                echo "\">";
                echo (isset($context["oth"]) ? $context["oth"] : null);
                echo "</cbc:TaxAmount>
            <cac:TaxSubtotal>
                <cbc:TaxAmount currencyID=\"";
                // line 159
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "moneda", []);
                echo "\">";
                echo (isset($context["oth"]) ? $context["oth"] : null);
                echo "</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>9999</cbc:ID>
                        <cbc:Name>OTROS</cbc:Name>
                        <cbc:TaxTypeCode>OTH</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        </cac:TaxTotal>
        ";
            }
            // line 170
            echo "        ";
            if ($this->getAttribute($context["det"], "mtoIcbper", [])) {
                // line 171
                echo "            ";
                $context["icbper"] = call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["det"], "mtoIcbper", [])]);
                // line 172
                echo "            <cac:TaxTotal>
                <cbc:TaxAmount currencyID=\"";
                // line 173
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "moneda", []);
                echo "\">";
                echo (isset($context["icbper"]) ? $context["icbper"] : null);
                echo "</cbc:TaxAmount>
                <cac:TaxSubtotal>
                    <cbc:TaxAmount currencyID=\"";
                // line 175
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "moneda", []);
                echo "\">";
                echo (isset($context["icbper"]) ? $context["icbper"] : null);
                echo "</cbc:TaxAmount>
                    <cac:TaxCategory>
                        <cac:TaxScheme>
                            <cbc:ID>7152</cbc:ID>
                            <cbc:Name>ICBPER</cbc:Name>
                            <cbc:TaxTypeCode>OTH</cbc:TaxTypeCode>
                        </cac:TaxScheme>
                    </cac:TaxCategory>
                </cac:TaxSubtotal>
            </cac:TaxTotal>
        ";
            }
            // line 186
            echo "    </sac:SummaryDocumentsLine>
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
        // line 188
        echo "</SummaryDocuments>
";
        $___internal_0c7b291035a40d9c3fea06d71217bcf73f9318e7c741bb5c1269bc6b059948f0_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 1
        echo twig_spaceless($___internal_0c7b291035a40d9c3fea06d71217bcf73f9318e7c741bb5c1269bc6b059948f0_);
    }

    public function getTemplateName()
    {
        return "summary.xml.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  468 => 1,  464 => 188,  449 => 186,  433 => 175,  426 => 173,  423 => 172,  420 => 171,  417 => 170,  401 => 159,  394 => 157,  391 => 156,  388 => 155,  385 => 154,  369 => 143,  362 => 141,  359 => 140,  356 => 139,  353 => 138,  337 => 127,  330 => 125,  327 => 124,  324 => 123,  308 => 112,  301 => 110,  298 => 109,  295 => 108,  292 => 107,  284 => 104,  280 => 102,  277 => 101,  268 => 97,  265 => 96,  262 => 95,  253 => 91,  250 => 90,  247 => 89,  238 => 85,  235 => 84,  232 => 83,  223 => 79,  220 => 78,  217 => 77,  208 => 73,  205 => 72,  203 => 71,  197 => 70,  192 => 68,  189 => 67,  183 => 64,  179 => 63,  175 => 62,  171 => 61,  167 => 60,  164 => 59,  161 => 58,  158 => 57,  151 => 53,  147 => 52,  143 => 50,  141 => 49,  136 => 47,  132 => 46,  127 => 44,  123 => 43,  119 => 42,  116 => 41,  99 => 40,  92 => 36,  85 => 32,  72 => 22,  66 => 19,  60 => 16,  57 => 15,  55 => 14,  51 => 13,  47 => 12,  43 => 11,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "summary.xml.twig", "/home/lunasystems/public_html/clientes/efacturacion/greenter/vendor/greenter/xml/src/Xml/Templates/summary.xml.twig");
    }
}
