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

/* notadb2.1.xml.twig */
class __TwigTemplate_3b31bd116b3dfcfb4dd9df0327496d9b8a75fb1ee3d55ba2bfba400c1296ad8a extends \Twig\Template
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
<DebitNote xmlns=\"urn:oasis:names:specification:ubl:schema:xsd:DebitNote-2\" xmlns:cac=\"urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2\" xmlns:cbc=\"urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2\" xmlns:ds=\"http://www.w3.org/2000/09/xmldsig#\" xmlns:ext=\"urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2\">
    <ext:UBLExtensions>
        <ext:UBLExtension>
            <ext:ExtensionContent/>
        </ext:UBLExtension>
    </ext:UBLExtensions>
    <cbc:UBLVersionID>2.1</cbc:UBLVersionID>
    <cbc:CustomizationID>2.0</cbc:CustomizationID>
    <cbc:ID>";
        // line 11
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "serie", []);
        echo "-";
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "correlativo", []);
        echo "</cbc:ID>
    <cbc:IssueDate>";
        // line 12
        echo twig_date_format_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "fechaEmision", []), "Y-m-d");
        echo "</cbc:IssueDate>
    <cbc:IssueTime>";
        // line 13
        echo twig_date_format_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "fechaEmision", []), "H:i:s");
        echo "</cbc:IssueTime>
    ";
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "legends", []));
        foreach ($context['_seq'] as $context["_key"] => $context["leg"]) {
            // line 15
            echo "        <cbc:Note languageLocaleID=\"";
            echo $this->getAttribute($context["leg"], "code", []);
            echo "\"><![CDATA[";
            echo $this->getAttribute($context["leg"], "value", []);
            echo "]]></cbc:Note>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['leg'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "    <cbc:DocumentCurrencyCode>";
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
        echo "</cbc:DocumentCurrencyCode>
    <cac:DiscrepancyResponse>
        <cbc:ReferenceID>";
        // line 19
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "numDocfectado", []);
        echo "</cbc:ReferenceID>
        <cbc:ResponseCode>";
        // line 20
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "codMotivo", []);
        echo "</cbc:ResponseCode>
        <cbc:Description>";
        // line 21
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "desMotivo", []);
        echo "</cbc:Description>
    </cac:DiscrepancyResponse>
    ";
        // line 23
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "compra", [])) {
            // line 24
            echo "    <cac:OrderReference>
        <cbc:ID>";
            // line 25
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "compra", []);
            echo "</cbc:ID>
    </cac:OrderReference>
    ";
        }
        // line 28
        echo "    <cac:BillingReference>
        <cac:InvoiceDocumentReference>
            <cbc:ID>";
        // line 30
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "numDocfectado", []);
        echo "</cbc:ID>
            <cbc:DocumentTypeCode>";
        // line 31
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipDocAfectado", []);
        echo "</cbc:DocumentTypeCode>
        </cac:InvoiceDocumentReference>
    </cac:BillingReference>
    ";
        // line 34
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "guias", [])) {
            // line 35
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "guias", []));
            foreach ($context['_seq'] as $context["_key"] => $context["guia"]) {
                // line 36
                echo "    <cac:DespatchDocumentReference>
        <cbc:ID>";
                // line 37
                echo $this->getAttribute($context["guia"], "nroDoc", []);
                echo "</cbc:ID>
        <cbc:DocumentTypeCode>";
                // line 38
                echo $this->getAttribute($context["guia"], "tipoDoc", []);
                echo "</cbc:DocumentTypeCode>
    </cac:DespatchDocumentReference>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['guia'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 41
            echo "    ";
        }
        // line 42
        echo "    ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "relDocs", [])) {
            // line 43
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "relDocs", []));
            foreach ($context['_seq'] as $context["_key"] => $context["rel"]) {
                // line 44
                echo "    <cac:AdditionalDocumentReference>
        <cbc:ID>";
                // line 45
                echo $this->getAttribute($context["rel"], "nroDoc", []);
                echo "</cbc:ID>
        <cbc:DocumentTypeCode>";
                // line 46
                echo $this->getAttribute($context["rel"], "tipoDoc", []);
                echo "</cbc:DocumentTypeCode>
    </cac:AdditionalDocumentReference>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rel'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 49
            echo "    ";
        }
        // line 50
        echo "    ";
        $context["emp"] = $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "company", []);
        // line 51
        echo "    <cac:Signature>
        <cbc:ID>";
        // line 52
        echo $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "ruc", []);
        echo "</cbc:ID>
        <cac:SignatoryParty>
            <cac:PartyIdentification>
                <cbc:ID>";
        // line 55
        echo $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "ruc", []);
        echo "</cbc:ID>
            </cac:PartyIdentification>
            <cac:PartyName>
                <cbc:Name><![CDATA[";
        // line 58
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
        <cac:Party>
            <cac:PartyIdentification>
                <cbc:ID schemeID=\"6\">";
        // line 70
        echo $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "ruc", []);
        echo "</cbc:ID>
            </cac:PartyIdentification>
            <cac:PartyName>
                <cbc:Name><![CDATA[";
        // line 73
        echo $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "nombreComercial", []);
        echo "]]></cbc:Name>
            </cac:PartyName>
            <cac:PartyLegalEntity>
                <cbc:RegistrationName><![CDATA[";
        // line 76
        echo $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "razonSocial", []);
        echo "]]></cbc:RegistrationName>
                ";
        // line 77
        $context["addr"] = $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "address", []);
        // line 78
        echo "                <cac:RegistrationAddress>
                    <cbc:ID>";
        // line 79
        echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "ubigueo", []);
        echo "</cbc:ID>
                    <cbc:AddressTypeCode>";
        // line 80
        echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "codLocal", []);
        echo "</cbc:AddressTypeCode>
                    ";
        // line 81
        if ($this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "urbanizacion", [])) {
            // line 82
            echo "                        <cbc:CitySubdivisionName>";
            echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "urbanizacion", []);
            echo "</cbc:CitySubdivisionName>
                    ";
        }
        // line 84
        echo "                    <cbc:CityName>";
        echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "provincia", []);
        echo "</cbc:CityName>
                    <cbc:CountrySubentity>";
        // line 85
        echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "departamento", []);
        echo "</cbc:CountrySubentity>
                    <cbc:District>";
        // line 86
        echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "distrito", []);
        echo "</cbc:District>
                    <cac:AddressLine>
                        <cbc:Line><![CDATA[";
        // line 88
        echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "direccion", []);
        echo "]]></cbc:Line>
                    </cac:AddressLine>
                    <cac:Country>
                        <cbc:IdentificationCode>";
        // line 91
        echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "codigoPais", []);
        echo "</cbc:IdentificationCode>
                    </cac:Country>
                </cac:RegistrationAddress>
            </cac:PartyLegalEntity>
            ";
        // line 95
        if (($this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "email", []) || $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "telephone", []))) {
            // line 96
            echo "                <cac:Contact>
                    ";
            // line 97
            if ($this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "telephone", [])) {
                // line 98
                echo "                        <cbc:Telephone>";
                echo $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "telephone", []);
                echo "</cbc:Telephone>
                    ";
            }
            // line 100
            echo "                    ";
            if ($this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "email", [])) {
                // line 101
                echo "                        <cbc:ElectronicMail>";
                echo $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "email", []);
                echo "</cbc:ElectronicMail>
                    ";
            }
            // line 103
            echo "                </cac:Contact>
            ";
        }
        // line 105
        echo "        </cac:Party>
    </cac:AccountingSupplierParty>
    ";
        // line 107
        $context["client"] = $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "client", []);
        // line 108
        echo "    <cac:AccountingCustomerParty>
        <cac:Party>
            <cac:PartyIdentification>
                <cbc:ID schemeID=\"";
        // line 111
        echo $this->getAttribute((isset($context["client"]) ? $context["client"] : null), "tipoDoc", []);
        echo "\">";
        echo $this->getAttribute((isset($context["client"]) ? $context["client"] : null), "numDoc", []);
        echo "</cbc:ID>
            </cac:PartyIdentification>
            <cac:PartyLegalEntity>
                <cbc:RegistrationName><![CDATA[";
        // line 114
        echo $this->getAttribute((isset($context["client"]) ? $context["client"] : null), "rznSocial", []);
        echo "]]></cbc:RegistrationName>
                ";
        // line 115
        if ($this->getAttribute((isset($context["client"]) ? $context["client"] : null), "address", [])) {
            // line 116
            echo "                    ";
            $context["addr"] = $this->getAttribute((isset($context["client"]) ? $context["client"] : null), "address", []);
            // line 117
            echo "                    <cac:RegistrationAddress>
                        ";
            // line 118
            if ($this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "ubigueo", [])) {
                // line 119
                echo "                            <cbc:ID>";
                echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "ubigueo", []);
                echo "</cbc:ID>
                        ";
            }
            // line 121
            echo "                        <cac:AddressLine>
                            <cbc:Line><![CDATA[";
            // line 122
            echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "direccion", []);
            echo "]]></cbc:Line>
                        </cac:AddressLine>
                        <cac:Country>
                            <cbc:IdentificationCode>";
            // line 125
            echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "codigoPais", []);
            echo "</cbc:IdentificationCode>
                        </cac:Country>
                    </cac:RegistrationAddress>
                ";
        }
        // line 129
        echo "            </cac:PartyLegalEntity>
            ";
        // line 130
        if (($this->getAttribute((isset($context["client"]) ? $context["client"] : null), "email", []) || $this->getAttribute((isset($context["client"]) ? $context["client"] : null), "telephone", []))) {
            // line 131
            echo "                <cac:Contact>
                    ";
            // line 132
            if ($this->getAttribute((isset($context["client"]) ? $context["client"] : null), "telephone", [])) {
                // line 133
                echo "                        <cbc:Telephone>";
                echo $this->getAttribute((isset($context["client"]) ? $context["client"] : null), "telephone", []);
                echo "</cbc:Telephone>
                    ";
            }
            // line 135
            echo "                    ";
            if ($this->getAttribute((isset($context["client"]) ? $context["client"] : null), "email", [])) {
                // line 136
                echo "                        <cbc:ElectronicMail>";
                echo $this->getAttribute((isset($context["client"]) ? $context["client"] : null), "email", []);
                echo "</cbc:ElectronicMail>
                    ";
            }
            // line 138
            echo "                </cac:Contact>
            ";
        }
        // line 140
        echo "        </cac:Party>
    </cac:AccountingCustomerParty>
    <cac:TaxTotal>
        <cbc:TaxAmount currencyID=\"";
        // line 143
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
        echo "\">";
        echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "totalImpuestos", [])]);
        echo "</cbc:TaxAmount>
        ";
        // line 144
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoISC", [])) {
            // line 145
            echo "            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
            // line 146
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoBaseIsc", [])]);
            echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
            // line 147
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoISC", [])]);
            echo "</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>2000</cbc:ID>
                        <cbc:Name>ISC</cbc:Name>
                        <cbc:TaxTypeCode>EXC</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        ";
        }
        // line 157
        echo "        ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoOperGravadas", [])) {
            // line 158
            echo "            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
            // line 159
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoOperGravadas", [])]);
            echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
            // line 160
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoIGV", [])]);
            echo "</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>1000</cbc:ID>
                        <cbc:Name>IGV</cbc:Name>
                        <cbc:TaxTypeCode>VAT</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        ";
        }
        // line 170
        echo "        ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoOperInafectas", [])) {
            // line 171
            echo "            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
            // line 172
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoOperInafectas", [])]);
            echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
            // line 173
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">0</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>9998</cbc:ID>
                        <cbc:Name>INA</cbc:Name>
                        <cbc:TaxTypeCode>FRE</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        ";
        }
        // line 183
        echo "        ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoOperExoneradas", [])) {
            // line 184
            echo "            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
            // line 185
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoOperExoneradas", [])]);
            echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
            // line 186
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">0</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>9997</cbc:ID>
                        <cbc:Name>EXO</cbc:Name>
                        <cbc:TaxTypeCode>VAT</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        ";
        }
        // line 196
        echo "        ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoOperGratuitas", [])) {
            // line 197
            echo "            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
            // line 198
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoOperGratuitas", [])]);
            echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
            // line 199
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoIGV", [])]);
            echo "</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>9996</cbc:ID>
                        <cbc:Name>GRA</cbc:Name>
                        <cbc:TaxTypeCode>FRE</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        ";
        }
        // line 209
        echo "        ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoOperExportacion", [])) {
            // line 210
            echo "            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
            // line 211
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoOperExportacion", [])]);
            echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
            // line 212
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">0</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>9995</cbc:ID>
                        <cbc:Name>EXP</cbc:Name>
                        <cbc:TaxTypeCode>FRE</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        ";
        }
        // line 222
        echo "        ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoIvap", [])) {
            // line 223
            echo "            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
            // line 224
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoBaseIvap", [])]);
            echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
            // line 225
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoIvap", [])]);
            echo "</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>1016</cbc:ID>
                        <cbc:Name>IVAP</cbc:Name>
                        <cbc:TaxTypeCode>VAT</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        ";
        }
        // line 235
        echo "        ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoOtrosTributos", [])) {
            // line 236
            echo "            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
            // line 237
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoBaseOth", [])]);
            echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
            // line 238
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoOtrosTributos", [])]);
            echo "</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>9999</cbc:ID>
                        <cbc:Name>OTROS</cbc:Name>
                        <cbc:TaxTypeCode>OTH</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        ";
        }
        // line 248
        echo "        ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "icbper", [])) {
            // line 249
            echo "            <cac:TaxSubtotal>
                <cbc:TaxAmount currencyID=\"";
            // line 250
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "icbper", [])]);
            echo "</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>7152</cbc:ID>
                        <cbc:Name>ICBPER</cbc:Name>
                        <cbc:TaxTypeCode>OTH</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        ";
        }
        // line 260
        echo "    </cac:TaxTotal>
    <cac:RequestedMonetaryTotal>
        ";
        // line 262
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "sumOtrosCargos", [])) {
            // line 263
            echo "        <cbc:ChargeTotalAmount currencyID=\"";
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "sumOtrosCargos", [])]);
            echo "</cbc:ChargeTotalAmount>
        ";
        }
        // line 265
        echo "        <cbc:PayableAmount currencyID=\"";
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
        echo "\">";
        echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoImpVenta", [])]);
        echo "</cbc:PayableAmount>
    </cac:RequestedMonetaryTotal>
    ";
        // line 267
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
        foreach ($context['_seq'] as $context["_key"] => $context["detail"]) {
            // line 268
            echo "    <cac:DebitNoteLine>
        <cbc:ID>";
            // line 269
            echo $this->getAttribute($context["loop"], "index", []);
            echo "</cbc:ID>
        <cbc:DebitedQuantity unitCode=\"";
            // line 270
            echo $this->getAttribute($context["detail"], "unidad", []);
            echo "\">";
            echo $this->getAttribute($context["detail"], "cantidad", []);
            echo "</cbc:DebitedQuantity>
        <cbc:LineExtensionAmount currencyID=\"";
            // line 271
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "mtoValorVenta", [])]);
            echo "</cbc:LineExtensionAmount>
        <cac:PricingReference>
            ";
            // line 273
            if ($this->getAttribute($context["detail"], "mtoValorGratuito", [])) {
                // line 274
                echo "            <cac:AlternativeConditionPrice>
                <cbc:PriceAmount currencyID=\"";
                // line 275
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format_limit')->getCallable(), [$this->getAttribute($context["detail"], "mtoValorGratuito", []), 10]);
                echo "</cbc:PriceAmount>
                <cbc:PriceTypeCode>02</cbc:PriceTypeCode>
            </cac:AlternativeConditionPrice>
            ";
            } else {
                // line 279
                echo "            <cac:AlternativeConditionPrice>
                <cbc:PriceAmount currencyID=\"";
                // line 280
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format_limit')->getCallable(), [$this->getAttribute($context["detail"], "mtoPrecioUnitario", []), 10]);
                echo "</cbc:PriceAmount>
                <cbc:PriceTypeCode>01</cbc:PriceTypeCode>
            </cac:AlternativeConditionPrice>
            ";
            }
            // line 284
            echo "        </cac:PricingReference>
        <cac:TaxTotal>
            <cbc:TaxAmount currencyID=\"";
            // line 286
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "totalImpuestos", [])]);
            echo "</cbc:TaxAmount>
            ";
            // line 287
            if ($this->getAttribute($context["detail"], "isc", [])) {
                // line 288
                echo "            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
                // line 289
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "mtoBaseIsc", [])]);
                echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
                // line 290
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "isc", [])]);
                echo "</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cbc:Percent>";
                // line 292
                echo $this->getAttribute($context["detail"], "porcentajeIsc", []);
                echo "</cbc:Percent>
                    <cbc:TierRange>";
                // line 293
                echo $this->getAttribute($context["detail"], "tipSisIsc", []);
                echo "</cbc:TierRange>
                    <cac:TaxScheme>
                        <cbc:ID>2000</cbc:ID>
                        <cbc:Name>ISC</cbc:Name>
                        <cbc:TaxTypeCode>EXC</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
            ";
            }
            // line 302
            echo "            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
            // line 303
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "mtoBaseIgv", [])]);
            echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
            // line 304
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "igv", [])]);
            echo "</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cbc:Percent>";
            // line 306
            echo $this->getAttribute($context["detail"], "porcentajeIgv", []);
            echo "</cbc:Percent>
                    <cbc:TaxExemptionReasonCode>";
            // line 307
            echo $this->getAttribute($context["detail"], "tipAfeIgv", []);
            echo "</cbc:TaxExemptionReasonCode>
                    ";
            // line 308
            $context["afect"] = Greenter\Xml\Filter\TributoFunction::getByAfectacion($this->getAttribute($context["detail"], "tipAfeIgv", []));
            // line 309
            echo "                    <cac:TaxScheme>
                        <cbc:ID>";
            // line 310
            echo $this->getAttribute((isset($context["afect"]) ? $context["afect"] : null), "id", []);
            echo "</cbc:ID>
                        <cbc:Name>";
            // line 311
            echo $this->getAttribute((isset($context["afect"]) ? $context["afect"] : null), "name", []);
            echo "</cbc:Name>
                        <cbc:TaxTypeCode>";
            // line 312
            echo $this->getAttribute((isset($context["afect"]) ? $context["afect"] : null), "code", []);
            echo "</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
            ";
            // line 316
            if ($this->getAttribute($context["detail"], "otroTributo", [])) {
                // line 317
                echo "            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
                // line 318
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "mtoBaseOth", [])]);
                echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
                // line 319
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "otroTributo", [])]);
                echo "</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cbc:Percent>";
                // line 321
                echo $this->getAttribute($context["detail"], "porcentajeOth", []);
                echo "</cbc:Percent>
                    <cac:TaxScheme>
                        <cbc:ID>9999</cbc:ID>
                        <cbc:Name>OTROS</cbc:Name>
                        <cbc:TaxTypeCode>OTH</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
            ";
            }
            // line 330
            echo "            ";
            if ($this->getAttribute($context["detail"], "icbper", [])) {
                // line 331
                echo "            <cac:TaxSubtotal>
                <cbc:TaxAmount currencyID=\"";
                // line 332
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "icbper", [])]);
                echo "</cbc:TaxAmount>
                <cbc:BaseUnitMeasure unitCode=\"";
                // line 333
                echo $this->getAttribute($context["detail"], "unidad", []);
                echo "\">";
                echo $this->getAttribute($context["detail"], "cantidad", []);
                echo "</cbc:BaseUnitMeasure>
                <cbc:PerUnitAmount currencyID=\"";
                // line 334
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "factorIcbper", [])]);
                echo "</cbc:PerUnitAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>7152</cbc:ID>
                        <cbc:Name>ICBPER</cbc:Name>
                        <cbc:TaxTypeCode>OTH</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
            ";
            }
            // line 344
            echo "        </cac:TaxTotal>
        <cac:Item>
            <cbc:Description><![CDATA[";
            // line 346
            echo $this->getAttribute($context["detail"], "descripcion", []);
            echo "]]></cbc:Description>
            ";
            // line 347
            if ($this->getAttribute($context["detail"], "codProducto", [])) {
                // line 348
                echo "                <cac:SellersItemIdentification>
                    <cbc:ID>";
                // line 349
                echo $this->getAttribute($context["detail"], "codProducto", []);
                echo "</cbc:ID>
                </cac:SellersItemIdentification>
            ";
            }
            // line 352
            echo "            ";
            if ($this->getAttribute($context["detail"], "codProdSunat", [])) {
                // line 353
                echo "                <cac:CommodityClassification>
                    <cbc:ItemClassificationCode>";
                // line 354
                echo $this->getAttribute($context["detail"], "codProdSunat", []);
                echo "</cbc:ItemClassificationCode>
                </cac:CommodityClassification>
            ";
            }
            // line 357
            echo "            ";
            if ($this->getAttribute($context["detail"], "codProdGS1", [])) {
                // line 358
                echo "                <cac:StandardItemIdentification>
                    <cbc:ID>";
                // line 359
                echo $this->getAttribute($context["detail"], "codProdGS1", []);
                echo "</cbc:ID>
                </cac:StandardItemIdentification>
            ";
            }
            // line 362
            echo "            ";
            if ($this->getAttribute($context["detail"], "atributos", [])) {
                // line 363
                echo "                ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["detail"], "atributos", []));
                foreach ($context['_seq'] as $context["_key"] => $context["atr"]) {
                    // line 364
                    echo "                    <cac:AdditionalItemProperty >
                        <cbc:Name>";
                    // line 365
                    echo $this->getAttribute($context["atr"], "name", []);
                    echo "</cbc:Name>
                        <cbc:NameCode>";
                    // line 366
                    echo $this->getAttribute($context["atr"], "code", []);
                    echo "</cbc:NameCode>
                        ";
                    // line 367
                    if ($this->getAttribute($context["atr"], "value", [])) {
                        // line 368
                        echo "                            <cbc:Value>";
                        echo $this->getAttribute($context["atr"], "value", []);
                        echo "</cbc:Value>
                        ";
                    }
                    // line 370
                    echo "                        ";
                    if ((($this->getAttribute($context["atr"], "fecInicio", []) || $this->getAttribute($context["atr"], "fecFin", [])) || $this->getAttribute($context["atr"], "duracion", []))) {
                        // line 371
                        echo "                            <cac:UsabilityPeriod>
                                ";
                        // line 372
                        if ($this->getAttribute($context["atr"], "fecInicio", [])) {
                            // line 373
                            echo "                                    <cbc:StartDate>";
                            echo twig_date_format_filter($this->env, $this->getAttribute($context["atr"], "fecInicio", []), "Y-m-d");
                            echo "</cbc:StartDate>
                                ";
                        }
                        // line 375
                        echo "                                ";
                        if ($this->getAttribute($context["atr"], "fecFin", [])) {
                            // line 376
                            echo "                                    <cbc:EndDate>";
                            echo twig_date_format_filter($this->env, $this->getAttribute($context["atr"], "fecFin", []), "Y-m-d");
                            echo "</cbc:EndDate>
                                ";
                        }
                        // line 378
                        echo "                                ";
                        if ($this->getAttribute($context["atr"], "duracion", [])) {
                            // line 379
                            echo "                                    <cbc:DurationMeasure unitCode=\"DAY\">";
                            echo $this->getAttribute($context["atr"], "duracion", []);
                            echo "</cbc:DurationMeasure>
                                ";
                        }
                        // line 381
                        echo "                            </cac:UsabilityPeriod>
                        ";
                    }
                    // line 383
                    echo "                    </cac:AdditionalItemProperty>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['atr'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 385
                echo "            ";
            }
            // line 386
            echo "        </cac:Item>
        <cac:Price>
            <cbc:PriceAmount currencyID=\"";
            // line 388
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format_limit')->getCallable(), [$this->getAttribute($context["detail"], "mtoValorUnitario", []), 10]);
            echo "</cbc:PriceAmount>
        </cac:Price>
    </cac:DebitNoteLine>
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['detail'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 392
        echo "</DebitNote>
";
        $___internal_25f6d77933748400e9337c226f489cb81b118226b0800b54940a5f354506b248_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 1
        echo twig_spaceless($___internal_25f6d77933748400e9337c226f489cb81b118226b0800b54940a5f354506b248_);
    }

    public function getTemplateName()
    {
        return "notadb2.1.xml.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  997 => 1,  993 => 392,  973 => 388,  969 => 386,  966 => 385,  959 => 383,  955 => 381,  949 => 379,  946 => 378,  940 => 376,  937 => 375,  931 => 373,  929 => 372,  926 => 371,  923 => 370,  917 => 368,  915 => 367,  911 => 366,  907 => 365,  904 => 364,  899 => 363,  896 => 362,  890 => 359,  887 => 358,  884 => 357,  878 => 354,  875 => 353,  872 => 352,  866 => 349,  863 => 348,  861 => 347,  857 => 346,  853 => 344,  838 => 334,  832 => 333,  826 => 332,  823 => 331,  820 => 330,  808 => 321,  801 => 319,  795 => 318,  792 => 317,  790 => 316,  783 => 312,  779 => 311,  775 => 310,  772 => 309,  770 => 308,  766 => 307,  762 => 306,  755 => 304,  749 => 303,  746 => 302,  734 => 293,  730 => 292,  723 => 290,  717 => 289,  714 => 288,  712 => 287,  706 => 286,  702 => 284,  693 => 280,  690 => 279,  681 => 275,  678 => 274,  676 => 273,  669 => 271,  663 => 270,  659 => 269,  656 => 268,  639 => 267,  631 => 265,  623 => 263,  621 => 262,  617 => 260,  602 => 250,  599 => 249,  596 => 248,  581 => 238,  575 => 237,  572 => 236,  569 => 235,  554 => 225,  548 => 224,  545 => 223,  542 => 222,  529 => 212,  523 => 211,  520 => 210,  517 => 209,  502 => 199,  496 => 198,  493 => 197,  490 => 196,  477 => 186,  471 => 185,  468 => 184,  465 => 183,  452 => 173,  446 => 172,  443 => 171,  440 => 170,  425 => 160,  419 => 159,  416 => 158,  413 => 157,  398 => 147,  392 => 146,  389 => 145,  387 => 144,  381 => 143,  376 => 140,  372 => 138,  366 => 136,  363 => 135,  357 => 133,  355 => 132,  352 => 131,  350 => 130,  347 => 129,  340 => 125,  334 => 122,  331 => 121,  325 => 119,  323 => 118,  320 => 117,  317 => 116,  315 => 115,  311 => 114,  303 => 111,  298 => 108,  296 => 107,  292 => 105,  288 => 103,  282 => 101,  279 => 100,  273 => 98,  271 => 97,  268 => 96,  266 => 95,  259 => 91,  253 => 88,  248 => 86,  244 => 85,  239 => 84,  233 => 82,  231 => 81,  227 => 80,  223 => 79,  220 => 78,  218 => 77,  214 => 76,  208 => 73,  202 => 70,  187 => 58,  181 => 55,  175 => 52,  172 => 51,  169 => 50,  166 => 49,  157 => 46,  153 => 45,  150 => 44,  145 => 43,  142 => 42,  139 => 41,  130 => 38,  126 => 37,  123 => 36,  118 => 35,  116 => 34,  110 => 31,  106 => 30,  102 => 28,  96 => 25,  93 => 24,  91 => 23,  86 => 21,  82 => 20,  78 => 19,  72 => 17,  61 => 15,  57 => 14,  53 => 13,  49 => 12,  43 => 11,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "notadb2.1.xml.twig", "/opt/lampp/htdocs/clientes/comercial_penia/greenter/vendor/greenter/xml/src/Xml/Templates/notadb2.1.xml.twig");
    }
}
